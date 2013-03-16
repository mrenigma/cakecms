<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add image'), array('controller'=>'images', 'action'=>'add'), array('class'=>'add') ); ?>
		<?php echo $this->Html->link(__('List images'), array('controller'=>'images', 'action'=>'view_admin'), array('class'=>'list') ); ?>
		<?php echo $this->Form->postLink(__('Delete image'), array('action' => 'delete', $this->Form->value('Image.id')), null, __('Want to delete this image?')); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Edit'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Image', array('type' => 'file')); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Gallery'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('gallery_id', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Titulo'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Image.title', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Link'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Image.url', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Description'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Image.description', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		<?php echo $this->Form->end(__('Edit'), array('class' => 'send')); ?>
	</div>
</div>