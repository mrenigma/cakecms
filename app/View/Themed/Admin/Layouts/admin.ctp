<?php $user_dev = $this->Session->read('Auth.User.Group.id') == 1 ? TRUE : FALSE; ?>
<?php $user_admin = $this->Session->read('Auth.User.Group.id') == 2 ? TRUE : FALSE; ?>
<?php $user_editor = $this->Session->read('Auth.User.Group.id') == 3 ? TRUE : FALSE; ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title><?php echo __('Painel control'); ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=demoice-width, initial-scale=1.0">
	<script type="text/javascript"> function getROOT(){ return "<?php echo $this->request->webroot; ?>"}</script>
	<?php	
	// Favicon
	echo $this->Html->meta(
	    'favicon.ico',
	    '/img/admin/favicon.ico',
	    array('type' => 'icon')
	);
	?>
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
			'typo',
			'admin/menu.css',
			'admin/gallery.css'
		));
	echo $this->Html->script(array(
			'admin/jquery.js',
			'admin/Flot/jquery.flot.js',
			'admin/Flot/jquery.flot.resize.js',
			'admin/DataTables/jquery.dataTables.min_'.__('eng').'.js',
			'admin/ColResizable/colResizable-1.3.js',
			'admin/jQueryUI/jquery-ui-1.8.21.min.js',
			'admin/Uniform/jquery.uniform.js',
			'admin/Tipsy/jquery.tipsy.js',
			'admin/Elastic/jquery.elastic.js',
			'admin/ColorPicker/colorpicker.js',
			'admin/SuperTextarea/jquery.supertextarea.min.js',
			'admin/UISpinner/ui.spinner.js',
			'admin/MaskedInput/jquery.maskedinput-1.3.js',
			'admin/FullCalendar/fullcalendar.js',
			'admin/ColorBox/jquery.colorbox.js',
			'admin/menu.js',
			'admin/ckeditor/ckeditor.js',
			'admin/ckeditor/adapters/jquery.js',	
			'admin/ckeditor/config.js',
			'admin/kanrisha.js',
			'admin/jquery.nestable.js',
			'admin/menu.js',
			'admin/admin.js',
			'admin/gallery.js',
		));
	?>
	<script type="text/javascript">
		$(function(){
			$( '.wysiwyg' ).ckeditor({language: '<?php echo __('eng'); ?>'});
		});
	</script>
