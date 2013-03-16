<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add post'), array('controller' => 'posts', 'action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Posts'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
					<th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Title'); ?></th>
			        <th><?php echo __('Categories'); ?></th>
			        <th><?php echo __('Date'); ?></th>
			        <th><?php echo __('Visualizations'); ?></th>
			        <th><?php echo __('Options'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($posts as $post):?>
			<tr>
				<td><?php echo $post['Post']['id']; ?></td>
		        <td>
		            <?php echo $this->Html->link($post['Post']['title'], '/post/'.$post['Post']['slug'], array('target'=>'blank')); ?>
		        </td>
		        <td><?php $this->Category->get_categories_post('span', $post['Category']); ?></td>
		        <td><?php echo $this->Time->format('d/m/Y', $post['Post']['created']); ?></td>
		        <td><?php echo $post['Post']['views']; ?></td>
		        <td>
		        	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'] )); ?>
		        	| 
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $post['Post']['id']),
			            array('confirm' => 'Want to delete this post?'));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>