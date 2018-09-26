<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OwnershipStatuses Controller
 *
 * @property \App\Model\Table\OwnershipStatusesTable $OwnershipStatuses
 *
 * @method \App\Model\Entity\OwnershipStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OwnershipStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ownershipStatuses = $this->paginate($this->OwnershipStatuses);

        $this->set(compact('ownershipStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Ownership Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ownershipStatus = $this->OwnershipStatuses->get($id, [
            'contain' => []
        ]);

        $this->set('ownershipStatus', $ownershipStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ownershipStatus = $this->OwnershipStatuses->newEntity();
        if ($this->request->is('post')) {
            $ownershipStatus = $this->OwnershipStatuses->patchEntity($ownershipStatus, $this->request->getData());
            if ($this->OwnershipStatuses->save($ownershipStatus)) {
                $this->Flash->success(__('The ownership status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ownership status could not be saved. Please, try again.'));
        }
        $this->set(compact('ownershipStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ownership Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ownershipStatus = $this->OwnershipStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ownershipStatus = $this->OwnershipStatuses->patchEntity($ownershipStatus, $this->request->getData());
            if ($this->OwnershipStatuses->save($ownershipStatus)) {
                $this->Flash->success(__('The ownership status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ownership status could not be saved. Please, try again.'));
        }
        $this->set(compact('ownershipStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ownership Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ownershipStatus = $this->OwnershipStatuses->get($id);
        if ($this->OwnershipStatuses->delete($ownershipStatus)) {
            $this->Flash->success(__('The ownership status has been deleted.'));
        } else {
            $this->Flash->error(__('The ownership status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
