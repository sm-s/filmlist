<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
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
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Security');
        $this->loadComponent('Csrf');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ]
                ]
            ],
            'authorize' => ['Controller'],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Reviews',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);

        $this->Auth->allow(['display']);
    }
    
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view']);
        $this->Auth->config('authError', "Sorry, you can't access this area.");
    }
    
    /*public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    } 
    */


    
    public function isAuthorized($user)
    {
        
        if ( $this->request->action === 'index' || $this->request->action === 'view') {
        //if ( $this->request->action === 'index') {
            return True;
        }
        else {
            return False;
        }

        /*
        if (!empty($user->roles)) {
            foreach ($user->roles as $roles) {
                if ($this->request->action === 'add' 
                        || $this->request->action === 'edit'
                        || $this->request->action === 'view' 
                        || $this->request->action === 'index'
                        || $this->request->action === 'delete') {
                    if ($roles->id === 1 || $roles->id === 2) {
                        return True;
                    }    
                }
                else {
                    return false;
                }

            }  
            
        } */   
    }
    
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
