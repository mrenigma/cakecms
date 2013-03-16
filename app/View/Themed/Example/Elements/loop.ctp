<div class="text_content">
	<?php if($posts):?>
	<?php foreach($posts as $post):?>
		<div class="block_content">
			<?php 
				echo $this->Html->link(
						$this->Html->image($post['Post']['thumb'], array('title'=>$post['Post']['title'], 'alt'=>$post['Post']['title'], 'class' => 'thumb_loop')), 
						'/post/'.$post['Post']['slug'],
						array('escape'=>false)
					)
			?>
			<div class="date">
					<?php echo $this->Time->format('d', $post['Post']['created']); ?>
					<span><?php echo $this->Time->format('M', $post['Post']['created']); ?></span>
			</div>
			<h2><?php echo $this->Html->link($post['Post']['title'], '/post/'.$post['Post']['slug']); ?></h2>
			<div class="info">
				Author: <?php echo $this->Html->link( $this->User->get_user($post['User']), '/posts/author/'.$post['User']['username']);?>
				| Categories: <?php $this->Category->get_categories_post('span', $post['Category']); ?>
				| Comments: <?php echo $this->Comment->num($post['Comment'], $post['Post']['slug']); ?>
			</div>
			
			<div class="content">
				<?php echo $post['Post']['description']; ?>
			</div>
		</div>
	<?php endforeach; ?>
	<?php  if( $this->Paginator->numbers() ): ?>
		<ul class="paginate">
			<?php echo $this->Paginator->prev(__('«'), array('tag'=>'li')); ?>
			<?php echo $this->Paginator->numbers(array('separator'=>false, 'tag'=>'li')); ?>
			<?php echo $this->Paginator->next( __('»'), array('tag'=>'li') ); ?>
		</ul>
	<?php endif; ?>
	<?php else: ?>
		<h2><?php echo __('Not Found'); ?></h2>
	<?php endif;?>
</div>	
<?php echo $this->element('sidebar'); ?>