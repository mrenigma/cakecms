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

class CommentsController extends AppController{
	
	/**
	 * Name 
	 * @var string
	 */
	public $name = 'Comments';
	
	/**
	 * Define the public views
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('index', 'view', 'get_comments', 'add');
	}
	
	/**
	 * List comments in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array('order' => 'Comment.id DESC');
		$this->set('comments', $this->Comment->find('all', $params));
	}
		
	/**
	 * Add comment
	 * @return void
	 */
	public function add(){
		$this->layout = 'site';
		$this->autoRender = false;
		if($this->request->is('post')){
			// Reply comment
			$parent_id = explode('=', $this->referer());
			if(isset($parent_id[1])){
				$parent_id = substr($parent_id[1], 0, -1);;
				$this->request->data['Comment']['parent_id'] = $parent_id;
			}
			if($this->Comment->save($this->request->data)){
				$this->Session->setFlash(__('Waiting for this comment validation.'), 'default', array('class' => 'comment_ok'), 'comment');
				$this->redirect($this->referer().'#comment');
			}else{
				$this->Session->setFlash(__('Error while commenting on the post, check the required fields (*).'), 'default', array('class' => 'comment_error'), 'comment');	
				$this->redirect($this->referer().'#comment');
			}
		}
	}
	
	/**
	 * Edit comment
	 * @param int id
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Comment->id = $id;	
		if($this->request->is('get')){
			$this->request->data = $this->Comment->read();
		}else{
			if($this->Comment->save($this->request->data)){
				$this->Session->setFlash(__('The category has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}
		}
	}
	
	/**
	 * Delete comment
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Comment->id = $id;
		if(!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Comment->delete()){
			$this->Session->setFlash(__('Comment deleted.'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Comment was not deleted.'));
		}
	}
	
	/**
	 * Get comments
	 * This utility in CategoryHelper.php to list/count comments
	 * @param int id
	 * @return array comments
	 */
	public function get_comments($id = null){
		if ($this->request->is('requested')) {
			$params = array(
					'conditions' => array("Comment.post_id" => $id, "Comment.published" => 1)
				);
			return $this->Comment->find('threaded', $params);
        } 
	}
	
}