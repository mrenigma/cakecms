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

class InputsController extends AppController{
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Inputs';
	
	/**
	 * Models
	 * @var array
	 */
	public $uses = array(
			'Input',
			'Template'
		);

	/**
	 * Define the public views.
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('get_name_inputs', 'get_inputs');
	}
	
	/**
	 * get inputs
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array(
				'order' => 'Input.id DESC'
			);
		$this->set('inputs', $this->Input->find('all', $params));
	}
	
	/**
	 * Add input
	 * @return void
	 */
	public function add(){
		$this->layout = 'admin';
		if($this->request->is('post')){
			if($this->Input->save($this->request->data)){
				$this->Session->setFlash(__('The input has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The input could not be saved. Please, try again.'));
			}
		}
		$this->set('templates', $this->Input->Template->find('list'));
	}
	
	/**
	 * Edit input
	 * @param int id
	 */
	public function edit($id = null){
		$this->layout = 'admin';
		$this->Input->id = $id;	
		if($this->request->is('get')){
			$this->request->data = $this->Input->read();
		}else{
			if($this->Input->save($this->request->data)){
				$this->Session->setFlash(__('The input has been saved.'));
				$this->redirect(array('action' => 'view_admin'));
			}else{
				$this->Session->setFlash(__('The input could not be saved. Please, try again.'));
			}
		}
		$this->set('templates', $this->Input->Template->find('list'));
	}
	
	/**
	 * Delete category
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param int id
	 * @return void
	 */
	public function delete($id){
		$this->Input->id = $id;
		if(!$this->Input->exists()) {
			throw new NotFoundException(__('Invalid input.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Input->delete()){
			$this->Session->setFlash(__('input deleted'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('input was not deleted.'));
		}
	}
	
	/**
	 * Get name inputs
	 * @return array names
	 */
	public function get_name_inputs(){
		$this->autoRender = false;
		$inputs = $this->Input->findAllByTemplateId($this->request->query['template_id']);
		$names = array();
		foreach ($inputs as $key => $value) {
			$names[] = $value['Input']['name'];
		}
		return $names;
	}
	
	/**
	 * List inputs the related template
	 * @return json
	 */
	public function get_inputs(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		if($this->request->is('post')){
			$templates = $this->requestAction('templates/get_ids/');
			$data = array();
			foreach ($templates as $key => $value) {
				$data['values'][] = array(
						'template' => $value['file'],
						'value' => $value['id'],
						'inputs' => $this->requestAction('inputs/get_name_inputs?template_id='.$value['id'])
					);
			}
			echo json_encode($data);
		}
	}
	
}