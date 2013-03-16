<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add category'), array('action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Categories'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th>Id</th>
			        <th><?php echo __('Title'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($categories as $category):?>
			<tr>
				<td><?php echo $category['Category']['id']; ?></td>
		        <td>
		            <?php echo $this->Html->link($category['Category']['title'], '/posts/category/'.$category['Category']['slug']); ?>
		        </td>
		        <td>
		        	<?php echo $this->Html->link( __('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
		        	|
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $category['Category']['id']),
			            array('confirm' => __('Want to delete this category?')));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>