<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List options'), array('action'=>'view_admin'), array('class'=>'list') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Option'); ?>
		 <?php if($this->Session->read('Auth.User.Group.id' == 1)) {?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Title'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('title', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Key'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('key', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<?php } ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Value'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('value', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		<?php echo $this->Form->end(__('Edit'), array('class' => 'send')); ?>
	</div>
</div>