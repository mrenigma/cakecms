<div class="text_content">
	<div class="block_content">
		<?php 
			echo $this->Html->image($post['Post']['thumb'], array('title'=>$post['Post']['title'], 'alt'=>$post['Post']['title'],'class' => 'thumb_loop'));
		?>
		<div class="date">
				<?php echo $this->Time->format('d', $post['Post']['created']); ?>
				<span><?php echo $this->Time->format('M', $post['Post']['created']); ?></span>
		</div>
		<h2><?php echo $post['Post']['title']; ?></h2>
		<div class="info">
			Author: <?php echo $this->Html->link( $this->User->get_user($post['User']), '/posts/author/'.$post['User']['username']);?>
			| Categories: <?php $this->Category->get_categories_post('span', $post['Category']); ?>
			| Comments: <?php echo $this->Comment->num($post['Comment'], $post['Post']['slug']); ?>
		</div>
		
		<div class="content">
			<?php echo $post['Post']['text']; ?>
			<?php echo $this->element('comments', array('post_id'=>$post['Post']['id'], 'post_slug'=>$post['Post']['slug'])); ?>
		</div>
	</div>
</div>
<?php echo $this->element('sidebar'); ?>	