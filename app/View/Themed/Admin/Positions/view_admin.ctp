<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add position'), array('action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Positions'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
				     <th>Id</th>
				     <th><?php echo __('Name'); ?></th>
				     <th><?php echo __('Slug'); ?></th>
				     <th><?php echo __('Options'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($positions as $position):?>
			<tr>
				<td><?php echo $position['Position']['id']; ?></td>
				<td><?php echo $position['Position']['name']; ?></td>
				<td>
				    <?php echo $position['Position']['slug']; ?>
				</td>
				<td>
					<?php echo $this->Html->link( __('Edit'), array('action' => 'edit', $position['Position']['id'])); ?>
					|
					<?php echo $this->Form->postLink(
				    __('Delete'),
					    array('action' => 'delete', $position['Position']['id']),
					    array('confirm' => __('Want to delete this position?')));
					?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>