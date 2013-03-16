<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List users'), array('action' => 'view_admin'), array('class'=>'list') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('User'); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('First name'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('first_name', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Last Name'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('last_name', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('E-mail'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('email', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('User name'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('username', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Password'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('password', array('label' => false, 'class' => 'simple_field')); ?>
					<?php echo $this->Form->input('old_password', array('type'=>'hidden', 'value'=> $this->Form->value('User.password'), 'class' => 'simple_field'));?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Description'); ?></span></div>
				<div class="g_12">
					<?php echo $this->Form->input('description', array('label' => false, 'class' => 'simple_field wysiwyg')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label">Facebook</span></div>
				<div class="g_9">
					<?php echo $this->Form->input('facebook', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label">Twitter</span></div>
				<div class="g_9">
					<?php echo $this->Form->input('twitter', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label">Google+</span></div>
				<div class="g_9">
					<?php echo $this->Form->input('google+', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label">Pinterest</span></div>
				<div class="g_9">
					<?php echo $this->Form->input('pinterest', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label">Linkedin</span></div>
				<div class="g_9">
					<?php echo $this->Form->input('linkedin', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3">
					<span class="label" class="checker"><?php echo __('Group'); ?></div>
					<div class="g_9">
						<?php echo $this->Form->input('group_id', array('label' => false, 'class' => 'simple_field')); ?>
					</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label">Status</div>
				<div class="g_9" class="selector">
					<?php echo $this->Form->input('published', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<?php echo $this->Form->end(__('Add')); ?>
	</div>
</div>