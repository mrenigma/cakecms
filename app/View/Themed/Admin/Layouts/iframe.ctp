<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=demoice-width, initial-scale=1.0">
	<script type="text/javascript"> function getROOT(){ return "<?php echo $this->request->webroot; ?>"}</script>
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="../Javascript/Flot/excanvas.js"></script>
	<![endif]-->
	<!-- The Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700" rel="stylesheet">
	<?php
	echo $this->Html->css(array(
			'admin/style.css',
			'admin/typo.css',
			'admin/menu.css',
			'admin/gallery.css'
		));
	echo $this->Html->script(array(
			'admin/jquery.js',
			'admin/jQueryUI/jquery-ui-1.8.21.min.js',
			'admin/jquery.nestable.js',
			'admin/admin.js',
			'admin/gallery.js',
		));
	?>
</head>
<body>
	<div class="wrapper contents_wrapper">
		<div class="contents" style="width: 780px">
			<div class="grid_wrapper">
				<?php
					echo $content_for_layout;
				?>
			</div>
		</div>	
	</div>
</body>
</html>
