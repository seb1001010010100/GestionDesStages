<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Mailer\Email;

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
                $this->Auth->allow(['logout', 'viewCurrentUser']);
                break;
            case 'company':
                $this->Auth->allow(['logout', 'viewCurrentUser']);
                break;
            case 'administrator':
                $this->Auth->allow(['logout', 'view', 'viewCurrentUser', 'index']);
                break;
            }
        } else {
            $this->Auth->allow(['login', 'resetPasswordEmail', 'sendResetPwdEmail', 'resetPassword']);
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
        $this->redirect(['controller' => Inflector::pluralize($user['role']), 'action' => 'view', $user['role_data']['id']]);
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

        if ($user) {
           switch ($user['role']) {
            case 'student':
                $table = TableRegistry::get('students');
                break;
            case 'company':
                $table = TableRegistry::get('companies');
                break;
            case 'administrator':
                $table = TableRegistry::get('administrators');
                break;
            }
        }

        $role_info = $table->find()
            ->where(['email' => $user['username']])->first();
        
        return $role_info;
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

    public function resetPasswordEmail()
    {
        if ($this->request->is('post')) {
            
            $email = $this->request->getData('email');

            $user = $this->Users->find('all', [
                'conditions' => ['Users.username' => $email]
            ])->first();

            if ($user) {

                $this->sendResetPwdEmail($user);

            }

            $this->Flash->success(__('L\'email a été envoyé.'));
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }
    }

    public function sendResetPwdEmail($user=null)
    {
        if ($user) {
            
            $url = parent::encrypt_url($user['username']);

            // http://www.naidim.org/cakephp-3-tutorial-9-reset-password
            $email = new Email();
            $email->template('resetpw');
            $email->emailFormat('both');
            $email->setTo($user['username']);
            $email->setSubject('Reset your password');
            $email->viewVars(['url' => $url, 'username' => $user['username']]);

            if ($email->send()) {
            } else {
                $this->Flash->error(__('Erreur pour l\'envoie de l\'email: ') . $email->smtpError);
            }

        }
    }

    public function resetPassword($hash='')
    {

        $data =  parent::decrypt_url($hash);

        if (!$data['valid']) {
            $this->Flash->error(__('Ce lien n\'est plus valide.'));
            return $this->redirect(['controller' => 'users', 'action' => 'login']);
        }


        if ($this->request->is('post')) {

            $pw1 = $this->request->getData('pw1');
            $pw2 = $this->request->getData('pw2');

            if ($pw1 && $pw1 == $pw2) {

                $user = $this->Users->find('all', [
                    'conditions' => ['Users.username' => $data['email']]
                ])->first();

                if ($user) {
                    $user['password'] = $pw1;

                    if ($this->Users->save($user)) {
                        $this->Flash->set(__('votre mot de passe a été modifié.'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('Le mot de passe n\'a pas pu être modifier.'));
                    }
                } else {
                    $this->Flash->error(__('Le mot de passe n\'a pas pu être modifier.'));
                }
            } else {
                $this->Flash->error(__('Entrer correctement le mot de passe.'));
            }

        }
    }

}