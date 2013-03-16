<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add post'), array('controller'=>'posts', 'action'=>'add'), array('class'=>'add') ); ?>
		<?php echo $this->Html->link(__('List posts'), array('controller'=>'posts', 'action'=>'view_admin'), array('class'=>'list') ); ?>
		<?php echo $this->Form->postLink(__('Delete post'), array('action' => 'delete', $this->Form->value('Post.id')), null, 'Want to delete this post?'); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Edit'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Post', array('type' => 'file')); ?>
			<div class="line_grid" id="filter_select">
				<div class="g_3"><span class="label"><?php echo __('Template'); ?></span></div>
				<div class="g_9">
					<?php foreach($templates as $key => $value):?>
					<div class="filter_block_template">
						<input <?php if($value['Template']['id'] == $template_checked){ echo "checked";} ?> type="radio" name="data[Post][template_id]" id="PostTemplate<?php echo $value['Template']['file']; ?>" class="simple_field" value="<?php echo $value['Template']['id']; ?>">
						<label for="PostTemplate<?php echo $value['Template']['file']; ?>"><?php echo $value['Template']['name']; ?><?php echo $this->Html->image($value['Template']['icon']); ?></label>
					</div>					
					<?php endforeach; ?>
				</div>
			</div>
			<div class="line_grid" id="filter_gallery">
				<div class="g_12"><a href="javascript:" class="gallery_a"><?php echo __('Gallery'); ?></a></div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Title'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Post.title', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Content'); ?><span class="must">*</span></span></div>
				<div class="g_12">
					<?php echo $this->Form->input('Post.text', array('label' => false, 'class' => 'simple_field wysiwyg')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Description'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Post.description', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Image'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('src', array('label' => false, 'type'=>'file',  'class' => 'simple_field')); ?>
				</div>
				<div class="g_9">
					<?php if($this->request->data['Post']['thumb']):
						echo $this->Html->Image($this->request->data['Post']['thumb'], array('id'=>'delete_thumb')); ?>
						<br />
						<a href="javascript:" title="<?php echo __('Delete'); ?>" id="delete_image_js" rel="<?php echo $this->request->data['Post']['id']; ?>" thumb="<?php echo $this->request->data['Post']['thumb']; ?>" type="posts"> <?php echo __('Delete'); ?> </a>
					<?php endif; ?>	
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3">
					<span class="label" class="checker"><?php echo __('Categories'); ?></div>
					<div class="g_9">
						<?php echo $this->Form->input('Category', array('label' => false, 'multiple' => 'checkbox')); ?>
					</div>
			</div>
			<div class="line_grid">
				<div class="g_12"><a href="javascript:" class="options_a"><?php echo __('Advanced options'); ?></a></div>
			</div>
			<div id="filter_options">
				<div class="line_grid">
					<div class="g_3"><span class="label">Title - SEO</span></div>
					<div class="g_9">
						<?php echo $this->Form->input('Post.title_page', array('label' => false, 'class' => 'simple_field')); ?>
					</div>
				</div>
				<div class="line_grid">
					<div class="g_3"><span class="label">Description - SEO</span></div>
					<div class="g_9">
						<?php echo $this->Form->input('Post.description_page', array('label' => false, 'class' => 'simple_field')); ?>
					</div>
				</div>
				<div class="line_grid">
					<div class="g_3"><span class="label">Keywords - SEO</span></div>
					<div class="g_9">
						<?php echo $this->Form->input('Post.keywords_page', array('label' => false, 'class' => 'simple_field')); ?>
					</div>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Author'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('user_id', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label">Status</div>
				<div class="g_9" class="selector">
					<?php echo $this->Form->input('Post.published', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
			<?php echo $this->Form->end(__('Edit')); ?>
	</div>
</div>
<?php echo $this->element('gallery'); ?>