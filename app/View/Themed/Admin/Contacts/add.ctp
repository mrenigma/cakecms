<h2><?php echo __('Contact'); ?></h2>
<?php echo $this->Form->create('Contact', array('class'=>'contact')); ?>
<?php echo $this->Form->Input('name', array('label'=> __('Name')) ); ?>
<?php echo $this->Form->Input('email', array('label'=> __('E-mail'))); ?>
<?php echo $this->Form->Input('phone', array('label'=> __('Telephone'))); ?>
<?php echo $this->Form->Input('message', array('label'=> __('Message'))); ?>
<?php echo $this->Form->end(__('Send')); ?>