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

class CommentHelper extends AppHelper {
	
	/**
	 * Helpers
	 * @var array
	 */
	public $helpers = array(
			'Html',
			'Time',
			'User'
		);
	
	/**
	 * Count comments
	 * @return void
	 */
	public function num($comments, $slug, $type = 'a'){
		$count = 0;
		foreach ($comments as $key => $value) {
			if($value['published'] == 1)
				$count++;
		}
		if($count == 0)
			$c = __("No comment");
		elseif($count == 1)
			$c = __("$count Comment");
		else
			$c = __("$count Comment");
		if($type == 'a')
			echo $this->Html->link($c, '/post/'.$slug.'#commentSection');
		else 
			echo $c;
	}
	
	/**
	 * List comments
	 * @return void
	 */
	public function get_form($comments, $post_slug, $post_id){
			echo '<ul>';
			foreach ($comments as $key => $comment):
				echo '<li>';
					echo  $this->Html->image($this->User->get_gravatar($comment['Comment']['email'], 50));
					echo '<h3 class="form_comment_name">'.$comment['Comment']['name'].'</h3>';
					echo '<span class="form_comment_date">'.$this->Time->format('Y/m/d H:m:s', $comment['Post']['created']).'<span>';
					echo  '<p class="form_comment_text">'.$comment['Comment']['text'].'</p>';
					echo  $this->Html->link(__('Reply'), '/post/'.$post_slug.'/?reply='.$comment['Comment']['id'].'/#comment', array('class'=>'form_comment_reply'));
					if(isset($comment['children'])){
		    			$this->get_form($comment['children'], $post_slug, $post_id);
		    		}
				echo  '</li>';
			endforeach;
		echo  '</ul>';
	}
	
}