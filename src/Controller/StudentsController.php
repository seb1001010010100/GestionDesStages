<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 *
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $students = $this->paginate($this->Students);

        $this->set(compact('students'));
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        if ($user) {
           switch ($user['role']) {
            case 'student':
                $this->Auth->allow(['view', 'canView']);
                break;
            case 'administrator':
                $this->Auth->allow(['index', 'view', 'canView']);
                break;
            case 'company':
                if($user['role_data']['active'] == 1) {
                    $this->Auth->allow(['index', 'view', 'canView', 'notify']);
                }
                break;
            }
        } else {
            $this->Auth->allow(['add']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->canView($id)) {

            $student = $this->Students->get($id, [
                'contain' => []
            ]);
            $file = TableRegistry::get('files');
            $this->set('file', $file);
            $this->set('student', $student);
        } else {
            $this->Flash->error(__('Vous ne pouvez pas voir cet utilisateur.'));
            return $this->redirect(['controller' => 'error', 'action' => 'index']);
        }
    }

    public function canView($id)
    {
        $user = $this->Auth->user();
        if (in_array($user['role'], ["administrator", "company"])) {
            return true;
        } else if ($user['role'] == "student") {
            if ($user['role_data']['id'] == $id) {
                return true;
            }
        }
        return false;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEntity();
		//use table registry to create a new user entity
		$usersTable = TableRegistry::get('Users');
		$user = $usersTable->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData());

			//Change la premiere lettre du prenom, nom, et plus information en majuscule
			$student->set('first_name', ucfirst($student->first_name));
			$student->set('last_name', ucfirst($student->last_name));
			$student->set('more_info', ucfirst($student->more_info));

            //change email to lowercase
            $student->set('email', strtolower($student->email));

			//Change le numero de tel pour la separation par des points
			$formatPhone = preg_replace('/^(\d{3})(\d{3})(\d{4})$/i', '$1.$2.$3.', (string)$student->phone_sms);
			$student->set('phone_sms', $formatPhone);

            if ($this->Students->save($student)) {

				//if the student is successfully added to the database, create its user
				$user->set('username',$student->email);
				$user->set('password', $this->request->getData('password'));
                $user->set('created', $student->created);
                $user->set('modified', $student->modified);
				$user->set('role', 'student');
				if($usersTable->save($user)){

					$this->Flash->success(__('The student has been saved.'));
                    $user['role_data'] = $student;
                    unset($user['password']);
                    $this->Auth->setUser($user);
					return $this->redirect(['controller' => 'Redirections', 'action' => 'index']);

				}

            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student could not be saved. Please, try again.'));
        }
        $this->set(compact('student'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function notify($studentId = null)
    {
        $user = $this->Auth->user();
        $student = $this->Students
            ->find()
            ->where(['Students.id' => $studentId] )->first();


        $subject = __('Un employeur voudrait vous rencontrer!');

        $webroot = $this->request->webroot;

        $href = __('localhost{0}companies/view/{1}', $webroot, $user['role_data']['id']);

        $link = __('<a href="{0}">{1}</a>', $href, $user['role_data']['name']);

        $msg = __('L\'entreprise {0} s\'interesse à vous et voudrait céduler une rencontre.<br>Envoyer leur une liste de temps de disponibilité pour faire le suivis.<br>Address email : {1}', $user['role_data']['name'], $user['username']);

        $email = new Email();

        $email
                ->emailFormat('html')
                ->setTo($student->email)
                ->setSubject($subject)
                ->send($msg);

        $this->Flash->success(__('The email has been sent succesfully.'));
        return $this->redirect(['controller' => 'redirections', 'action' => 'index']);
    }

}
