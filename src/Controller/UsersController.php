<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{

    public function initialize() {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user = $this->Auth->user();
        if ($user) {
           switch ($user['role']) {
            case 'student':
                $this->Auth->allow(['logout']);
                break;
            case 'company':
                $this->Auth->allow(['logout']);
                break;
            case 'administrator':
                $this->Auth->allow(['logout', 'view', 'index']);
                break;
            }
        } else {
            $this->Auth->allow(['login']);
        }
    }

    public function index()
    {
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }
    
    public function viewCurrentUser()
    {
        $user = $this->Auth->user();
        $this->redirect(['action' => 'view', $user['id']]);
    }
    
    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $user['role_data'] = $this->findRoleData($user);
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function findRoleData($user)
    {
        $studentsTable = TableRegistry::get('students');
        $student = $studentsTable->find()
            ->where(['email' => $user['username']]);
        if ($student) {
            return $student->first();
        } else {
            $companiesTable = TableRegistry::get('companies');
            $company = $companiesTable->find()
                ->where(['email' => $user['username']]);
            if ($company) {
                return $company->first();
            } else {
                $administratorsTable = TableRegistry::get('administrators');
                $administrator = $administratorsTable->find()
                    ->where(['email' => $user['username']]);

                ob_start();
                var_dump($administrator);
                $output = ob_get_contents();
                ob_end_clean();
                file_put_contents('filename_1234.html', $output);

                if ($administrator) {
                    return $administrator->first();
                }
            }
        }
        return false;
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    // after successful login this method is called
    public function redirectAccordingToRole()
    {
        $user = $this->Auth->user();
        switch ($user['role']) {
            case 'student':
                return $this->redirect(['controller' => 'students', 'action' => 'index']);
                break;
            case 'company':
                return $this->redirect(['controller' => 'companies', 'action' => 'index']);
                break;
            default:
                return $this->redirect(['controller' => '', 'action' => '']);
                break;
        }
    }

}