</head>
<body>
	<div class="changePattern">
		<span id="pattern1"></span>
		<span id="pattern2"></span>
		<span id="pattern3"></span>
		<span id="pattern4"></span>
		<span id="pattern5"></span>
		<span id="pattern6"></span>
	</div>
	<div class="top_panel">
		<div class="wrapper">
			<div class="user">
				<?php echo $this->Html->image('admin/user_avatar.png', array('alt' => 'Avatar')); ?>
				<span class="label"><?php echo $this->Session->read('Auth.User.username'); ?></span>
				<!-- Top Tooltip -->
				<div class="top_tooltip">
					<div>
						<ul class="user_options">
							<li class="i_16_profile"><?php echo $this->Html->link('', '/users/edit/'.$this->Session->read('Auth.User.id')); ?></li>
							<li class="i_16_logout"><?php echo $this->Html->link('', '/users/logout/'); ?></li>
						</ul>
					</div>
				</div>
			</div>
			<?php if($user_dev || $user_admin):?>
			<div class="top_links">
				<ul>
					<li class="i_22_settings">
						<a href="<?php echo $this->Html->url('/options/view_admin/'); ?>" title="Configurações">
							<span class="label"><?php echo __('Options'); ?></span>
						</a>
					</li>
					<li class="i_22_inbox top_inbox">
						<a href="<?php echo $this->Html->url('/contacts/view_admin/'); ?>" title="E-mails">
							<span class="label lasCount"><?php echo __('E-mails'); ?></span>
						</a>
					</li>					
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="wrapper small_menu">
		<ul class="menu_small_buttons">
			<li><a title="General Info" class="i_22_dashboard" href="index.html"></a></li>
			<li><a title="Your Messages" class="i_22_inbox" href="inbox.html"></a></li>
			<li><a title="Visual Data" class="i_22_charts" href="charts.html"></a></li>
			<li><a title="Kit elements" class="i_22_ui" href="ui.html"></a></li>
			<li><a title="Some Rows" class="i_22_tables smActive" href="tables.html"></a></li>
			<li><a title="Some Fields" clasns="i_22_forms" href="forms.html"></a></li>
		</ul>
	</div>
	<div class="wrapper contents_wrapper">
		<aside class="sidebar">
			<ul class="tab_nav">
				<li class="blog_icon" id='posts'>
					<a href="javascript:" title="Blog" class="click-sub">
						<span class="tab_label"><?php echo __('Blog'); ?></span>
						<span class="tab_info"><?php echo __('blog posts'); ?></span>
					</a>
					<ul class="sub-menu">
						<li id="posts"><?php echo $this->Html->link('Posts', '/posts/view_admin'); ?></li>
						<li id="categories"><?php echo $this->Html->link(__('Categories'), '/categories/view_admin/'); ?></li>
						<li id="comments"><?php echo $this->Html->link(__('Comments'), '/comments/view_admin'); ?></li>
					</ul>
				</li>
				<li class="page_icon" id='pages'>
					<a href="<?php echo $this->Html->url('/pages/view_admin'); ?>" title="Paginas">
						<span class="tab_label"><?php echo __('Pages');?></span>
						<span class="tab_info"><?php echo __('of site'); ?></span>
					</a>
				</li>
				<li class="computer_icon" id='widgets'>
					<a href="<?php echo $this->Html->url('/widgets/view_admin'); ?>" title="Widgets">
						<span class="tab_label"><?php echo __('Widgets'); ?></span>
						<span class="tab_info"><?php echo __('of site'); ?></span>
					</a>
				</li>
				<li class="menu_icon" id='menus'>
					<a href="<?php echo $this->Html->url('/menus/view_admin'); ?>" title="Menus">
						<span class="tab_label"><?php echo __('Menus'); ?></span>
						<span class="tab_info"><?php echo __('of navigate'); ?></span>
					</a>
				</li>
				<?php if($user_dev):?>
				<li class="page_icon" id='positions'>
					<a href="<?php echo $this->Html->url('/positions/view_admin'); ?>" title="Positions">
						<span class="tab_label"><?php echo __('Position');?></span>
						<span class="tab_info"><?php echo __('the menu'); ?></span>
					</a>
				</li>
				<li class="page_icon" id='templates'>
					<a href="<?php echo $this->Html->url('/templates/view_admin'); ?>" title="Templates">
						<span class="tab_label"><?php echo __('Templates');?></span>
						<span class="tab_info"><?php echo __('model pages'); ?></span>
					</a>
				</li>
				<li class="page_icon" id='inputs'>
					<a href="<?php echo $this->Html->url('/inputs/view_admin'); ?>" title="Inputs">
						<span class="tab_label"><?php echo __('Inputs'); ?></span>
						<span class="tab_info"><?php echo __('of template'); ?></span>
					</a>
				</li>
				<li class="gallery_icon" id='galleries'>
					<a href="<?php echo $this->Html->url('/galleries/view_admin'); ?>" title="Galleries">
						<span class="tab_label"><?php echo __('Galleries'); ?></span>
						<span class="tab_info"><?php echo __('of images'); ?></span>
					</a>
				</li>
				<li class="image_icon" id='images'>
					<a href="<?php echo $this->Html->url('/images/view_admin'); ?>" title="Images">
						<span class="tab_label"><?php echo __('Images'); ?></span>
						<span class="tab_info"><?php echo __('of gallery'); ?></span>
					</a>
				</li>
				<li class="group_icon" id='groups'>
					<a href="<?php echo $this->Html->url('/groups/view_admin'); ?>" title="Grupos">
						<span class="tab_label"><?php echo __('Groups'); ?></span>
						<span class="tab_info"><?php echo __('of users'); ?></span>
					</a>
				</li>
				<li class="admin_icon" id='admin'>
					<a href="<?php echo $this->Html->url('/admin/acl/acos'); ?>" title="Permissoes">
						<span class="tab_label"><?php echo __('Permissions'); ?></span>
						<span class="tab_info"><?php echo __('of access'); ?></span>
					</a>
				</li>
				<?php endif; ?>
				<li class="user_icon" id='users'>
					<a href="<?php echo $this->Html->url('/users/view_admin'); ?>" title="Usuários">
						<span class="tab_label"><?php echo __('Users'); ?></span>
						<span class="tab_info"><?php echo __('of site'); ?></span>
					</a>
				</li>
			</ul>
		</aside>
		<div class="contents">
			<div class="grid_wrapper">
				<?php echo $content_for_layout; ?>
			</div>
		</div>	
	</div>
	<footer>
		<div class="wrapper">
			<span class="copyright">
				CakeCMS
			</span>
		</div>
	</footer>
</body>
<?php echo $this->Js->writeBuffer(); ?>
</html>
