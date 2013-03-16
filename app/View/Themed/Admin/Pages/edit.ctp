<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('Add page'), array('controller'=>'pages', 'action'=>'add'), array('class'=>'add') ); ?>
		<?php echo $this->Html->link(__('List pages'), array('controller'=>'pages', 'action'=>'view_admin'), array('class'=>'list') ); ?>
		<?php echo $this->Form->postLink(__('Delete page'), array('action' => 'delete', $this->Form->value('Page.id')), null, __('Want to delete this page?')); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Edit'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Page', array('type' => 'file')); ?>
			<div class="line_grid" id="filter_select">
				<div class="g_3"><span class="label"><?php echo __('Template'); ?></span></div>
				<div class="g_9">
					<?php foreach($templates as $key => $value):?>
					<div class="filter_block_template">
						<input <?php if($value['Template']['id'] == $template_checked){ echo "checked";} ?> type="radio" name="data[Page][template_id]" id="PageTemplate<?php echo $value['Template']['file']; ?>" class="simple_field" value="<?php echo $value['Template']['id']; ?>">
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
							<textarea name="data[Widget][<?php echo $input['Input']['name'];?>]" class="simple_field wysiwyg" cols="30" rows="6" id="Page<?php echo $input['Input']['name'];?>"><?php if(isset($input['value'])) echo $input['value'];?></textarea>
							<?php }else{ ?>
								<input value="<?php if(isset($input['value'])) echo $input['value'];?>" name="data[Widget][<?php echo $input['Input']['name'];?>]" class="simple_field" id="Page<?php echo $input['Input']['name'];?>" />
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
				<div class="g_3"><span class="label"><?php echo __('Description'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Page.description', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Image'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('src', array('label' => false, 'type'=>'file',  'class' => 'simple_field')); ?>
				</div>
				<div class="g_9">
					<?php if(isset($this->request->data['Page']['thumb'])):
						echo $this->Html->Image($this->request->data['Page']['thumb'], array('id'=>'delete_thumb')); ?>
						<br />
						<a href="javascript:" title="<?php echo __('Delete'); ?>" id="delete_image_js" rel="<?php echo $this->request->data['Page']['id']; ?>" thumb="<?php echo $this->request->data['Page']['thumb']; ?>" type="pages"><?php echo __('Delete'); ?></a>
					<?php endif; ?>	
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
						<div class="field_notice">Defina o titulo da página <i>(Max 170 Caracteres).</i></div>
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
			<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
			<?php echo $this->Form->end(__('Edit')); ?>
	</div>
</div>
<?php echo $this->element('gallery'); ?>
