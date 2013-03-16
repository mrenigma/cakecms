<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List categories'), array('action'=>'view_admin'), array('class'=>'list') ); ?>
	</div>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Category'); ?>
		<div class="line_grid">
			<div class="g_3"><span class="label"><?php echo __('Parent category') ?></span></div>
			<div class="g_9">
				<?php echo $this->Form->input('Parent.category_id', array('label' => false, 'class' => 'simple_field', 'empty' => true)); ?>
			</div>
		</div>
		<div class="line_grid">
			<div class="g_3"><span class="label"><?php echo __('Name');?> <span class="must">*</span></span></div>
			<div class="g_9">
				<?php echo $this->Form->input('Category.title', array('label' => false, 'class' => 'simple_field')); ?>
			</div>
		</div>
		<div class="line_grid">
			<div class="g_3"><span class="label"> <?php echo __('Descritption'); ?> </span></div>
			<div class="g_9">
				<?php echo $this->Form->input('Category.description', array('label' => false, 'class' => 'simple_field')); ?>
			</div>
		</div>
		<?php echo $this->Form->end(__('Add')); ?>
	</div>
</div>