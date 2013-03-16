<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add group'), array('controller' => 'groups', 'action' => 'add'), array('class'=>'add') ); ?>
		<?php echo $this->Html->link(__('List group'), array('controller' => 'groups', 'action' => 'view_admin'), array('class'=>'list') ); ?>
		<?php echo $this->Form->postLink(__('Delete group'), array('action' => 'delete', $this->Form->value('Group.id')), null, __('Want to delete this group?'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Edit'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Group'); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Name'); ?> <span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('name', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
			<?php echo $this->Form->end(__('Edit')); ?>
	</div>
</div>
