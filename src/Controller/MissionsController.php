<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Missions Controller
 *
 * @property \App\Model\Table\MissionsTable $Missions
 *
 * @method \App\Model\Entity\Mission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $missions = $this->paginate($this->Missions);

        $this->set(compact('missions'));
    }

    /**
     * View method
     *
     * @param string|null $id Mission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mission = $this->Missions->get($id, [
            'contain' => []
        ]);

        $this->set('mission', $mission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mission = $this->Missions->newEntity();
        if ($this->request->is('post')) {
            $mission = $this->Missions->patchEntity($mission, $this->request->getData());
            if ($this->Missions->save($mission)) {
                $this->Flash->success(__('The mission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mission could not be saved. Please, try again.'));
        }
        $this->set(compact('mission'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mission = $this->Missions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mission = $this->Missions->patchEntity($mission, $this->request->getData());
            if ($this->Missions->save($mission)) {
                $this->Flash->success(__('The mission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mission could not be saved. Please, try again.'));
        }
        $this->set(compact('mission'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mission = $this->Missions->get($id);
        if ($this->Missions->delete($mission)) {
            $this->Flash->success(__('The mission has been deleted.'));
        } else {
            $this->Flash->error(__('The mission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
