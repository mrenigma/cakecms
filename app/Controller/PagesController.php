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
class PagesController extends AppController {
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Pages';
	
	/**
	 * Models
	 * @var array
	 */
	public $uses = array(
			'Post',
			'Page',
			'Image',
			'Gallery',
			'Widget',
			'Input',
			'Template'
		);
	
	/**
	 * Helpers
	 * @var array
	 */
	public $helpers = array(
			'Js' => array('Jquery')
		);
		
	/**
	 * Define the public actions
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('index', 'view', 'display', 'get_pages_portfolio');
	}
	
	/**
	 * Static pages
	 * @return void
	 */
	public function display() {
		$this->layout = 'site';
		$this->theme = 'Example';
		$path = func_get_args();
		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}


	/**
	 * Page index.
	 * Define in config/routes.php
	 * @return void
	 */
	public function index(){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
	}
	
	/**
	 * Show page
	 * @param string slug
	 * @return void
	 */
	public function view($slug = null){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
		$params = array(
				'conditions' => array("Page.slug" => $slug, "Page.published" => 1)
			);
		$page = $this->Page->find('first', $params);
		$this->view = $page['Template']['file'];

		// Set Gallery
		if( (isset($this->Page->Gallery)) && ($this->view == 'gallery') ){
			$images = $this->Page->Gallery->findById($page['Gallery']['id']);
			$this->set('images', $images['Image']);
		}
		
		// Set Widgets
		$widgets = $this->requestAction('widgets/get_values?page_id='.$page['Page']['id']);
		$this->set('widgets', $widgets);
		$this->set('page', $page);
		$this->Page->id = $page['Page']['id'];
		$this->Page->save(array('Page' => array('views'=>$page['Page']['views']+1)));
	}
	
	/**
	 * List the pages in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array('order' => 'Page.id DESC');
		$this->set('pages', $this->Page->find('all', $params));
	}

	/**
	 * Add page
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			// Set gallery and template gallery
			$gallery_id = $this->Session->read('gallery_id') ? $this->Session->read('gallery_id') : NULL;
			$this->request->data['Page']['gallery_id'] = $gallery_id;
			// Author is user logged
			$this->request->data['Page']['user_id'] = $this->Auth->user('id');
			// Slug
			$this->request->data['Page']['slug'] = Inflector::slug($this->request->data['Page']['title']);
			// Thumb
			$this->Uploader = new Uploader();
			if ($file = $this->Uploader->upload('src')) {
				// thumb
				$small = $this->Uploader->crop(array('width' => Configure::read('Image_thumb.width'), 'height' => Configure::read('Image_thumb.height')));
				$this->Uploader->crop();
				// set imgs
				$this->request->data['Page']['thumb'] = $small;
			}
			// Save Page data
			if($this->Page->save($this->request->data)){
				// Save Widgets
				if($this->request->data['Widget']){
					foreach($this->request->data['Widget'] as $key => $value) {
						if($value != NULL){
							$this->Widget->create();
							$this->Widget->save(array('page_id' => $this->Page->id,  'title' => $key, 'key' => $key, 'value' => $value));
						}
					}
				}
				// Delete Session gallery. Used for related using iframe 
				$this->Session->delete('gallery_id');
				// Set message and redirect
				$this->Session->setFlash(__('The page has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		}else{
			// Delete Session and gallery not related
			$this->Gallery->delete($this->Session->read('gallery_id'));
			$this->Session->delete('gallery_id');
		}
		// Set values for view
		$this->set('inputs', $this->Input->find('all'));
		$this->set('templates', $this->Page->Template->find('all'));
		$this->set('widgets', $this->Widget->find('all'));
	}
	
	/**
	 * Edit page
	 * @param int id
	 * @return void
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Page->id = $id;	
		// Set Widget values for create dinamic inputs 
		$i = $this->Input->find('all');
		$w = $this->Widget->findAllByPageId($this->Page->id);
		foreach ($i as $key => $value) {
			foreach ($w as $k => $v) {
				if($value['Input']['name'] == $v['Widget']['key']){
					$i[$key]['value'] = $v['Widget']['value'];
				}
			}
		}
		if($this->request->is('get')){
			$this->request->data = $this->Page->read();
			$this->Gallery->delete($this->Session->read('gallery_id'));
			$this->Session->delete('gallery_id');
		}else{
			if($this->Session->read('gallery_id')){
				if(isset($gallery_id) && $gallery_id !== NULL)
					$this->request->data['Page']['template_id'] = 2;
				$this->request->data['Page']['gallery_id'] = $this->Session->read('gallery_id');
			}
			// Slug
			$this->request->data['Page']['slug'] = Inflector::slug($this->request->data['Page']['title']);
			// Thumb
			$this->Uploader = new Uploader();
			if ($file = $this->Uploader->upload('src')) {
				$img = $this->Page->findById($id);
				$this->Uploader->delete($img['Page']['thumb']);
				// thumb
				$small = $this->Uploader->resize(array('width' => Configure::read('Image_thumb.width'), 'height' => Configure::read('Image_thumb.height')));
				$this->Uploader->crop();
				// set imgs
				$this->request->data['Page']['thumb'] = $small;
			}
			if($this->Page->save($this->request->data)){
				// Save Widgets
				if($this->request->data['Widget']){
					foreach($this->request->data['Widget'] as $key => $value) {
						if($value != NULL){
							$widget_id = $this->Widget->find('first', array('conditions'=> array('key' => $key, 'page_id'=>$this->Page->id)));
							$this->Widget->id = $widget_id['Widget']['id'];
							$this->Widget->save(array('page_id' => $this->Page->id,  'title' => $key, 'key' => $key, 'value' => $value));
						}
					}
				}
				$this->Session->delete('gallery_id');
				$this->Session->setFlash(__('The page has been saved.'));
				$this->redirect(array('controller' => 'pages', 'action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		}
		$template_checked = $this->Page->findById($this->Page->id);
		$this->set('templates', $this->Page->Template->find('all'));
		$this->set('template_checked', $template_checked['Page']['template_id']);
		$this->set('inputs', $i);
	}
	
	/**
	 * Delete page
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Page->id = $id;	
		if(!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid page.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$g = $this->Page->findById($id);
		if($this->Page->delete()){
			$this->Gallery->delete($g['Page']['gallery_id']);
			$this->Session->setFlash(__('Page deleted.'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Page was not deleted.'));
		}
	}

	/**
	 * Delete thumb
	 * @return void
	 */
	public function delete_thumb(){
		$this->autoRender = false;
		if($this->request->is('post')){
			$this->Uploader = new Uploader();
			$this->Uploader->delete($this->request->data['thumb']);
			$this->Page->id = $this->request->data['id'];
			$this->request->data['thumb'] = NULL;
			$this->Page->save($this->request->data);
		}
	}
	
}