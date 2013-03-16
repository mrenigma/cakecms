<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add group'), array('controller' => 'groups', 'action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Groups'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Name'); ?></th>
			        <th><?php echo __('Date'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach($groups as $group):?>
			<tr>
				<td><?php echo $group['Group']['id']; ?></td>
		        <td>
		        	<?php echo $group['Group']['name'];?>
		        </td>
		        <td><?php echo $this->Time->format('d/m/Y H:m:s', $group['Group']['created']); ?></td>
		        <td>
		        	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id'] )); ?>
		        	| 
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $group['Group']['id']),
			            array('confirm' => 'Want to delete this group?'));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>