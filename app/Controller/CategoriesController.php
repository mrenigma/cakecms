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

class CategoriesController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Categories';
	
	/**
	 * Define the public actions
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow(
				'index',
				'view', 
				'get_categories'
			);
	}
	
	/**
	 * List the categories in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$this->set('categories', $this->Category->find('all'));
	}
		
	/**
	 * Add category
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			$this->request->data['Category']['parent_id'] = $this->request->data['Parent']['category_id'];
			$this->request->data['Category']['slug'] = Inflector::slug($this->request->data['Category']['title']);
			if($this->Category->save($this->request->data)){
				$this->Session->setFlash(__('The category has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$this->set('categories', $this->Category->find('list'));
	}
	
	/**
	 * Edit category
	 * @throws NotFoundException
	 * @param int id
	 * @return void
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Category->id = $id;
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}	
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Category']['slug'] = Inflector::slug($this->request->data['Category']['title']);
			$this->request->data['Category']['parent_id'] = $this->request->data['Parent']['category_id'];
			if($this->Category->save($this->request->data)){
				$this->Session->setFlash(__('The category has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}else{
			$this->request->data = $this->Category->read();
			$this->set('categories', $this->Category->find('list'));
		}
	}
	
	/**
	 * Delete category
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Category->id = $id;
		if(!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Category->delete()){
			$this->Session->setFlash(__('Category deleted.'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Category was not deleted.'));
		}
		
	}
	
	/**
	 * List the posts for categories
	 * @param string slug
	 * @return void
	 */
	public function index($slug = null){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
		$category_id = $this->Category->findBySlug($slug);
		$this->paginate = array(
				'limit' => 5,
				'joins' => array(
						array(
								'table' => 'categories_posts',
								'alias' => 'C',
								'type' => 'INNER',
								'conditions' => array(
										'C.post_id = Post.id',
										'C.category_id = '.$category_id['Category']['id']
									)
							),
					),
				'conditions' => array('Post.published' => 1),
				'order' => array('Post.id' => 'DESC')
			);
		$this->set('posts', $this->paginate('Post'));
	}
	
	/**
	 * Get categories
	 * This utility in CategoryHelper.php to create item menu
	 * @return array categories
	 */
	public function get_categories(){
		if ($this->request->is('requested')) {
            $this->Category->find('threaded');
			$this->Category->unbindModel(array('hasAndBelongsToMany' => array('Post')));
			return $this->Category->find('threaded');
        } 
	}
	
}