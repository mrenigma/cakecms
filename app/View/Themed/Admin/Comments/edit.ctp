<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List comments'), array('controller'=>'comments', 'action'=>'view_admin'), array('class'=>'list') ); ?>
		<?php echo $this->Form->postLink(__('Delete comment'), array('action' => 'delete', $this->Form->value('Comment.id')), null, __('Want to delete this comment?')); ?>
	</div>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Edit comment'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Comment'); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Name'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Comment.name', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('E-mail'); ?> <span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Comment.email', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"> <?php echo __('Text'); ?> <span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Comment.text', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Status'); ?></div>
				<div class="g_9" class="selector">
					<?php echo $this->Form->input('Comment.published', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
			<?php echo $this->Form->end(__('Edit')); ?>
	</div>
</div>