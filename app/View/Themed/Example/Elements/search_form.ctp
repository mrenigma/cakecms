<div class="search">
	<?php echo $this->Form->create('Post', array('action'=>'search', 'type'=> 'get')); ?>
	<?php echo $this->Form->Input('Post.t', array('label'=>'Search')); ?>
	<?php echo $this->Form->end('OK'); ?>
</div>