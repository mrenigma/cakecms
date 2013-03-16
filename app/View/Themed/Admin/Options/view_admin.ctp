<div class="g_12">
	<?php if($this->Session->read('Auth.User.Group.id') == 1) {?>
	<div class="link_header">
		<?php echo $this->Html->link(__('Add option'), array('controller' => 'options', 'action' => 'add'), array('class'=>'add') ); ?>
	</div>
	<?php } ?>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('Options'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Id'); ?></th>
			        <th><?php echo __('Title'); ?></th>
			        <?php if($this->Session->read('Auth.User.Group.id') == 1) {?>
			        <th><?php echo __('Key'); ?></th>
			        <?php } ?>
			        <th><?php echo __('Value'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($options as $option):?>
			<tr>
				<td><?php echo $option['Option']['id']; ?></td>
		        <td>
		            <?php echo $option['Option']['title']; ?>
		        </td>
		        <?php if($this->Session->read('Auth.User.Group.id') == 1) {?>
		        <td>
		            <?php echo $option['Option']['key']; ?>
		        </td>
		        <?php } ?>
		        <td>
		            <?php echo $option['Option']['value']; ?>
		        </td>
		        <td>
		        	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $option['Option']['id'] )); ?>
		        	<?php if($this->Session->read('Auth.User.Group.id') == 1) {?>
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $option['Option']['id']),
			            array('confirm' => 'Want to delete this option?'));
			        ?>
			        <?php } ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>