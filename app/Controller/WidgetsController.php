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

class WidgetsController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Widgets';
	
	/**
	 * Define the public actions
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('get_values', 'get_value');
	}
	
	/**
	 * List the widgets in painel control
	 * If user DEV show all widgets
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array('order' => 'Widget.id DESC');	
		if($this->Session->read('Auth.User.id') != 1){
			$params = array(
				'conditions' => array('Widget.page_id' => NULL, 'Widget.post_id' => NULL),
				'order' => 'Widget.id DESC'
			);	
		}
		$this->set('widgets', $this->Widget->find('all', $params));
	}
	
	/**
	 * Add widget
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			if($this->Widget->save($this->request->data)){
				$this->Session->setFlash(__('The widget has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else {
				$this->Session->setFlash(__('The widget could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Edit widget
	 * @param int id
	 * @return void
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Widget->id = $id;	
		if($this->request->is('get')){
			$this->request->data = $this->Widget->read();
		}else{
			if($this->Widget->save($this->request->data)){
				$this->Session->setFlash(__('The widget has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else {
				$this->Session->setFlash(__('The widget could not be saved. Please, try again.'));
			}
		}
		$this->set('posts', $this->Widget->Post->find('list'));
		$this->set('pages', $this->Widget->Page->find('list'));
	}
	
	/**
	 * Delete widget
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Widget->id = $id;
		if(!$this->Widget->exists()) {
			throw new NotFoundException(__('Invalid widget.'));
		}	
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Widget->delete()){
			$this->Session->setFlash(__('Widget deleted'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Widget was not deleted.'));
		}
	}
	
	/**
	 * Get value widget
	 * @param int key
	 * @return string
	 */
	public function get_value($key){
		$value = $this->Widget->findByKey($key);
		return $value['Widget'];
	}
	
	/**
	 * get values
	 * @return string
	 */
	public function get_values(){
		if ($this->request->is('requested')) {
			$widgets = $this->Widget->findAllByPageId($this->request->query['page_id']);
			$result = array();
			foreach ($widgets as $key => $value) {
				$result[$value['Widget']['key']] = $value['Widget']['value'];
			}
			return $result;
		}
	}
	
}