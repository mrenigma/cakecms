<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add gallery'), array('controller' => 'galleries', 'action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Add gallery'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Title'); ?></th>
			        <th><?php echo __('Description'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($galleries as $gallery):?>
			<tr>
				<td><?php echo $gallery['Gallery']['id']; ?></td>
		        <td>
		        	<?php echo $gallery['Gallery']['title']; ?>
		        </td>
		        <td>
		        	<?php echo $gallery['Gallery']['description']; ?>
		        </td>
		        <td>
		        	<?php echo $this->Html->link( __('Edit'), array('action' => 'edit', $gallery['Gallery']['id'] )); ?>
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $gallery['Gallery']['id']),
			            array('confirm' => __('Want to delete this gallery?')));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>