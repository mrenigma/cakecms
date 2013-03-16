<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List templates'), array('action'=>'view_admin'), array('class'=>'list') ); ?>
	</div>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Template', array('type' => 'file')); ?>
		<div class="line_grid">
			<div class="g_3"><span class="label"><?php echo __('Name');?> <span class="must">*</span></span></div>
			<div class="g_9">
				<?php echo $this->Form->input('Template.name', array('label' => false, 'class' => 'simple_field')); ?>
			</div>
		</div>
		<div class="line_grid">
			<div class="g_3"><span class="label"><?php echo __('File'); ?> <span class="must">*</span></span></div>
			<div class="g_9">
				<?php echo $this->Form->input('Template.file', array('label' => false, 'type'=>'file',  'class' => 'simple_field')); ?>
			</div>
			<strong><?php echo __('Actual:') . ' '. $this->request->data['Template']['file']; ?></strong>
		</div>
		<div class="line_grid">
			<div class="g_3"><span class="label"><?php echo __('Icon'); ?> <span class="must">*</span></span></div>
			<div class="g_9">
				<?php echo $this->Form->input('Template.icon', array('label' => false, 'type'=>'file',  'class' => 'simple_field')); ?>
			</div>
			<?php echo $this->Html->image($this->request->data['Template']['icon']); ?>
		</div>
		<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		<?php echo $this->Form->end(__('Edit')); ?>
	</div>
</div>