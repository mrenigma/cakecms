<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List inputs'), array('action'=>'view_admin'), array('class'=>'list') ); ?>
		<?php echo $this->Form->postLink(__('Delete input'), array('action' => 'delete', $this->Form->value('Input.id')), null, __('Want to delete this input?')); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Input'); ?>
			<div class="line_grid" id="filter_select">
				<div class="g_3"><span class="label"> <?php echo __('Template'); ?> <span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('template_id', array('label' => false, 'class' => 'simple_field', 'empty' => __('Empty'))); ?>
				</div>
			</div>
			<div class="line_grid" id="filter_select">
				<div class="g_3"><span class="label"> <?php echo __('Type'); ?> <span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->select('Input.type', array('textarea' => 'textarea', 'input' => 'input')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Title'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Input.title', array('label' => false, 'class' => 'simple_field' )); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Name'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Input.name', array('label' => false, 'class' => 'simple_field' )); ?>
				</div>
			</div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		<?php echo $this->Form->end(__('Edit'), array('class' => 'send')); ?>
	</div>
</div>