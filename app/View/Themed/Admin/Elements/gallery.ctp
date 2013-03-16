<?php 
$controller = $this->request->params['controller'];
$action = isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : FALSE;
$url = $this->requestAction('galleries/set_url_iframe/?controller='.$controller.'&action='.$action);
?>
<div class="mask"></div>
<div class="box-galley">	
	<div id="create_gallery">
		<div id="close">X</div>
		<iframe src="<?php echo $this->Html->url($url); ?>" id="result-image"></iframe>
	</div>
</div>