<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List pages'), array('controller'=>'pages', 'action'=>'view_admin'), array('class'=>'list') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Page', array('type' => 'file')); ?>
			<div class="line_grid" id="filter_select">
				<div class="g_3"><span class="label"> <?php echo __('Template'); ?> </span></div>
				<div class="g_9">
					<?php foreach($templates as $key => $value):?>
					<div class="filter_block_template">
						<input <?php if($value['Template']['id'] == 1){ echo "checked";} ?> type="radio" name="data[Page][template_id]" id="PageTemplate<?php echo $value['Template']['file']; ?>" class="simple_field" value="<?php echo $value['Template']['id']; ?>">
						<label for="PageTemplate<?php echo $value['Template']['file']; ?>"><?php echo $value['Template']['name']; ?><?php echo $this->Html->image($value['Template']['icon']); ?></label>
					</div>					
					<?php endforeach; ?>
				</div>
			</div>
			<div class="line_grid none" id="filter_gallery">
				<div class="g_12"><a href="javascript:" class="gallery_a"><?php echo __('Gallery'); ?></a></div>
			</div>
			<?php foreach ($inputs as $input): ?>
				<?php if($input['Input']['template_id']): ?>
					<div class="line_grid none" id="<?php echo $input['Input']['name'];?>">
						<div class="g_3"><span class="label"> <?php echo $input['Input']['title']; ?> </span></div>
						<div class="g_9">
							<?php if($input['Input']['type'] == 'textarea'){ ?>
							<textarea name="data[Widget][<?php echo $input['Input']['name'];?>]" class="simple_field wysiwyg" cols="30" rows="6" id="Page<?php echo $input['Input']['name'];?>"></textarea>
							<?php }else{ ?>
								<input name="data[Widget][<?php echo $input['Input']['name'];?>]" class="simple_field" id="Page<?php echo $input['Input']['name'];?>" />
							<?php } ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Title'); ?><span class="must">*</span></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Page.title', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Content'); ?><span class="must">*</span></span></div>
				<div class="g_12">
					<?php echo $this->Form->input('Page.text', array('label' => false, 'class' => 'simple_field wysiwyg')); ?>
				</div>
			</div>
			<!--
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('description'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Page.description', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Image'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('src', array('label' => false, 'type'=>'file',  'class' => 'simple_field')); ?>
				</div>
			</div>
			-->
			<div class="line_grid">
				<div class="g_12"><a href="javascript:" class="options_a"><?php echo __('Advanced options'); ?></a></div>
			</div>
			<div id="filter_options">
				<div class="line_grid">
					<div class="g_3"><span class="label">Title - SEO</span></div>
					<div class="g_9">
						<?php echo $this->Form->input('Page.title_page', array('label' => false, 'class' => 'simple_field')); ?>
					</div>
				</div>
				<div class="line_grid">
					<div class="g_3"><span class="label">Description - SEO</span></div>
					<div class="g_9">
						<?php echo $this->Form->input('Page.description_page', array('label' => false, 'class' => 'simple_field')); ?>
					</div>
				</div>
				<div class="line_grid">
					<div class="g_3"><span class="label">Keywords - SEO</span></div>
					<div class="g_9">
						<?php echo $this->Form->input('Page.keywords_page', array('label' => false, 'class' => 'simple_field')); ?>
					</div>
				</div>
			</div>	
			<div class="line_grid">
				<div class="g_3"><span class="label">Status</div>
				<div class="g_9" class="selector">
					<?php echo $this->Form->input('Page.published', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
		<?php echo $this->Form->end(__('Add'), array('class' => 'send')); ?>
	</div>
</div>
<?php echo $this->element('gallery'); ?>