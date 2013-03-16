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

App::uses('AppController', 'Controller');
class GroupsController extends AppController {
	
	/**
	 * Define the public views.
	 * @return void
	 */
	public function beforeFilter() {
    	parent::beforeFilter();
		$this->Auth->allow('');
	}

	/**
	 * List the groups in painel control
	 * @return void
	 */
	public function view_admin() {
		$this->layout = 'admin';
		$params = array('order' => 'Group.id DESC');
		$this->set('groups', $this->Group->find('all', $params));
	}

	/**
	 * Add group
	 * @return void
	 */
	public function add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'view_admin'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * Edit group
	 * @param int id
	 * @return void
	 */
	public function edit($id = null) {
		$this->layout = 'admin';
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'view_admin'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
	}

	/**
	 * Delete group
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Group->id = $id;
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'));
			$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Group was not deleted.'));
		}
	}
	
}