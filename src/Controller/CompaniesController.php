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
        if ($user) {
           switch ($user['role']) {
            case 'student':
                // j'suis pas sure cest quoi qu'un étudianbt peut faire ici
                //$this->Auth->allow(['index', 'view']);
                break;
            case 'administrator':
                $this->Auth->allow(['index', 'view', 'canView', 'add']);
                break;
            case 'company':
                $this->Auth->allow(['view', 'canView']);
                break;
            }
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
                    // 'CompaniesClienttypes' => ['ClientTypes'], 
                    // 'CompaniesMissions' => ['Missions']
                ]
            ]);

            $this->set('company', $company);
        } else {
            return $this->redirect(['controller' => 'redirections', 'action' => 'index']);
        }
    }

    public function canView($id)
    {
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
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());

            //Change le numero de tel pour la separation par des points
            $formatPhone = preg_replace('/^(\d{3})(\d{3})(\d{4})$/i', '$1.$2.$3.', (string)$company->phone);
            $company->set('phone', $formatPhone);

            if ($this->Companies->save($company)) {

                $user->set('username',$company->email);
                $user->set('password', $this->request->getData('password'));
                $user->set('created', $company->created);
                $user->set('modified', $company->modified);
                $user->set('role', 'company');
                if($usersTable->save($user)){

                    $this->Flash->success(__('The company has been saved.'));
                    return $this->redirect(['controller' => 'Redirections', 'action' => 'index']);

                }

            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
		$establishments = $this->Companies->Establishments->find('list', ['limit' => 200]);
        $this->set(compact('company', 'establishments'));
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
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->active = true;
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->set(compact('company'));
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
