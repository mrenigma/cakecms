<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add user'), array('controller' => 'users', 'action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Name'); ?></th>
			        <th><?php echo __('Permissions'); ?></th>
			        <th><?php echo __('Date'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user['User']['id']; ?></td>
		        <td>
		        	<?php echo $this->Html->link($user['User']['username'], '/post/autor/'.$user['User']['username']);?>
		        </td>
		        <td><?php echo $user['Group']['name']; ?></td>
		        <td><?php echo $this->Time->format('d/m/Y', $user['User']['created']); ?></td>
		        <td>
		        	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'] )); ?>
		        	| 
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $user['User']['id']),
			            array('confirm' => 'Want to delete this user?'));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>