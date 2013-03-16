<div class="g_12">
	<div class="link_header">
		<?php echo $this->Html->link(__('List messages'), array('action' => 'view_admin'), array('class'=>'add') ); ?>
	</div>
	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('E-mails'); ?></h4>
	</div>
	<div class="widget_contents">
		<?php
			echo "<strong>".__('Nome').":</strong> ". $contact['Contact']['name'];
			echo "<br />";
			echo "<strong>".__('E-mail').":</strong> ". $contact['Contact']['email'];
			echo "<br />";
			echo "<strong>".__('Telephone').":</strong>". $contact['Contact']['phone'];
			echo "<br />";
			echo "<p>";
			echo $contact['Contact']['message'];
			echo "</p>";
		?>
	</div>
</div>