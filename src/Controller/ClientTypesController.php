<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClientTypes Controller
 *
 * @property \App\Model\Table\ClientTypesTable $ClientTypes
 *
 * @method \App\Model\Entity\ClientType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $clientTypes = $this->paginate($this->ClientTypes);

        $this->set(compact('clientTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Client Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientType = $this->ClientTypes->get($id, [
            'contain' => []
        ]);

        $this->set('clientType', $clientType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientType = $this->ClientTypes->newEntity();
        if ($this->request->is('post')) {
            $clientType = $this->ClientTypes->patchEntity($clientType, $this->request->getData());
            if ($this->ClientTypes->save($clientType)) {
                $this->Flash->success(__('The client type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client type could not be saved. Please, try again.'));
        }
        $this->set(compact('clientType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientType = $this->ClientTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientType = $this->ClientTypes->patchEntity($clientType, $this->request->getData());
            if ($this->ClientTypes->save($clientType)) {
                $this->Flash->success(__('The client type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client type could not be saved. Please, try again.'));
        }
        $this->set(compact('clientType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientType = $this->ClientTypes->get($id);
        if ($this->ClientTypes->delete($clientType)) {
            $this->Flash->success(__('The client type has been deleted.'));
        } else {
            $this->Flash->error(__('The client type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
