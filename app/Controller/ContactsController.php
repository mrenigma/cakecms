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

App::uses('CakeEmail', 'Network/Email');
class ContactsController extends AppController {
	
	/**
	 * Name
	 * @var string
	 */
	public $name = 'Contacts';
	
	/**
	 * Define the public views.
	 * @return void
	 */
	public function beforeFilter() {
		$this->Auth->allow('add', 'result');
	}

	/**
	 * List the messages in painel control
	 * @return void
	 */
	public function view_admin(){
		$this->layout = 'admin';
		$params = array(
				'order' => 'Contact.id DESC'
			);
		$this->set('contacts', $this->Contact->find('all', $params));
	}

	/**
	 * Show message
	 * @param int id
	 */
	public function view($id = null){
		$this->layout = 'admin';
		$this->set('contact', $this->Contact->findById($id) );
	}
	
	/**
	 * Send e-mail
	 * @return void
	 */
	public function add(){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
		if($this->request->is('post')){
			if($this->Contact->save($this->request->data)){
				$emails = $this->get_emails();
				$email = new CakeEmail('gmail');
				$email->viewVars(
							array(
								'name' => $this->request->data['Contact']['name'],
								'email' => $this->request->data['Contact']['email'],
								'phone' => $this->request->data['Contact']['phone'],
								'message' => $this->request->data['Contact']['message'],	
							)
						);
				$email->template('contact')
					  ->subject('Contato Site')
					  ->emailFormat('html')
					  ->to($emails)
					  ->from(array('willychagass@gmail.com' => 'Contato'))
					  ->send(__('Contact'));
				$this->redirect(array('action' => 'result'));
			}
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
		$this->Contact->id = $id;
		if(!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact.'));
		}
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		if($this->Contact->delete($id)){
			$this->Session->setFlash(__('Contact deleted'));
        	$this->redirect(array('action' => 'view_admin'));
		}else{
			$this->Session->setFlash(__('Contact was not deleted.'));
		}
	}
	
	/**
	 * Message e-mail
	 * @return void
	 */
	public function result(){
		$this->layout = 'site';
		$this->theme = $this->get_theme();
	}

}
