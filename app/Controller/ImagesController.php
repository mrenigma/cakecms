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

App::import('Vendor', 'Uploader.Uploader');
class ImagesController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Images';
	
	/**
	 * Models
	 * @var array
	 */
	public $uses = array(
			'Image',
			'Gallery'
		);
	
	/**
	 * Helpers
	 * @var array
	 */
	public $helpers = array(
			'Js' => array('Jquery')
		);
		
	/**
	 * Define the public views.
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('gallery_home');
	}
	
	/**
	 * List the images in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array(
				'order' => 'Image.id DESC'
			);
		$this->set('images', $this->Image->find('all', $params));
	}
	
	/**
	 * APAGAR
	 */
	public function gallery_home(){
		if ($this->request->is('requested')) {
			return $this->Image->findAllByGalleryId(1);
        }
	}
	
	/**
	 * APAGAR
	 */
	public function gallery_home_admin(){
		$this->layout = 'admin';
		$this->set('images', $this->Image->findAllByGalleryId(1));
	}
	
	/**
	 * Add image
	 * @return void
	 */
	public function add(){
		$this->Uploader = new Uploader();
		$this->layout = 'admin';
		if($this->request->is('post')){
			if ($file = $this->Uploader->upload('src')) {
				$medium = $this->Uploader->resize(array('width' => Configure::read('Image_large.width'), 'height' => Configure::read('Image_large.height'), 'aspect'=>false));
				$this->Uploader->crop();
				$small = $this->Uploader->resize(array('width' => Configure::read('Image_thumb.width'), 'height' => Configure::read('Image_thumb.height')));
				$this->Uploader->crop();
				$this->request->data['Image']['small'] = $small;
				$this->request->data['Image']['medium'] = $medium;
				$this->request->data['Image']['large'] = $file['path'];
				$this->request->data['Image']['slug'] = Inflector::slug($this->request->data['Image']['title']);
				if($this->Image->save($this->request->data)){
					$this->Session->setFlash(__('The images has been saved.'));
					$this->redirect(array('action' => 'view_admin'));
				}else{
					$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
				}
			}
		}
		$this->set('galleries', $this->Image->Gallery->find('list'));
	}
	
	/**
	 * Add images Iframe
	 * @return void
	 */
	public function add_iframe(){
		$gallery_id = $this->Session->read('gallery_id') ? $this->Session->read('gallery_id') : $this->request->query['gallery_id'];
		$this->Uploader = new Uploader();
		$this->layout = 'iframe';
		if($this->request->is('post')){
			if ($file = $this->Uploader->upload('src')) {
				// medium
				$medium = $this->Uploader->resize(array('width' => Configure::read('Image_large.width'), 'height' => Configure::read('Image_large.height')));
				$this->Uploader->crop();
				// thumb
				$small = $this->Uploader->resize(array('width' => Configure::read('Image_thumb.width'), 'height' => Configure::read('Image_thumb.height')));
				$this->Uploader->crop();
				// set imgs
				$this->request->data['Image']['gallery_id'] = $gallery_id;
				$this->request->data['Image']['small'] = $small;
				$this->request->data['Image']['medium'] = $medium;
				$this->request->data['Image']['large'] = $file['path'];
				// save
				$this->request->data['Image']['slug'] = Inflector::slug($this->request->data['Image']['title']);
				if($this->Image->save($this->request->data)){
					$this->Session->setFlash(__('The images has been saved.'));
				}
			}
		}
		$params = array(
				'order' => array('Image.ord' => 'asc'),
           	 	'conditions' => array('Image.gallery_id' => $gallery_id),
			);
		$this->set('gallery_id', $gallery_id);
		$this->set('images', $this->Image->find('all', $params));
	}

	/**
	 * Delete image Iframe
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return string
	 */
	public function delete_iframe($id){
		if(!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->Uploader = new Uploader();
		$img = $this->Image->findById($id);
		$this->Uploader->delete($img['Image']['small']);
		$this->Uploader->delete($img['Image']['medium']);
		$this->Uploader->delete($img['Image']['large']);
		if($this->Image->delete($id)){
        	echo '1';
		}
	}

	/**
	 * Edit image
	 * @param int id
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Image->id = $id;	
		if($this->request->is('get')){
			$this->request->data = $this->Image->read();
		}else{
			$this->request->data['Image']['slug'] = Inflector::slug($this->request->data['Image']['title']);
			if($this->Image->save($this->request->data)){
				$this->Session->setFlash(__('The image has been saved.'));
				$this->redirect(array('controller' => 'images', 'action' => 'view_admin'));
			}
		}
		$this->set('galleries', $this->Image->Gallery->find('list'));
	}
	
	/**
	 * Edit image iframe
	 * get id ($data['id']) with ajax
	 * @return void
	 */
	public function edit_iframe(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		if($this->request->is('post')){
			foreach($this->request->data as $id => $data){
				$this->Image->id = $data['id'];
				$this->request->data['Image']['ord'] = $data['order'];
				$this->Image->save($this->request->data);
			}
		}
	}
	
	/**
	 * Delete image
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Image->id = $id;
		if(!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$this->Uploader = new Uploader();
		$img = $this->Image->findById($id);
		$this->Uploader->delete($img['Image']['small']);
		$this->Uploader->delete($img['Image']['medium']);
		$this->Uploader->delete($img['Image']['large']);
		if($this->Image->delete()){
			$this->Session->setFlash(__('Image deleted.'));
			if(isset($this->request->params['action']['gallery_home_admin'])){
				$this->redirect(array('action' => 'gallery_home_admin'));
			}
			$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Image was not deleted.'));
		}
	}
}