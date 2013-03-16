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

App::uses('AppModel', 'Model', 'AuthComponent', 'Controller/Component');
class User extends AppModel {

	
	/**
	 * Validate
	 */
	public $validate = array(
			'first_name' => array(
					'rule' => 'notEmpty',
					'message' => 'Required'	
				),
			'last_name' => array(
					'rule' => 'notEmpty',
					'message' => 'Required'	
				),
			'email' => array(
				'rule'    => array('isUnique', 'email'),
				'message' => 'Invalid e-mail'
			),
			'username' => array(
					'rule'    => array('isUnique', 'notEmpty'),
					'message' => 'Invalid user'	
				),
			'password' => array(
					'rule' => 'notEmpty',
					'message' => 'Required'	
				),
			'group_id' => array(
					'rule' => 'notEmpty',
					'message' => 'Required'	
				),	
		);
	
	/**
	 * Set col
	 * @var string
	 */
	public $displayField = 'username';

	/** 
	 * Relationship
	 * @var array
	 */ 
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/** 
	 * Relationship
	 * @var array
	 */ 
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
	/**
	 * Configure ACL plugin
	 */
	public $actsAs = array('Acl' => array('type' => 'requester'));
	public function parentNode() {
   		 if (!$this->id && empty($this->data)) {
   		     return null;
   		 }
   		 if (isset($this->data['User']['group_id'])) {
   		     $groupId = $this->data['User']['group_id'];
   		 } else {
   		     $groupId = $this->field('group_id');
   		 }
   		 if (!$groupId) {
   		     return null;
   		 } else {
   		     return array('Group' => array('id' => $groupId));
   		 }
	}
	public function bindNode($user) {
   		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}


}