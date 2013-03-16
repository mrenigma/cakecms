<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add image'), array('controller' => 'images', 'action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Images');?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables images_admin">
			<thead>
				<tr>
			        <th><?php echo __('Id');?></th>
			        <th><?php echo __('Images');?></th>
				<th><?php echo __('Gallery');?></th>
			        <th><?php echo __('Title');?></th>
			        <th><?php echo __('Options');?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($images as $image):?>
			<tr>
				<td><?php echo $image['Image']['id']; ?></td>
		        <td>
		        	 <?php echo $this->Html->image($image['Image']['small']); ?>
		        </td>
			<td><?php echo $image['Gallery']['title']; ?></td>
		         <td>
		         	<?php echo $image['Image']['title']; ?>
		        </td>
		        <td>
		        	<?php echo $this->Html->link( 'Editar', array('action' => 'edit', $image['Image']['id'] )); ?>
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $image['Image']['id']),
			            array('confirm' => 'Want to delete this image?'));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>