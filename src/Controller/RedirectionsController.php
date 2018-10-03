<?php


namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RedirectionsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        
        $user = $this->Auth->user();
        if ($user) {
           switch ($user['role']) {
            case 'student':
                $this->Auth->allow(['index']);
                break;
            case 'administrator':
                $this->Auth->allow(['index', 'afterInternshipAdd']);
                break;
            case 'company':
                $this->Auth->allow(['index', 'afterInternshipAdd']);
                break;
            }
        } else {
            $this->Auth->allow(['index']);
        }
        
    }

    public function index()
    {
        $user = $this->Auth->user();
        
        if (!$user){
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        
        switch($user['role']){
            case "student":
                return $this->redirect(['controller' => 'internships', 'action' => 'index']);
                break;
            case "company":
                // To modify later the login must send to the intership propose by the company
                return $this->redirect(['controller' => 'Users', 'action' => 'viewCurrentUser']);
                break;
            case "administrator":
                // To modify later the login must send to the administrator profile page
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
                break;
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function afterInternshipAdd()
    {
        switch($this->Auth->user()['role']){
            case "company":
                return $this->redirect(['action' => 'index']);
                break;
            case "administrator":
                return $this->redirect(['controller' => 'internships', 'action' => 'index']);
                break;
        }
        return $this->redirect(['action' => 'index']);
    }

}

