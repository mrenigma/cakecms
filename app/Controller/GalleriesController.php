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

class GalleriesController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Galleries';
	
	/**
	 * Define the public views.
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('');
	}
	
	/**
	 * Helpers
	 * @var array
	 */
	public $helpers = array(
			'Js' => array('Jquery')
		);
	
	/**
	 * Models
	 * @var array
	 */
	public $uses = array(
			'Post',
			'Page',
			'Image',
			'Gallery'
		);
	
	/**
	 * List the categories in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array(
				'order' => 'Gallery.id DESC'
			);
		$this->set('galleries', $this->Gallery->find('all', $params));
	}
	
	/**
	 * Add gallery
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			$this->request->data['Gallery']['slug'] = Inflector::slug($this->request->data['Gallery']['title']);
			if($this->Gallery->save($this->request->data)){
				$this->Session->setFlash(__('The gallery has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}
		}
	}
	
	/**
	 * Add gallery Iframe
	 * @return void
	 */
	public function add_iframe(){
		$this->layout = 'iframe';
		if($this->request->is('post')){
			$this->request->data['Gallery']['slug'] = Inflector::slug($this->request->data['Gallery']['title']);
			$this->request->data['Gallery']['user_id'] = $this->Auth->user('id');
			if($this->Gallery->save($this->request->data)){
				$this->Session->write('gallery_id', $this->Gallery->id);
				$this->redirect(array('controller' => 'images', 'action' => 'add_iframe'));
			}else{
				$this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Edit gallery
	 * @param int id
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Gallery->id = $id;	
		if($this->request->is('get')){
			$this->request->data = $this->Gallery->read();
		}else{
			$this->request->data['Gallery']['slug'] = Inflector::slug($this->request->data['Gallery']['title']);
			if($this->Gallery->save($this->request->data)){
				$this->Session->setFlash(__('The category has been saved.'));
				$this->redirect(array('controller' => 'galleries', 'action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Delete gallery
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Gallery->id = $id;
		if(!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid category.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Gallery->delete()){
			$this->Session->setFlash(__('Gallery deleted'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Gallery was not deleted.'));
		}
	}
	
	/**
	 * Delete gallery iframe
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete_iframe($id){
		$this->Gallery->id = $id;
		if(!$this->Gallery->exists()) {
			throw new NotFoundException(__('Invalid category.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Gallery->delete()){
			$this->Session->setFlash(__('Gallery deleted'));
        	$this->redirect(array('action' => 'add_iframe'));
		}else{
			$this->Session->setFlash(__('Gallery was not deleted.'));
		}
	}
	
	/**
	 * Check if gallery exist
	 * @param int id
	 * @return bollean
	 */
	public function check_gallery($id = NULL){
		if ($this->request->is('requested')) {
			if($this->Gallery->findById($id)){
				return true;
			}
			return false;
		}
	}
	
	/**
	 * Define url IFrame
	 * @return string url
	 */
	public function set_url_iframe(){
		$controller = $this->request->query['controller'];	
		$action = $this->request->query['action'];
		$gallery_id = FALSE;
		if($controller == 'posts'){
			$database = $this->Post;
		}elseif($controller == 'pages'){
			$database = $this->Page;
		}
		if($action){
			$query = $database->findById($action);
			if($this->Gallery->findById($query['Gallery']['id'])){
				return '/images/add_iframe?gallery_id='.$query['Gallery']['id'];
			}else
			{
				return '/galleries/add_iframe/';
			}
		}elseif($this->Session->read('gallery_id')){
			return '/images/add_iframe?gallery_id='.$this->Session->read('gallery_id');
		}
		else{
			return '/galleries/add_iframe/';
		}
	}
	
}
