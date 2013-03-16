<div class="g_6">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Add item'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<?php echo $this->Form->create('Menu', array('action'=>'add')); ?>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Menu position'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('position_id', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Name'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Menu.name', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Custon URL'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('Menu.custom', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Page'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('page_id', array('label' => false, 'class' => 'simple_field', 'empty' => __('Empty'))); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Open in new window'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('_blank', array('label' => false, 'class' => 'simple_field')); ?>
				</div>
			</div>
			<div class="line_grid">
				<div class="g_3"><span class="label"><?php echo __('Categories'); ?></span></div>
				<div class="g_9">
					<?php echo $this->Form->input('category_id', array('label' => false, 'class' => 'simple_field', 'empty' => __('Empty'))); ?>
				</div>
			</div>
		<?php echo $this->Form->end(__('Add to menu'), array('class' => 'send')); ?>
	</div>
</div>

<div class="g_6">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_forms"><?php echo __('Order'); ?></h4>
	</div>
	<div class="widget_contents">
		<div class="line_grid">
			<div class="g_9">	
				<?php echo $this->Form->create('Menu', array('type' => 'get', 'class' => 'filter_menu')); ?>
					<?php echo $this->Form->input('position_id', array('label' => false, 'class' => 'simple_field', 'id' => 'filter_menu')); ?>
				<?php echo $this->Form->end(__('Filter')); ?>
			</div>
		</div>
        <div class="dd" id="nestable">
            <?php
        	function m($itens){
        		echo '<ol class="dd-list">';
				foreach($itens as $item){
            		echo '<li class="dd-item" data-id="'.$item['Menu']['id'].'">';
	            		echo '<div class="dd-handle">'.$item['Menu']['name'].'</div>';
						echo '<a href="javascript:" class="delete">'.__('Remove').'</a>';
	            		if(isset($item['children'])){
	            			m($item['children']);
	            		}
            		echo '</li>';
				}
				echo '</ol>';
        	}
			m($menus);
            ?>
        </div>
        <div class="clear"></div>
     </div>   
	<input type="submit" id="save-menu" value="<?php echo __('Save order'); ?>" />
</div>