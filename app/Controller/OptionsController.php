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

class OptionsController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Options';
	
	/**
	 * Define the public actions.
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('get_value');
	}
	
	/**
	 * List the options in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array('order' => 'Option.id DESC');
		$this->set('options', $this->Option->find('all', $this->Option->find('all')));
	}
	
	/**
	 * Add option
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			if($this->Option->save($this->request->data)){
				$this->Session->setFlash(__('The option has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Edit option
	 * @param int id
	 * @return void
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Option->id = $id;	
		if($this->request->is('get')){
			$this->request->data = $this->Option->read();
		}else{
			if($this->Option->save($this->request->data)){
				$this->Session->setFlash(__('The option has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The option could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Delete option
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Option->id = $id;
		if(!$this->Option->exists()) {
			throw new NotFoundException(__('Invalid option.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Option->delete()){
			$this->Session->setFlash(__('Option deleted'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Option was not deleted.'));
		}
	}
	
	/**
	 * Get value
	 * @param string key
	 * @return array value
	 */
	public function get_value($key){
		$value = $this->Option->findByKey($key);
		return $value['Option']['value'];
	}
	
}