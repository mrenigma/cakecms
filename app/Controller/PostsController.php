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
class PostsController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Posts';
	
	/**
	 * Helpers
	 * @var array
	 */
	public $helpers = array(
			'PaginatorCakeCMS'
		);
	
	/**
	 * Models
	 * @var array
	 */
	public $uses = array(
			'Post',
			'Category',
			'Image',
			'Gallery',
			'Widget'
		);
		
	/**
	 * Define the public actions
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('index', 'view', 'last_posts', 'popular_posts', 'search', 'get_post_paginator');
	}
	
	/**
	 * List the categories in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$this->set('posts', $this->Post->find('all', array('order' => 'Post.id DESC')));
	}
	
	/**
	 * Show the post
	 * @param string slug
	 * @return void
	 */
	public function view($slug = null){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
		$params = array(
				'conditions'=> array("Post.slug" => $slug, "Post.published" => 1)
			);
		$post = $this->Post->find('first', $params);
		$this->view = $post['Template']['file'];
		// Set Gallery
		if( (isset($this->Post->Gallery)) && ($this->view == 'gallery') ){
			$images = $this->Post->Gallery->findById($post['Gallery']['id']);
			$this->set('images', $images['Image']);
		}
		$this->set('post', $post);
		$this->Post->id = $post['Post']['id'];
		$this->Post->save(array('Post' => array('views'=>$post['Post']['views']+1)));
	}
	
	/**
	 * List posts
	 * @return void
	 */
	public function index(){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
		$this->paginate = array(
			'limit'=>5, 
			'order' => array('Post.id' => 'desc'),
            'conditions' => array('Post.published' => 1),
        );
		$this->set('posts', $this->paginate('Post'));
	}
	
	/**
	 * Search
	 * @return void
	 */
	public function search(){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
		$s = isset($this->request->query['t']) ? $this->request->query['t'] : '';
		$this->paginate = array(
			'limit'=>5, 
			'order' => array('Post.id' => 'desc'),
            'conditions' => array('OR' => array(
									array('Post.title LIKE' => '%'.$s.'%'),
									array('Post.text LIKE' => '%'.$s.'%')
								)
						)
       	);
		$posts = $this->paginate('Post');		
		if(!$s)
			$posts = null;
		$this->set('posts', $posts);
		$this->set('slug', $s);
	}
		
	/**
	 * Add post
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			// Gallery	
			$gallery_id = $this->Session->read('gallery_id') ? $this->Session->read('gallery_id') : NULL;
			$this->request->data['Post']['gallery_id'] = $gallery_id;
			// Slug
			$this->request->data['Post']['slug'] = Inflector::slug($this->request->data['Post']['title']);
			// User 
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			// Thumb
			$this->Uploader = new Uploader();
			if ($file = $this->Uploader->upload('src')) {
				// thumb
				$small = $this->Uploader->resize(array('width' => Configure::read('Image_thumb.width'), 'height' => Configure::read('Image_thumb.height')));
				$this->Uploader->crop();
				// set imgs
				$this->request->data['Post']['thumb'] = $small;
			}
			if($this->Post->save($this->request->data)){
				$this->Session->delete('gallery_id');
				$this->Session->setFlash(__('The post has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}else{
			$this->Gallery->delete($this->Session->read('gallery_id'));
			$this->Session->delete('gallery_id');
		}
		$this->set('users', $this->Post->User->find('list', array('conditions'=> array('User.id != 1'))));
		$this->set('categories', $this->Post->Category->find('list'));
		$this->set('templates', $this->Post->Template->find('all', array('conditions' => array('Template.id = 2 OR Template.id = 1'))));
		$this->set('widgets', $this->Widget->find('all'));
	}
	
	/**
	 * Edit post
	 * @param int id
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Post->id = $id;	
		if($this->request->is('get')){
			$this->request->data = $this->Post->read();
			$this->Gallery->delete($this->Session->read('gallery_id'));
			$this->Session->delete('gallery_id');
		}else{
			// Gallery
			if($this->Session->read('gallery_id')){
				$this->request->data['Post']['gallery_id'] = $this->Session->read('gallery_id');
			}
			// Slug
			$this->request->data['Post']['slug'] = Inflector::slug($this->request->data['Post']['title']);
			// Thumb
			$this->Uploader = new Uploader();
			if ($file = $this->Uploader->upload('src')) {
				$img = $this->Post->findById($id);
				$this->Uploader->delete($img['Post']['thumb']);
				// thumb
				$small = $this->Uploader->resize(array('width' => 225, 'height' => Configure::read('Image_thumb.height')));
				$this->Uploader->crop();
				// set imgs
				$this->request->data['Post']['thumb'] = $small;
			}
			if($this->Post->save($this->request->data)){
				$this->Session->delete('gallery_id');
				$this->Session->setFlash(__('The post has been saved.'));
				$this->redirect(array('controller' => 'posts', 'action' => 'view_admin'));
			}else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$template_checked = $this->Post->findById($this->Post->id);
		$this->set('users', $this->Post->User->find('list', array('conditions'=> array('User.id != 1'))));
		$this->set('template_checked', $template_checked['Post']['template_id']);
		$this->set('categories', $this->Post->Category->find('list'));
		$this->set('templates', $this->Post->Template->find('all', array('conditions' => array('Template.id = 2 OR Template.id = 1'))));
		$this->set('widgets', $this->Widget->find('all'));
	}
	
	/**
	 * Delete post
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Post->id = $id;
		if(!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post.'));
		}	
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$g = $this->Post->findById($id);
		if($this->Post->delete($id)){
			$this->Gallery->delete($g['Post']['gallery_id']);
        	$this->redirect(array('action' => 'view_admin'));
		}
	}
	
	/**
	 * last posts
	 * @param int num_posts = set posts number / default 5
	 * @return array posts
	 */
	public function last_posts(){
		$num_posts =  isset($this->params->query['num']) ? $this->params->query['num'] : 5;
		if ($this->request->is('requested'))
			return $this->Post->find('all', array('limit' => $num_posts, 'order' => 'Post.id DESC'));
	}
	
	/**
	 * Popular posts
	 * @param num_posts[Int] = set posts number / default 5
	 * @return array posts
	 */
	public function popular_posts(){
		$num_posts =  isset($this->params->query['num']) ? $this->params->query['num'] : 5;
		if ($this->request->is('requested'))
			return $this->Post->find('all', array('limit' => $num_posts, 'order' => 'Post.views DESC'));
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
			$this->Post->id = $this->request->data['id'];
			$this->request->data['thumb'] = NULL;
			$this->Post->save($this->request->data);
		}
	}

	/**
	 * Paginate post (next/prev) in post
	 * @return array posts
	 */
	public function get_post_paginator($id){
		if ($this->request->is('requested')){
			$type = $this->request->params['named']['type'];
			if($type == 'next'){
				$conditions = array('Post.id > '.$id);
				$order = 'Post.id ASC';
			}else{
				$conditions = array('Post.id < '.$id);
				$order = 'Post.id DESC';
			}
			$posts = $this->Post->find('first', array('conditions' => $conditions, 'order' => $order));
			return $posts;
		}
	}
	
}