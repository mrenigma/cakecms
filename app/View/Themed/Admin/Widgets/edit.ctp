<div class="g_12">
	<?php if($this->Session->read('Auth.User.Group.id') == 1): ?>
	<div class="link_header">
		<?php echo $this->Html->link(__('Add widget'), array('action'=>'add'), array('class'=>'add') ); ?>
		<?php echo $this->Html->link(__('List widget'), array('action'=>'view_admin'), array('class'=>'list') ); ?>
		<?php echo $this->Form->postLink(__('Delete widget'), array('action' => 'delete', $this->Form->value('Widget.id')), null, 'Want to delete this widget?'); ?>
	</div>
	<?php endif; ?>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Edit'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Widget'); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Title'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Widget.title', array('label' => false, 'class' => 'simple_field' )); ?>
				</div>
			</div>
			<?php if($this->Session->read('Auth.User.Group.id') != 1): ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Key'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Widget.key', array('label' => false, 'class' => 'simple_field' )); ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Content'); ?><span class="must">*</span></span></div>
				<div class="g_12">
					<?php echo $this->Form->input('Widget.value', array('label' => false, 'class' => 'simple_field wysiwyg')); ?>
				</div>
			</div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		<?php echo $this->Form->end(__('Edit'), array('class' => 'send')); ?>
	</div>
</div>