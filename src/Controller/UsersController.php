<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow('signup', 'logout');
        
        $this->Auth->allow(['signup', 'logout']);
    }
    
    public $paginate = [
        'limit' => 50,
        'order' => [
            'Users.username' => 'asc'
        ]
    ];
        
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Reviews']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    public function signup()
    {

        $now = Time::now();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $newUser = $this->request->getData();
            $newUser['created_at'] = $now;
            $user = $this->Users->patchEntity($user, $newUser);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Sign up completed. Now you can log in.'));
                return $this->redirect(['controller' => 'Reviews', 'action' => 'index']);
           }

            $this->Flash->error(__('Something went wrong. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        /*$roles = $this->Users->Roles->find('list', [
            'conditions' => ['Roles.id LIKE' => '4']
        ]);*/
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $now = Time::now();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $newUser = $this->request->getData();
            $newUser['created_at'] = $now;
            $user = $this->Users->patchEntity($user, $newUser);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }
        public function changepassword($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->request->data['password'] == $this->request->data['newPassword']) {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }    
            else {
                $this->Flash->error(__('The passwords do not match.'));
            }    
                
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }
    public function profile($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $userId = $user['id'];
                $username = $user['username'];

                $this->request->session()->write('userid', $userId);
                $this->request->session()->write('username', $username);
                $this->request->session()->write('isAdmin', False);
                $this->request->session()->write('isDataAdmin', False);
                $this->request->session()->write('isModerator', False);
                $this->request->session()->write('isFilmReviewer', False);
                
                $query = TableRegistry::get('Roles_users')
                    ->find()
                    ->select(['role_id']) 
                    ->where(['user_id =' => $user['id']])
                    ->toArray();
                if (!empty($query)) {
                    foreach($query as $temp) {
                    // admins
                    if ($temp['role_id'] === 1) {
                        $this->request->session()->write('isAdmin', True);
                        //return True;
                    }
                    if ($temp['role_id'] === 2) {
                        $this->request->session()->write('isDataAdmin', True);
                    }
                    if ($temp['role_id'] === 3) {
                        $this->request->session()->write('isModerator', True);
                    }
                    if ($temp['role_id'] === 4) {
                        $this->request->session()->write('isFilmReviewer', True);
                    }
                }    
            }    
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    public function logout()
    {
        $this->request->session()->delete('userid');
        $this->request->session()->delete('username');
        $this->request->session()->delete('isAdmin');
        $this->request->session()->delete('isDataAdmin');
        $this->request->session()->delete('isModerator');
        $this->request->session()->delete('isFilmReviewer');
        $this->request->session()->destroy();
        
        
        $this->Flash->success('Log out completed.');
        return $this->redirect($this->Auth->logout());

    }
    
    public function isAuthorized($user)
    {
        $admin = 1;
        $moderator = 3;
        
        $id = $this->request->getParam('pass');

        $queryForRoles = TableRegistry::get('Roles_users')
                ->find()
           	->select(['role_id']) 
            	->where(['user_id =' => $user['id']])
                ->toArray();
        if (!empty($queryForRoles)) {
            foreach($queryForRoles as $temp) {
                // admins
                if ($temp['role_id'] == $admin) {
                    return True;
                }
                
                if ($temp['role_id'] == $moderator) {
                    if ($this->request->getParam('action') === 'edit') {
                        return True;
                    }
                }
            }    
        }
  
        // users can log out    
        if ($this->request->getParam('action') === 'logout') {
            return True;
        }
       
        // users can view and  edit their own profiles
        if (($this->request->getParam('action') === 'view') 
                || ($this->request->getParam('action') === 'edit')
                || ($this->request->getParam('action') === 'changepassword')
                || ($this->request->getParam('action') === 'delete')) {
            if ($id[0] == $user['id']) {
                return True;
            }

        }
    } 
}
