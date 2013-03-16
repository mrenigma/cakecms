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

class MenusController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Menus';
	
	/**
	 * Define the public views.
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('view');
	}
	
	/**
	 * List the categories in painel control
	 * @return 
	 * 		if ($this->request->is('requested')) array menus 
	 * 		else void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$menu_filter =  isset($this->params->query['position_id']) ? $this->params->query['position_id'] : 1;
		$params = array(
				'conditions' => array('position_id' => $menu_filter),
				'order' => array('ord' => 'asc')
			);
			
		$menus = $this->Menu->find('threaded', $params);
		if ($this->request->is('requested')) {
            return $menus;
        }else{
			$this->set('menus', $menus);
			$this->set('positions', $this->Menu->Position->find('list'));
			$this->set('pages', $this->Menu->Page->find('list', array('conditions' => array('Page.published' => 1))) );
			$this->set('categories', $this->Menu->Category->find('list'));
		}
	}

	/**
	 * Show menu
	 * conditional menu $menu_filter =  isset($this->params->query['position']) ? $this->params->query['position'] : 'topo';
	 * @return array menus
	 */
	public function view(){
		$this->layout = 'site';
		$menu_filter =  isset($this->params->query['position']) ? $this->params->query['position'] : 'topo';
		$params = array(
				'conditions' => array('Position.slug' => $menu_filter),
				'order' => array('ord' => 'asc')
			);
		$menus = $this->Menu->find('threaded', $params);
		if ($this->request->is('requested')) {
            return $menus;
        }
	}

	/**
	 * Add menu
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			// Custom	
			if(!empty($this->request->data['Menu']['custom'])){
				$this->request->data['Menu']['url'] = $this->request->data['Menu']['custom'];
			}
			// Page
			elseif(!empty($this->request->data['Menu']['page_id'])){
				$page = $this->Menu->Page->findById($this->request->data['Menu']['page_id']);
				$this->request->data['Menu']['url'] = $page['Page']['slug'];
			}
			// List posts in category
			elseif(!empty($this->request->data['Menu']['category_id'])){
				$category = $this->Menu->Category->findById($this->request->data['Menu']['category_id']);
				$this->request->data['Menu']['url'] = 'categoria/'.$category['Category']['slug'];
			}
			unset($this->request->data['Menu']['custom']);
			
			$this->request->data['Menu']['parent_id'] = 0;
			if($this->Menu->save($this->request->data)){
				$this->redirect(array('action' => 'view_admin'));
			}
		}else{
			$this->redirect(array('action' => 'view_admin'));
		}
	}
	
	
	/**
	 * Edit order menu
	 * @return void
	 */
	public function edit(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		if($this->request->is('post')){
			foreach($this->request->data as $id => $data){
				$this->Menu->id = $data['id'];
				$this->request->data['Menu']['parent_id'] = $data['parent'];
				$this->request->data['Menu']['ord'] = $data['order'];
				$this->Menu->save($this->request->data);
			}
		}
	}	

	/**
	 * Delete menu
	 * @throws MethodNotAllowedException
	 * @return void
	 */
	public function delete(){
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->Menu->delete($this->request->data('id'));
	}
	
}