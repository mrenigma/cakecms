<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add input'), array('action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Inputs'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Template'); ?></th>
			        <th><?php echo __('Name'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($inputs as $input):?>
			<tr>
				<td><?php echo $input['Input']['id']; ?></td>
		        <td>
		            <?php echo $input['Template']['name']; ?>
		        </td>
		        <td>
		            <?php echo $input['Input']['name']; ?>
		        </td>
		        <td>
		        	<?php echo $this->Html->link( __('Edit'), array('action' => 'edit', $input['Input']['id'] )); ?>
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $input['Input']['id']),
			            array('confirm' => 'Want to delete this input?'));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>