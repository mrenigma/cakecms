<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo __('Control Painel'); ?></title>
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="../Javascript/Flot/excanvas.js"></script>
	<![endif]-->
	<!-- The Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700" rel="stylesheet">
	<?php
	// Css
	echo $this->Html->css(array(
			'admin/style.css',
			'typo'
		));
	// Js
	echo $this->Html->script(array(
			'jquery-1.8.2.min.js',
			'admin/jQueryUI/jquery-ui-1.8.21.min.js',
			'admin/kanrisha.js',
		));
		// Favicon
	echo $this->Html->meta(
	    'favicon.ico',
	    '/img/admin/favicon.ico',
	    array('type' => 'icon')
	);
	?>
</head>
<body>
	<div class="wrapper contents_wrapper">
		<?php echo $content_for_layout; ?>	
	</div>
	<footer>
		<div class="wrapper">
			<span class="copyright">
				CakeCMS
			</span>
		</div>
	</footer>
</body>
</html>