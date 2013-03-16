<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add template'), array('action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Template'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
				     <th>Id</th>
				     <th><?php echo __('Icon'); ?></th>
				     <th><?php echo __('Title'); ?></th>
				     <th><?php echo __('Options'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($templates as $template):?>
			<tr>
				<td><?php echo $template['Template']['id']; ?></td>
				<td><?php echo $this->Html->image($template['Template']['icon']); ?></td>
				<td>
				    <?php echo $template['Template']['name']; ?>
				</td>
				<td>
					<?php echo $this->Html->link( __('Edit'), array('action' => 'edit', $template['Template']['id'])); ?>
					|
					<?php echo $this->Form->postLink(
				    __('Delete'),
					    array('action' => 'delete', $template['Template']['id']),
					    array('confirm' => __('Want to delete this template?')));
					?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>