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

class PositionsController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Positions';
        
        /**
	 * Define the public actions
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow(
		'view_admin',
		'add',
		'edit',
		'delete'
		);
	}
	
	/**
	 * List the positions in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array('order' => 'Position.id ASC');
		$this->set('positions', $this->Position->find('all', $params));
	}
	
	/**
	 * Add position
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			if($this->Position->save($this->request->data)){
				// Set message and redirect
				$this->Session->setFlash(__('The position has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The position could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Edit position
	 * @throws NotFoundException
	 * @param int id
	 * @return void
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Position->id = $id;
		if (!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid position'));
		}
		if($this->request->is('post')){
			// Save template data		
			if($this->Position->save($this->request->data)){
				// Set message and redirect
				$this->Session->setFlash(__('The position has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The position could not be saved. Please, try again.'));
			}
		}else{
			$this->request->data = $this->Position->read();
		}
	}
	
	/**
	 * Delete position
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Position->id = $id;
		if(!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid position.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Position->delete()){
			$this->Session->setFlash(__('Position deleted.'));
			$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Position was not deleted.'));
		}
		
	}
	
}