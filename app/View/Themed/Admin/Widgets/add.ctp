<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add widget'), array('action'=>'view_admin'), array('class'=>'list') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Widget'); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Title'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Widget.title', array('label' => false, 'class' => 'simple_field' )); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Key'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Widget.key', array('label' => false, 'class' => 'simple_field' )); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Value'); ?><span class="must">*</span></span></div>
				<div class="g_12">
					<?php echo $this->Form->input('Widget.value', array('label' => false, 'class' => 'simple_field wysiwyg')); ?>
				</div>
			</div>
		<?php echo $this->Form->end(__('Add'), array('class' => 'send')); ?>
	</div>
</div>