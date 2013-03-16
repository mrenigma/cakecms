<div class="g_12">
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Comments'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th>Id</th>
			        <th><?php echo __('Name'); ?></th>
			        <th><?php echo __('E-mail'); ?></th>
			        <th><?php echo __('In'); ?></th>
			        <th><?php echo __('Created'); ?></th>
			        <th><?php echo __('Status'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($comments as $comment):?>
			<tr>
				<td><?php echo $comment['Comment']['id']; ?></td>
		        <td>
		            <?php echo $comment['Comment']['name']; ?>
		        </td>
		        <td>
		            <?php echo $comment['Comment']['email']; ?>
		        </td>
		        <td>
		            <?php echo $this->Html->link($comment['Post']['title'], '/post/'.$comment['Post']['slug'].'/#commentSection'); ?>
		        </td>
		        <td><?php echo $this->Time->format('d/m/Y', $comment['Post']['created']); ?></td>
		        <td>
		            <?php 
		            if($comment['Comment']['published'] == 1){
		            	echo "<span style='color:green'>".__('accepted')."</span>";
					}else{
						echo "<span style='color:red'>".__('confirm')."</span>";
					} ?>
		        </td>
		        <td>
		        	<?php echo $this->Html->link( __('Edit'), array('action' => 'edit', $comment['Comment']['id'] )); ?>
		        	|
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $comment['Comment']['id']),
			            array('confirm' => __('Want to delete this comment?')));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>