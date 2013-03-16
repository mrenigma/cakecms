<?php $comments = $this->requestAction('comments/get_comments/'.$post_id); ?>
<div id="commentSection"><?php echo $this->Comment->get_form($comments, $post_slug, $post_id); ?></div>
<?php if($this->Session->read('Message.comment')){ echo "<div class='result_form'>".$this->Session->flash('comment').'</div>';}?>	
<div id="comment">
	<?php echo $this->Form->create('Comment', array('controller'=>'comments', 'action'=>'add')); ?>
	<?php echo $this->Form->Input('name', array('label'=>__('Name (*)'), 'class'=>'required')); ?>
	<?php echo $this->Form->Input('email', array('label'=>__('E-mail (*)'), 'class'=>'required')); ?>
	<?php echo $this->Form->Input('text', array('label'=>__('Comment (*)'), 'class'=>'required')); ?>
	<?php echo $this->Form->Input('post_id', array('type'=>'hidden', 'value'=> $post_id)); ?>
	<?php
	echo $this->Form->end(__('Comment'));
	?>
</div>