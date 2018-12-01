<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' =>[
                'controller' => 'Users',
                'action' => 'login'
             ],
            'loginRedirect' => [
                'controller' => 'Redirections',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Redirections',
                'action' => 'index'
            ],
            'authorize' => ['Controller'],
             // Si pas autorisé, on renvoit sur la page précédente
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Permet à l'action "display" de notre PagesController de continuer
        // à fonctionner. Autorise également les actions "read-only".
        // $this->Auth->allow(['display', 'view', 'index']);
    }

    public function isAuthorized($user) {
        // By default deny access.
        return false;
    }

    public static function array_on_key($array, $key)
    {
        if($array) {
            foreach ($array as $value) {
                $result[] = $value[$key];
            }
        } else {
            $result = array();
        }
        return $result;
    }

    public static function encrypt_url($email='')
    {
        $time = time();

        $url = Router::Url(['controller' => 'users', 'action' => 'resetPassword'], true) . '/' . $email;

        return $url;
    }

    public static function decrypt_url($hash='')
    {
        $data = array('email' => $hash);

        $data['valid'] = true;

        return $data;
    }

}


/*

manual debug


ob_start();
var_dump($user);
$output = ob_get_contents();
ob_end_flush();

file_put_contents('my_debug_1234.html', $output);


*/