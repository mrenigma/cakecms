<div class="single_content">
	<h1 class="title"><?php echo $page['Page']['title'] ?></h1>
	<div id="content_banner">
		<ul id="banner">
			<?php
			foreach ($images as $image):
			echo "<li>". $this->Html->Image($image['medium'])."</li>";
			endforeach;
			?>
		</ul>		
	</div>
	<?php echo $page['Page']['text'] ?>
</div>