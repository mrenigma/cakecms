<div class="sidebar_content">
	<div class="sidebar">
	<?php  echo $this->element('search_form', array('cache' => false)); ?>
	</div>
	<div class="sidebar">
		<?php $data = $this->requestAction('widgets/get_value/about/'); ?> 
		<h3><?php echo $data['title']; ?></h3>
		<p><?php echo $data['value']; ?></p>
	</div>
	<div class="sidebar">
		<h3><?php echo __("Categories"); ?></h3>
		<?php $categories = $this->requestAction('categories/get_categories/'); ?>
		<?php $this->Category->get_categories($categories); ?>
	</div>
	<div class="sidebar posts_sidebar">
      <h3><?php echo __("Popular posts"); ?></h3>
      <?php
    	$last_posts = $this->requestAction('posts/popular_posts/?num=3');
    	foreach ($last_posts as $post):
    	?>
		<p>
			<?php
            echo $this->Html->link(
            		$this->Html->image($post['Post']['thumb'], array('title'=>$post['Post']['title'], 'alt'=>$post['Post']['title'])),
            		'/post/'.$post['Post']['slug'],
            		array('escape' => false)
			);
			?>
			<?php echo $this->Html->link($post['Post']['title'], '/post/'.$post['Post']['slug']); ?>
			<span class="date"><?php echo $this->Time->format('d M Y', $post['Post']['created']); ?></span>
		</p>
		<?php endforeach; ?>
    </div>
</div>