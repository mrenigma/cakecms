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
class TemplatesController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Templates';
	
	/**
	 * Define the public actions
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('get_ids', 'get_data_radio',
		'view_admin',
		'add',
		'edit',
		'delete'
		);
	}
	
	/**
	 * List the templates in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array('order' => 'Template.id ASC');
		$this->set('templates', $this->Template->find('all', $params));
	}
	
	/**
	 * Add template
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			// Thumb
			$this->Uploader = new Uploader();
			if ($file = $this->Uploader->upload('icon')) {
				// thumb
				$icon = $this->Uploader->crop(array('width' => 110, 'height' => 110));
				$this->Uploader->crop();
				// set imgs
				$this->request->data['Template']['icon'] = $icon;
			}
			// Save template data
			$file = $this->request->data['Template']['file']['name'];
			$file = explode('.', $file);
			$this->request->data['Template']['file'] = $file[0];
			
			if($this->Template->save($this->request->data)){
				// Set message and redirect
				$this->Session->setFlash(__('The template has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The template could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Edit template
	 * @throws NotFoundException
	 * @param int id
	 * @return void
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if($this->request->is('get')){
			$this->request->data = $this->Template->read();
		}else{
			// Thumb
			if($this->request->data['Template']['icon']){
				$this->Uploader = new Uploader();
				if ($file = $this->Uploader->upload('icon')) {
					// thumb
					$icon = $this->Uploader->crop(array('width' => 110, 'height' => 110));
					$this->Uploader->crop();
					// set imgs
					$this->request->data['Template']['icon'] = $icon;
				}
			}else{
				unset( $this->request->data['Template']['icon'] );
			}
			
			if($this->request->data['Template']['file']['name']){
				$file = $this->request->data['Template']['file']['name'];
				$file = explode('.', $file);
				$this->request->data['Template']['file'] = $file[0];
			}else{
				unset( $this->request->data['Template']['file'] );
			}
			// Save template data		
			if($this->Template->save($this->request->data)){
				// Set message and redirect
				$this->Session->setFlash(__('The template has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The template could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * Delete template
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Template->id = $id;
		if(!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Template->delete()){
			$this->Session->setFlash(__('Template deleted.'));
			$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Template was not deleted.'));
		}
		
	}
	
	/**
	 * Select templates ids 
	 * Utilized to select the ids templates in pages/posts
	 * @return array ids
	 */
	public function get_ids(){
		$this->autoRender = false;
		$template = $this->Template->find('all');
		$ids = array();
		foreach ($template as $key => $value) {
			$ids[] = array( 'id' => $value['Template']['id'], 'file' => $value['Template']['file']);
		}
		return $ids;
	}
	
	/**
	 * Select templates name 
	 * Utilized to select names the templates in pages/posts
	 * @return array names
	 */
	public function get_data_radio(){
		$this->autoRender = false;
		$template = $this->Template->find('all');
		$data = array();
		foreach ($template as $key => $value) {
			$data[$value['Template']['id']] = $value['Template']['name'];
		}
		return $data;
	}

}