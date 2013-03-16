<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	/**
	 * Admin Theme
	 */
	public $theme = 'Admin';
	
	/**
	 * Componentes
	 */
	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    
	/**
	 * Helpers mais utilizados.
	 */
    public $helpers = array(
    		'Html', 
    		'Form',
    		'Time',
    		'Session', 
		);

	/**
	 * Using Model option to settings database
	 */
	public $uses = array('Option');

	
	/**
	 * Get theme setting database
	 * @return themeName[String]
	 */
	public function get_theme(){
		$theme = $this->Option->findByKey('cakecms_theme');
		return $theme['Option']['value'];
	}	
	
	/**
	 * Get base_url setting database
	 * @return BaseUrlName[String]
	 */
	public function get_base_url(){
		$url = $this->Option->findByKey('cakecms_base_url');
		return $url['Option']['value'];
	}

	/**
	 * Get emails setting database
	 * @return emails[Array]
	 */
	public function get_emails(){
		$emails = $this->Option->findByKey('cakecms_emails');
		return explode(',', $emails['Option']['value']);
	}
	
	/**
	 * Define permissions
	 * $this->Auth->loginAction = Define controller/action the login control painel
	 * $this->Auth->logoutRedirect = Define controller/action the login control painel after logout action
	 * $this->Auth->loginRedirect = Set controller/action after authorized
	 */
	public function beforeFilter() {
		$this->layout = "admin";
		$this->Auth->allow('');
		$this->Auth->actionPath = 'controllers/';
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller'=>'posts', 'action'=>'view_admin');
		$this->set('logged_in',$this->is_LoggedIn());
		      
    }

	/**
	 * BeforeRender 
	 
	function beforeRender(){
		// Set layout and theme if error
	    if($this->name == 'CakeError') {
	        $this->layout = 'site';
			$this->theme = $this->get_theme();
	    }
	}*/
   
  	/**
	 * Check user logged
	 */
	public function is_LoggedIn() {
    	$logged_in = FALSE;
        if($this->Auth->user()) {
        	$logged_in = TRUE;
        }
        return $logged_in;
	}
	
}