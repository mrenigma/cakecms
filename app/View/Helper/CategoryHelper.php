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

class CategoryHelper extends AppHelper {
	
	/**
	 * Helpers
	 * @var array
	 */
	public $helpers = array(
			'Html'
		);
	
	/**
	 * list categories post
	 * @param 
	 * 	string type = li or span
	 * 	array cats
	 * @return void
	 */
	public function get_categories_post($type = 'li', $cats){
		$c = ($type == 'li') ?  '<ul>' : '<span class="list-categories">';
			$n = count($cats) - 1;
			foreach($cats as $key => $category){
				$c .= ($type == 'li') ?  '<li>' : '';
					$c .= $this->Html->link($category['title'], '/posts/category/'.$category['slug']);						
		    		if(isset($category['children'])){
		    			get_categories($category['children']);
		    		}
				if($key != $n){
					$c .= ($type == 'li') ?  '</li>' : ', ';
				}
			}
		$c .= ($type == 'li') ?  '</ul>' : '</span>';
		echo $c;
	}
	
	/**
	 * list categories
	 * @param array cats
	 * @return void
	 */
	public function get_categories($cats){
		if($cats){
			echo '<ul>';
				foreach($cats as $category){
					echo '<li>';
						echo $this->Html->link($category['Category']['title'], '/posts/category/'.$category['Category']['slug']);						
			    		if(isset($category['children'])){
			    			$this->get_categories($category['children']);
			    		}
					echo '</li>';
				}
			echo '</ul>';
		}	
	}
	
}