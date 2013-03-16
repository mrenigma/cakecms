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

class Widget extends AppModel{
	
	/**
	 * Name
	 */
	public $name = 'Widget';
	
	/**
	 * Validate
	 */
	public $validate = array(
			'title' => array(
					'rule' => 'notEmpty',
					'message' => 'Required',	
				),
			'key' => array(
				'rule' => 'notEmpty',
				'message' => 'Required',	
			),
			'value' => array(
					'rule' => 'notEmpty',
					'message' => 'Required',	
				),
		);
	
	/**
	 * Relationship
	 * @var array
	 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
		),
		'Page' => array(
			'className' => 'Page',
			'foreignKey' => 'page_id',
		),
	);
}