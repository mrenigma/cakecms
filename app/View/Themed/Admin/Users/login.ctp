	<div class="wrapper contents_wrapper">
		<div class="login">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_login"><?php echo __('Painel control'); ?></h4>
	</div>
	<?php if($this->Session->read('Message.flash')){
		echo '<div class="error iDialog">'.$this->Session->flash().'</div>';
	}?>	
	<div class="widget_contents lgNoPadding">
		<?php echo $this->Form->create('User', array('action' => 'login')); ?>
		<div class="line_grid">
			<div class="g_12 g_12M">
				<?php echo $this->Form->input('username', array('label' => false, 'class' => 'simple_field tooltip', 'title'=>__('Username')) ); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="line_grid">
			<div class="g_12 g_12M">
				<?php echo $this->Form->input('password', array('label' => false, 'class' => 'simple_field tooltip',  'title' => __('Password'))); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="line_grid">
			<input class="submitIt simple_buttons" value="<?php echo __('Access'); ?>" type="submit">
			<div class="clear"></div>
		</div>
		</form>
	</div>
	</div>	
</div>