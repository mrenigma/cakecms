<div class="g_12">
	<div class="widget_header">
		<h4 class="widget_header_title wwIcon i_16_tables"><?php echo __('E-mails'); ?></h4>
	</div>
	<div class="widget_contents noPadding">
		<table class="datatable tables">
			<thead>
				<tr>
			        <th><?php echo __('Name'); ?></th>
			        <th><?php echo __('E-mail'); ?></th>
			        <th><?php echo __('Date'); ?></th>
			        <th><?php echo __('Options'); ?></th>
			    </tr>
			</thead>
			<tbody>
			<?php foreach ($contacts as $contact):?>
			<tr>
				<td><?php echo $contact['Contact']['name']; ?></td>
		        <td>
		            <?php echo $contact['Contact']['email']; ?>
		        </td>
		        <td><?php echo $this->Time->format('d/m/Y H:m:s', $contact['Contact']['created']); ?></td>
		        <td>
		        	<?php echo $this->Html->link(__('View'), '/contacts/view/'.$contact['Contact']['id']); ?>
		        	|
		        	<?php echo $this->Form->postLink(
		            __('Delete'),
			            array('action' => 'delete', $contact['Contact']['id']),
			            array('confirm' => __('Want to delete this contact?')));
			        ?>
		        </td>
		     </tr>
		     <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>