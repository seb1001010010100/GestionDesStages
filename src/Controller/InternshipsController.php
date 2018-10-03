<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Internships Controller
 *
 * @property \App\Model\Table\InternshipsTable $Internships
 *
 * @method \App\Model\Entity\Internship[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InternshipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Sessions']
        ];
        $internships = $this->paginate($this->Internships);
        $user = $this->Auth->user();
        $this->set(compact('internships'/*, 'user'*/));
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        if ($user) {
           switch ($user['role']) {
            case 'student':
                $this->Auth->allow(['index', 'view', 'canView']);
                break;
            case 'administrator':
                $this->Auth->allow(['index', 'view', 'canView',  'edit', 'add']);
                break;
            case 'company':
                $this->Auth->allow(['view', 'canView', 'edit', 'add']);
                break;
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $internship = $this->Internships->get($id, [
            'contain' => ['Companies', 'Sessions']
        ]);

        
        if ($this->canView($internship['company_id'])) {
            
            $this->set('internship', $internship);

        } else {
            return $this->redirect(['controller' => 'redirections', 'action' => 'index']);
        }
    }

    public function canView($id)
    {
        $allowed = false;
        $user = $this->Auth->user();

        if (in_array($user['role'], ["administrator", "student"])) {
            $allowed =  true;
        } else if ($user['role'] == "company") {
            if ($user['role_data']['id'] == $id) {
                $allowed =  true;
            }
        }

        return $allowed;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $internship = $this->Internships->newEntity();
        if ($this->request->is('post')) {
            $internship = $this->Internships->patchEntity($internship, $this->request->getData());
			debug(internship[clientTypes]);
            if ($this->Internships->save($internship)) {
                $this->Flash->success(__('The internship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship could not be saved. Please, try again.'));
        }
        $companies = $this->Internships->Companies->find('list', ['limit' => 200]);
        $sessions = $this->Internships->Sessions->find('list', ['limit' => 200]);
        $ownershipStatuses = $this->Internships->OwnershipStatuses->find('list', ['limit' => 200]);
        $regions = $this->Internships->Regions->find('list', ['limit' => 200]);
        $clientTypes = $this->Internships->ClientTypes->find('list', ['limit' => 200]);
		$missions = $this->Internships->Missions->find('list', ['limit' => 200]);
        $this->set(compact('internship', 'companies', 'sessions', 'ownershipStatuses', 'regions', 'clientTypes', 'missions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
         $internship = $this->Internships->get($id, [
            'contain' => []]);
 
        if ($this->request->is(['patch', 'post', 'put'])) {
            $internship = $this->Internships->patchEntity($internship, $this->request->getData());
            if ($this->Internships->save($internship)) {
                $this->Flash->success(__('The internship has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The internship could not be saved. Please, try again.'));
        }
        $companies = $this->Internships->Companies->find('list', ['limit' => 200]);
        $sessions = $this->Internships->Sessions->find('list', ['limit' => 200]);
		$ownershipStatuses = $this->Internships->OwnershipStatuses->find('list', ['limit' => 200]);
        $regions = $this->Internships->Regions->find('list', ['limit' => 200]);
        $clientTypes = $this->Internships->ClientTypes->find('list', ['limit' => 200]);
		$missions = $this->Internships->Missions->find('list', ['limit' => 200]);
        $this->set(compact('internship', 'companies', 'sessions', 'ownershipStatuses', 'regions', 'clientTypes', 'missions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Internship id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $internship = $this->Internships->get($id);
        if ($this->Internships->delete($internship)) {
            $this->Flash->success(__('The internship has been deleted.'));
        } else {
            $this->Flash->error(__('The internship could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
