<div class="link_header gallery_level">
	<?php echo $this->Form->postLink(__('Delete gallery'), array('controller'=> 'galleries', 'action' => 'delete_iframe', $gallery_id), null, 'Want to delete this gallery?'); ?>
</div>
<div class="clear"></div>
<div class="g_6">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_valid"><?php echo __('Images'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Image', array('type' => 'file')); ?>
			<?php echo $this->Form->input('gallery_id', array('label' => false, 'type' => 'hidden', 'value' => $gallery_id)); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Image'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Image.src', array('label' => false, 'type'=>'file',  'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Title'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Image.title', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Link'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Image.url', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"> <?php echo __('Description'); ?> </span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Image.description', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
		<?php echo $this->Form->end(__('Add'), array('class' => 'send')); ?>
	</div>
</div>
<div class="g_6">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_valid"><?php echo __('To arrange press and move the images'); ?></h4>
	</div>
	<div class="widget_contents noPadding block_gallery">
		<div id="images_gallery">
			<div class="dd" id="nestable">
		    	<ol class="dd-list">
		    		<?php foreach($images as $image): ?>
		    		<li class="dd-item" data-id="<?php echo $image['Image']['id'];?>">
		    			<div class="dd-handle">
						<?php echo $this->Html->image($image['Image']['small']); ?>
						<div class="info_gallery">
							<span><?php echo $image['Image']['title'];?></span> <br />
						</div>
						</div>
						<div class="options_gallery">
						<a href="javascript:" style="color: #000" title="Delete image" class="options_gallery_del" id="<?php echo $image['Image']['id'];?>">X</a>
					</div>
		    		</li>
		    		<?php endforeach; ?>
		    	</ol>
			</div>
		</div>
		<form>
			<div class="submit"><input type="submit" value="Save" id="save-order-images"></div>
		</form>
	</div>	
</div>