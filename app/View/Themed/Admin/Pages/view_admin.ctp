<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add page'), array('controller' => 'pages', 'action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Pages'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Title'); ?></th>
			        <th><?php echo __('Date'); ?></th>
			        <th><?php echo __('Visualizations'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($pages as $page):?>
			<tr>
				<td><?php echo $page['Page']['id']; ?></td>
		        <td>
		            <?php echo $this->Html->link($page['Page']['title'], '/'.$page['Page']['slug'], array('target'=>'blank')); ?>
		        </td>
		        <td><?php echo $this->Time->format('d/m/Y', $page['Page']['created']); ?></td>
		       <td><?php echo $page['Page']['views']; ?></td>
		        <td>
		        	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $page['Page']['id'] )); ?>
		        	| 
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $page['Page']['id']),
			            array('confirm' => 'Want to delete this page?'));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>