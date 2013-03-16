<div class="text_content text_contact">
	<?php echo $this->Form->create('Contact', array('class'=>'contact')); ?>
	<?php echo $this->Form->Input('name', array('label'=> __('Name'))); ?>
	<?php echo $this->Form->Input('email', array('label'=> __('E-mail'))); ?>
	<?php echo $this->Form->Input('phone', array('label'=> __('Telephone'))); ?>
	<?php echo $this->Form->Input('message', array('label'=> __('Message'))); ?>
	<?php echo $this->Form->end('Enviar'); ?>
</div>
<div class="map">
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Florian%C3%B3polis+-+SC&amp;aq=0&amp;oq=flor&amp;sll=-27.609691,-48.478875&amp;sspn=0.6766,1.263428&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Florian%C3%B3polis+-+Santa+Catarina&amp;ll=-27.609322,-48.478546&amp;spn=0.338376,0.631714&amp;z=11&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;geocode=&amp;q=Florian%C3%B3polis+-+SC&amp;aq=0&amp;oq=flor&amp;sll=-27.609691,-48.478875&amp;sspn=0.6766,1.263428&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Florian%C3%B3polis+-+Santa+Catarina&amp;ll=-27.609322,-48.478546&amp;spn=0.338376,0.631714&amp;z=11" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>
</div>