<?php
/**

CakeCMS - Rapid Development

Copyright 2013 by the contributors

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

This program incorporates work covered by the following copyright and
permission notices:

CakeCMS is (c) 2013 Willy Chagas - cakecms@gmail.com | willychagass@gmail.com -
http://cakecms.com.br

Wherever third party code has been used, credit has been given in the code's
comments.

CakeCMS is released under the GPL
*/

class UsersController extends AppController {
	
	/**
	 * Models
	 * @var array
	 */
	public $uses = array(
			'Post',
			'User',
			'Group',
		);
	
	/**
	 * Define the public actions
	 * @return void
	 */
	public function beforeFilter() {
   		 	parent::beforeFilter();
			$this->Auth->allow('index');
	}
	
	/**
	 * Login
	 * @return void
	 */
	public function login() {
		$this->layout = 'login';
   		if($this->request->is('post')){
       		if ($this->Auth->login()){
           			$this->redirect($this->Auth->redirect());
       		}else{
           			$this->Session->setFlash('Invalid user/password');
       		}
    	}elseif($this->Auth->login()){
    		$this->redirect(array('controller'=>'posts', 'action'=>'view_admin'));
    	}
	}

	/**
	 * Logout
	 * @return void
	 */
	public function logout() {
    	$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}
	
	/**
	 * List the users in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		// check if user is DEV (total permissins) else not list user DEV 
		if($this->Session->read('Auth.User.id') != 1){
			$conditions = array('order' => 'User.id DESC', 'conditions' => array('User.id != 1'));
		}else{
			$conditions = array('order' => 'User.id DESC');
		}
		$this->set('users', $this->User->find('all', $conditions));
	}

	/**
	 * List posts 
	 * @param string slug
	 * @return void
	 */
	public function index($slug = null){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
		$this->paginate	= array(
				'limit' => 5,
				'conditions' => array('Post.published' => 1, 'User.username' => $slug),
				'order' => array('Post.id' => 'DESC')
			);
		$this->set('posts', $this->paginate('Post'));
	}

	/**
	 * Show user
	 * @param int id
	 */
	public function view($id = null) {
		$this->layout = 'admin';
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	/**
	 * Add user
	 * @return void
	 */
	public function add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			if(($this->Session->read('Auth.User.Group.id') != 1) && ($this->request->data['User']['group_id'] == 1)){
				throw new NotFoundException(__('Invalid user'));
			}
			$this->User->create();
			$this->request->data['User']['user_id'] = $this->Auth->User('id');
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$conditions = $this->Session->read('Auth.User.id') != 1 ? array('Group.id != 1') : NULL;
		$this->set('groups', $this->User->Group->find('list', array('order' => 'id', 'conditions' => $conditions)));
	}

	/**
	 * Edit user
	 * @param id[int] =  user id
	 */
	public function edit($id = null) {
		$this->layout = 'admin';
		$this->User->id = $id;
		if( ($this->User->id == 1) && ($this->Session->read('Auth.User.id') != 1) ){
			throw new NotFoundException(__('Invalid User'));
		}
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if(($this->Session->read('Auth.User.Group.id') != 1) && ($this->request->data['User']['group_id'] == 1)){
				throw new NotFoundException(__('Invalid User'));
			}
			$this->request->data['User']['user_id'] = $this->Auth->User('id');
			if($this->request->data['User']['password'] != $this->request->data['User']['old_password']){
				$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$conditions = $this->Session->read('Auth.User.id') != 1 ? array('Group.id != 1') : NULL;
		$groups = $this->User->Group->find('list', array('order' => 'id', 'conditions' => $conditions));
		$this->set(compact('groups'));
	}


	/**
	 * Delete user
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Delete Error'));
		}
		$this->redirect(array('action' => 'view_admin'));
	}
	
}