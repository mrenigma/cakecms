<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List galleries'), array('controller'=>'galleries', 'action'=>'view_admin'), array('class'=>'list') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add gallery'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Gallery'); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Name'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Gallery.title', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Description'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Gallery.description', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
		<?php echo $this->Form->end(__('Add'), array('class' => 'send')); ?>
	</div>
</div>
<?php echo $this->element('gallery'); ?>