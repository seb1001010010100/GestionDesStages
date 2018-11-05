<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;

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
        $this->set(compact('internships'));
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
                $this->Auth->allow(['index', 'view', 'canView',  'edit', 'add', 'delete']);
                break;
            case 'company':
                $this->Auth->allow(['view', 'canView', 'edit', 'add', 'delete']);
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
            'contain' => ['Companies', 'Sessions', 'OwnershipStatuses', 'Regions']
        ]);

        if ($this->canView($internship['company_id'])) {
            // $clientTypes_table = TableRegistry::get('clientTypes');
            // $missions_table = TableRegistry::get('missions');

            // $clients_id = AppController::array_on_key($internship->internship_clienttype_xrefs, 'clienttype_id');
            // $missions_id = AppController::array_on_key($internship->internship_mission_xrefs, 'mission_id');
            
            // $clients = array();
            // $missions = array();
            // if($clients_id){
            //     $clients = $this->Internships->internshipclienttypexrefs->clienttypes
            //         ->find()
            //         ->where(['id IN' => $clients_id])
            //         ->toList();
            // }
            // if($missions_id){
            //     $missions = $this->Internships->internshipmissionxrefs->missions
            //         ->find()
            //         ->where(['id IN' => $missions_id])
            //         ->toList();
            // }
            // $clients = AppController::array_on_key($clients, 'type');
            // $missions = AppController::array_on_key($missions, 'name');
            
            $this->set(compact('internship', 'clients', 'missions'));

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
            $clientTypes_id = $this->request->getData()['clientType_id'];
            $missions_id = $this->request->getData()['missions_id'];
            if ($this->Internships->save($internship)) {
                
                $this->Flash->success(__('The internship has been saved.'));

                return $this->redirect(['controller' => 'Redirections', 'action' => 'afterInternshipAdd']);
            }
            $this->Flash->error(__('The internship could not be saved. Please, try again.'));
        }
        $companies = $this->Internships->Companies->find('list', ['limit' => 200]);
        $sessions = $this->Internships->Sessions->find('list', ['limit' => 200]);
        $ownershipStatuses = $this->Internships->OwnershipStatuses->find('list', ['limit' => 200]);
        $regions = $this->Internships->Regions->find('list', ['limit' => 200]);
        $clientTypes = $this->Internships->internshipclienttypexrefs->clienttypes->find('list', ['limit' => 200]);
		$missions = $this->Internships->internshipmissionxrefs->Missions->find('list', ['limit' => 200]);
        $this->set(compact('internship', 'companies', 'sessions', 'ownershipStatuses', 'regions'));
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
            'contain' => ['Companies', 'Sessions', 'OwnershipStatuses', 'Regions']
        ]);

        if ($this->canView($internship['company_id'])) {

            if ($this->request->is(['patch', 'post', 'put'])) {
                $internship = $this->Internships->patchEntity($internship, $this->request->getData());
                if ($this->Internships->save($internship)) {
                    $this->Flash->success(__('The internship has been saved.'));

                    return $this->redirect(['controller' => 'Redirections', 'action' => 'afterInternshipAdd']);
                }
                $this->Flash->error(__('The internship could not be saved. Please, try again.'));
            }
            $companies = $this->Internships->Companies->find('list', ['limit' => 200]);
            $sessions = $this->Internships->Sessions->find('list', ['limit' => 200]);
    		$ownershipStatuses = $this->Internships->OwnershipStatuses->find('list', ['limit' => 200]);
            $regions = $this->Internships->Regions->find('list', ['limit' => 200]);

            // this converts the array of objects to json then back to an array but of arrays this time
            // it works put its incredibly ugly and unintuitive
            // it also only keeps the first variable of the object in the array
            // luckily here it is the one we want

            $this->set(compact('internship', 'companies', 'sessions', 'ownershipStatuses', 'regions'));

        } else {
            return $this->redirect(['controller' => 'redirections', 'action' => 'index']);
        }
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
        //$this->request->allowMethod(['post', 'delete']);
        $internship = $this->Internships->get($id);

        if ($this->canView($internship['company_id'])) {

            if ($this->Internships->delete($internship)) {
                $this->Flash->success(__('The internship has been deleted.'));
            } else {
                $this->Flash->error(__('The internship could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);

        } else {
            return $this->redirect(['controller' => 'redirections', 'action' => 'index']);
        }
    }
    
    public function apply($internshipId = null)
    {
        $user = $this->Auth->user();
        $internship = $this->Internships
            ->find()
            ->contain(['Companies'])
            ->where(['Internships.id' => $internshipId] ).first();
        $email = new Email('default');
    
        $email->to($internship->company->email)
              ->subject('A new student applied to one of your stage!')
              ->send($user['role_date']['first_name'] + ' ' + $user['role_date']['last_name'] 
                      + ' as applied to your intership named ' + $internship['name'] + '\nPlease do not reply to this message');
    }
}
