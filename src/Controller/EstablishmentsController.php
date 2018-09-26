<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Establishments Controller
 *
 * @property \App\Model\Table\EstablishmentsTable $Establishments
 *
 * @method \App\Model\Entity\Establishment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstablishmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $establishments = $this->paginate($this->Establishments);

        $this->set(compact('establishments'));
    }

    /**
     * View method
     *
     * @param string|null $id Establishment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $establishment = $this->Establishments->get($id, [
            'contain' => ['Companies']
        ]);

        $this->set('establishment', $establishment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $establishment = $this->Establishments->newEntity();
        if ($this->request->is('post')) {
            $establishment = $this->Establishments->patchEntity($establishment, $this->request->getData());
            if ($this->Establishments->save($establishment)) {
                $this->Flash->success(__('The establishment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The establishment could not be saved. Please, try again.'));
        }
		
        $this->set(compact('establishment', 'establishments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Establishment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $establishment = $this->Establishments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $establishment = $this->Establishments->patchEntity($establishment, $this->request->getData());
            if ($this->Establishments->save($establishment)) {
                $this->Flash->success(__('The establishment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The establishment could not be saved. Please, try again.'));
        }
        $this->set(compact('establishment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Establishment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $establishment = $this->Establishments->get($id);
        if ($this->Establishments->delete($establishment)) {
            $this->Flash->success(__('The establishment has been deleted.'));
        } else {
            $this->Flash->error(__('The establishment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
