<?php


namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class RedirectionsController extends AppController
{
    public function index(/*...$path*/)
    {
        $user = $this->Auth->user();
        /*ob_start();
        var_dump($user);
        $page = ob_get_clean();
        file_put_contents("filename1234.html", $page);*/
        
        if (!$user){
            return $this->redirect(['controlleur' => 'Users', 'action' => 'login']);
        }
        
        switch($user['role']){
            case "student":
                return $this->redirect(['controller' => 'internships', 'action' => 'index']);
                break;
            case "company":
                // To modify later the login must send to the intership propose by the company
                return $this->redirect(['controller' => 'companies', 'action' => 'index']);
                break;
            case "administrator":
                // To modify later the login must send to the administrator profile page
                return $this->redirect(['controlleur' => 'Users', 'action' => 'login']);
                break;
            default:
                return $this->redirect(['controlleur' => 'Users', 'action' => 'login']);
                break;
        }
        
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}

