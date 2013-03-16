<div class="g_12">
	<?php if($this->Session->read('Auth.User.Group.id') == 1): ?>
	<div class="link_header">
		<?php echo $this->Html->link(__('Add widget'), array('action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<?php endif; ?>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Widgets'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Title'); ?></th>
			        <?php if($this->Session->read('Auth.User.Group.id') == 1): ?>
			        <th><?php echo __('Page'); ?></th>
			        <?php endif; ?>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($widgets as $widget):?>
			<tr>
				<td><?php echo $widget['Widget']['id']; ?></td>
		        <td>
		            <?php echo $widget['Widget']['title']; ?>
		        </td>
		        <?php if($this->Session->read('Auth.User.Group.id') == 1): ?>
		        <td>
		            <?php echo $widget['Page']['title']; ?>
		        </td>
		        <?php endif; ?>
		        <td>
		        	<?php echo $this->Html->link(_('Edit'), array('action' => 'edit', $widget['Widget']['id'] )); ?>
		        	<?php if($this->Session->read('Auth.User.Group.id') == 1):?>
			        	|
			        	<?php echo $this->Form->postLink(
			            __('Delete'),
				            array('action' => 'delete', $widget['Widget']['id']),
				            array('confirm' => 'Want to delete this widget?'));
				        ?>
				    <?php endif; ?>    
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>