<div id="acos_link" class="submenu">
<?php
$selected = isset($selected) ? $selected : $this->params['action'];

$links = array();
$links[] = $this->Html->link(__d('acl', 'Synchronize actions ACOs'), '/admin/acl/acos/synchronize', array(array('confirm' => __d('acl', 'are you sure ?')), 'class' => ($selected == 'admin_synchronize' ) ? 'selected' : null));
$links[] = $this->Html->link(__d('acl', 'Clear actions ACOs'),       '/admin/acl/acos/empty_acos',  array(array('confirm' => __d('acl', 'are you sure ?')), 'class' => ($selected == 'admin_empty_acos' )  ? 'selected' : null));
$links[] = $this->Html->link(__d('acl', 'Build actions ACOs'),       '/admin/acl/acos/build_acl',                                                     array('class' => ($selected == 'admin_build_acl' )   ? 'selected' : null));
$links[] = $this->Html->link(__d('acl', 'Prune actions ACOs'),       '/admin/acl/acos/prune_acos',  array(array('confirm' => __d('acl', 'are you sure ?')), 'class' => ($selected == 'admin_prune_acos' )  ? 'selected' : null));


echo $this->Html->nestedList($links, array('class' => 'acl_links'));
?>

</div>


	<div class="clear"></div>
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_valid">Cadastrar novo Post</h4>
	</div>
	<div class="widget_contents noPadding">