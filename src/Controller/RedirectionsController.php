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
        
        $this->Auth->allow(['index']);
        
    }

    public function index(/*...$path*/)
    {
        $user = $this->Auth->user();
        /*ob_start();
        var_dump($user);
        $page = ob_get_clean();
        file_put_contents("filename1234.html", $page);*/
        
        if (!$user){
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        
        switch($user['role']){
            case "student":
                return $this->redirect(['controller' => 'internships', 'action' => 'index']);
                break;
            case "company":
                // To modify later the login must send to the intership propose by the company
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                break;
            case "administrator":
                // To modify later the login must send to the administrator profile page
                return $this->redirect(['controller' => 'users', 'action' => 'index']);
                break;
        }
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

}

