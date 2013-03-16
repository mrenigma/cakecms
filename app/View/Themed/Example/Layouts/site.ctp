<!DOCTYPE html>
<head>
  	<?php	
	if(isset($title_for_layout)) echo "<title>$title_for_layout</title>";
	if(isset($description_for_layout)) echo "<meta name='description' content='$description_for_layout' />";
	if(isset($keywords_for_layout)) echo "<meta name='keywords' content='$keywords_for_layout' />"; 
	?>
	<meta charset="utf-8">
	<?php
		echo $this->Html->css(array(
			'example/style',
		));
		echo $this->Html->script(array(
			'example/jquery.js',
			'example/jquery.cycle.lite.js',
		));
	?>
	<link rel="shortcut icon" href="/img/admin/favicon.ico">
	<script type="text/javascript">
		$(function(){
			$('#banner').cycle();	
		});
	</script>
</head>
<body>
	
	<div id="wrapper">
			<div id="header">
				<a href="<?php echo $this->request->webroot; ?>" class="logo"> cakeCMS </a>
				<?php echo $this->Menu->get_menu($this->requestAction('menus/view?position=header')); ?>
			</div>
			<div id="container">
				<?php echo $content_for_layout; ?>
			</div>
			<div id="footer">
				<div class="footer_menu">
					<?php echo $this->Menu->get_menu($this->requestAction('menus/view?position=footer')); ?>
				</div>
				CakeCMS
			</div>
		</div>
</body>
</html>