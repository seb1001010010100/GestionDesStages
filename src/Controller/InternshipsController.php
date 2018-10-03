<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
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
            'contain' => ['Companies', 'Sessions', 'OwnershipStatuses', 'Regions', 'InternshipClienttypeXrefs', 'InternshipMissionXrefs']
        ]);

        $clients = AppController::array_on_key($internship->internship_clienttype_xrefs, 'clienttype_id');
        $missions = AppController::array_on_key($internship->internship_mission_xrefs, 'mission_id');

        debug($clients);
        debug($missions);
        
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
            $clientTypes_id = $this->request->getData()['clientType_id'];
            $missions_id = $this->request->getData()['missions_id'];
            if ($this->Internships->save($internship)) {

                $intern_client_xref = TableRegistry::get('internship_clienttype_xref');
                foreach ($clientTypes_id as $value) {
                    $xref = $intern_client_xref->newEntity([
                        'internship_id' => $internship['id'],
                        'clienttype_id' => $value
                    ]);
                    $intern_client_xref->save($xref);
                }

                $intern_mission_xref = TableRegistry::get('internship_mission_xref');
                foreach ($missions_id as $value) {
                    $xref = $intern_mission_xref->newEntity([
                        'internship_id' => $internship['id'],
                        'mission_id' => $value
                    ]);
                    $intern_mission_xref->save($xref);
                }
                
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
            'contain' => ['Companies', 'Sessions', 'OwnershipStatuses', 'Regions']
        ]);

        if ($this->canView($internship['company_id'])) {

            $intern_client_xref = TableRegistry::get('internship_clienttype_xref');
            $intern_mission_xref = TableRegistry::get('internship_mission_xref');

            if ($this->request->is(['patch', 'post', 'put'])) {
                $internship = $this->Internships->patchEntity($internship, $this->request->getData());
                $clientTypes_id = $this->request->getData()['clientType_id'];
                $missions_id = $this->request->getData()['missions_id'];
                debug($clientTypes_id);
                if ($this->Internships->save($internship)) {

                    $intern_client_xref->deleteAll(['internship_id' => $internship['id']]);
                    $intern_mission_xref->deleteAll(['internship_id' => $internship['id']]);

                    foreach ($clientTypes_id as $value) {
                        $xref = $intern_client_xref->newEntity([
                            'internship_id' => $internship['id'],
                            'clienttype_id' => $value
                        ]);
                        $intern_client_xref->save($xref);
                    }
                    foreach ($missions_id as $value) {
                        $xref = $intern_mission_xref->newEntity([
                            'internship_id' => $internship['id'],
                            'mission_id' => $value
                        ]);
                        $intern_mission_xref->save($xref);
                    }

                    $this->Flash->success(__('The internship has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The internship could not be saved. Please, try again.'));
            }
            $companies = $this->Internships->Companies->find('list', ['limit' => 200]);
            $sessions = $this->Internships->Sessions->find('list', ['limit' => 200]);
    		$ownershipStatuses = $this->Internships->OwnershipStatuses->find('list', ['limit' => 200]);
            $regions = $this->Internships->Regions->find('list', ['limit' => 200]);
            
            $clientypes_table = TableRegistry::get('clientTypes');
            $missions_table = TableRegistry::get('missions');

            $clientTypes = $clientypes_table->find('list', ['limit' => 200]);
            $missions = $missions_table->find('list', ['limit' => 200]);

            $prev_clientTypes_result = $intern_client_xref
                ->find()
                ->select(['clienttype_id'])
                ->where(['internship_id' => $internship['id']]);

    		$prev_missions_result = $intern_mission_xref
                ->find()
                ->select(['mission_id'])
                ->where(['internship_id' => $internship['id']]);

            $prev_clientTypes = iterator_to_array($prev_clientTypes_result);
            $prev_missions = iterator_to_array($prev_missions_result);

            // this converts the array of objects to json then back to an array but of arrays this time
            // it works put its incredibly ugly and unintuitive
            // it also only keeps the first variable of the object in the array
            // luckily here it is the one we want
            $json  = json_encode($prev_clientTypes);
            $prev_clientTypes = json_decode($json, true);
            $json  = json_encode($prev_missions);
            $prev_missions = json_decode($json, true);

            $prev_clientTypes = array_column($prev_clientTypes, 'clienttype_id');
            $prev_missions = array_column($prev_missions, 'mission_id');

            $this->set(compact('internship', 'companies', 'sessions', 'ownershipStatuses', 'regions', 'clientTypes', 'missions', 'prev_clientTypes', 'prev_missions'));

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
