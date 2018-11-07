<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 *
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $companies = $this->paginate($this->Companies);

        $this->set(compact('companies'));
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        $auths = array();
        if ($user) {
           switch ($user['role']) {
            case 'student':
                break;
            case 'administrator':
                $auths = array_merge(['index', 'view', 'canView', 'add', 'edit', 'delete']);
                break;
            case 'company':
                if ($user['role_data']['active']) {
                    $auths = array_merge($auths, ['view', 'canView', 'edit']);
                } else {
                    $auths = array_merge($auths, ['view', 'canView', 'edit']);
                }
                break;
            }
        }
        if ($auths) {
            $this->Auth->allow($auths);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->canView($id)) {
            $company = $this->Companies->get($id, [
                'contain' => [
                    'Internships', 
                    'Establishments', 
                    'ClientTypes',
                    'Missions'
                ]
            ]);

            $this->set('company', $company);
        } else {
            return $this->redirect(['controller' => 'redirections', 'action' => 'index']);
        }
    }

    public function canView($id=null)
    {
        if ($id == null or $this->request->params['action'] == 'canView') {
            $this->Flash->error(__('You are should not mess with the URL!!!!.'));
            $this->redirect(['controller' => 'Redirections', 'action' => 'index']);
        }



        $user = $this->Auth->user();
        if ($user['role'] == "administrator") {
            return true;
        } else if ($user['role'] == "company") {
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
        $company = $this->Companies->newEntity();
        //use table registry to create a new user entity
        $user = $this->Companies->Users->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());

            //Change le numero de tel pour la separation par des points
            $formatPhone = preg_replace('/^(\d{3})(\d{3})(\d{4})$/i', '$1.$2.$3.', (string)$company->phone);
            $company->set('phone', $formatPhone);
            // debug($this->request->getData());
            // debug($company);
            // die();
            if ($this->Companies->save($company)) {

                $user->set('username',$company->email);
                $user->set('password', $this->request->getData('password'));
                $user->set('created', $company->created);
                $user->set('modified', $company->modified);
                $user->set('role', 'company');
                if($this->Companies->Users->save($user)){

                    $this->Flash->success(__('The company has been saved.'));
                    return $this->redirect(['controller' => 'Redirections', 'action' => 'index']);

                }

            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
		$establishments = $this->Companies->Establishments->find('list', ['limit' => 200]);
        $clientTypes = $this->Companies->ClientTypes->find('list', ['limit' => 200]);
        $missions = $this->Companies->Missions->find('list', ['limit' => 200]);
        $this->set(compact('company', 'establishments', 'clientTypes', 'missions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => [
                'Users',
                'Internships', 
                'Establishments', 
                'ClientTypes',
                'Missions'
            ],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            // we should check the data the server receives from the user in order to prevent him changing values he should not
            // ex. he sends an item named user with a certain value, this would allow him to change the user associated with this company.

            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->active = true;

            if ($this->Companies->save($company)) {

                $company->user->set('username',$company->email);

                // TODO: on ne permet pas actuellement de changer de mot de passe
                // $company->user->set('password', $this->request->getData('password'));

                if($this->Companies->Users->save($company->user)){

                    $this->Flash->success(__('The company has been saved.'));
                    return $this->redirect(['controller' => 'Redirections', 'action' => 'index']);

                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }

        $establishments = $this->Companies->Establishments->find('list', ['limit' => 200]);
        $clientTypes = $this->Companies->ClientTypes->find('list', ['limit' => 200]);
        $missions = $this->Companies->Missions->find('list', ['limit' => 200]);

        $this->set(compact('company', 'establishments', 'clientTypes', 'missions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
