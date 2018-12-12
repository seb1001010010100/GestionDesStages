<?php
namespace App\Controller;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Controller\AppController;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController
{

    public function initialize() {
        parent::initialize();

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students']
        ];
        $files = $this->paginate($this->Files);

        $this->set(compact('files'));
    }

    /**
     * View method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => ['Students']
        ]);

        $this->set('file', $file);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {

        if ($this->request->is('post')) {
            $dir = new Folder();
            $successfulUpload = 0;
            $numberOfFile = count($this->request->data['file']);
            foreach($this->request->data['file'] as $fichier){
              $file = $this->Files->newEntity();
              $fileName = $fichier['name'];
              $uploadPath = APP.DS.'documents'. DS . $id . DS;
              if(!is_dir($uploadPath)){

                $dir->create(APP. DS . 'documents'. DS . $id . DS);

              }
              $extension = pathinfo($fileName,PATHINFO_EXTENSION);
              $uploadFile = $uploadPath.$fileName;
              $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
              if($fichier['size'] < 1048576){
                if($extension == 'pdf' || $extension == 'docx' || $extension == 'mp3'){
                  if(move_uploaded_file($fichier['tmp_name'],$uploadFile)){
                    $file->student_id = $id;
                    $file->titre = $withoutExt;
                    $file->path = $fileName;
                    if ($this->Files->save($file)) {

                      $successfulUpload++;
                      if($successfulUpload == $numberOfFile){

                        $this->Flash->success(__('The file(s) have been saved.'));

                        return $this->redirect(['controller' => 'students', 'action' => 'view',$id]);

                      }
                    }else{

                      $this->Flash->error(__('The file could not be saved. Please, try again.'));
                      return $this->redirect(['controller' => 'students', 'action' => 'view',$id]);

                    }


                  }else{

                    $this->Flash->error(__('The file could not be saved. Please, try again.'));
                    return $this->redirect(['controller' => 'students', 'action' => 'view',$id]);

                  }


              }else{

                $this->Flash->error(__('The file could not be saved. Please use an accepted format (.pdf, .docx, .mp3).' . $fichier['size']));
                return $this->redirect(['controller' => 'students', 'action' => 'view',$id]);

              }
            }else{

              $this->Flash->error(__('The file could not be saved. Please upload a file of less than 1 MB in size.'));
              return $this->redirect(['controller' => 'students', 'action' => 'view',$id]);

            }

          }
        }
        $students = $this->Files->Students->find('list', ['limit' => 200]);
        $this->set(compact('file', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $students = $this->Files->Students->find('list', ['limit' => 200]);
        $this->set(compact('file', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $file = $this->Files->get($id);
        $physicalFile = new File(APP.DS.'documents'. DS . $file->student_id . DS . $file->path);
        if ($this->Files->delete($file)) {
          if($physicalFile->delete()) {
            $this->Flash->success(__('The file has been deleted.'));
            return $this->redirect(['controller' => 'students', 'action' => 'view',$file->student_id]);
          }
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
            return $this->redirect(['controller' => 'students', 'action' => 'view',$file->student_id]);
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
      $action = $this->request->getParam('action');
      switch($user['role']){

        case 'student':
          if(in_array($action, ['add','download','delete'])){

            return true;
          }
          return false;
          break;
        case 'administrator':
          if(in_array($action, ['download'])){

            return true;
          }
          return false;
          break;
        case 'company':
          if(in_array($action, ['download'])){

            return true;
          }
          return false;
          break;
      }

    }

    public function download($id=null) {
      $file = $this->Files->get($id);
      $filePath = 'documents'. DS . $file->student_id . DS . $file->path;
      $this->response->file($filePath ,
          array('download'=> true, 'name'=> $file->path));
      return $this->response;
    }


}
