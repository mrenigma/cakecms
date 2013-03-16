<?php
echo $this->element('design/header');
?>

<?php
echo $this->element('Acos/links');
?>

<?php
if($run)
{
    echo '<h3>' . __d('acl', 'New ACOs') . '</h3>';
    
    if(count($create_logs) > 0)
    {
//        echo '<p>';
//        echo __d('acl', 'The following actions ACOs have been created');
//        echo '<p>';
        echo $this->Html->nestedList($create_logs);
    }
    else
    {
        echo '<p>';
        echo __d('acl', 'Sem novos ACOs para criar');
        echo '</p>';
    }
    
    echo '<h3>' . __d('acl', 'Obsolete ACOs') . '</h3>';
    
    if(count($prune_logs) > 0)
    {
//        echo '<p>';
//        echo __d('acl', 'The following actions ACOs have been deleted');
//        echo '<p>';
        echo $this->Html->nestedList($prune_logs);
    }
    else
    {
        echo '<p>';
        echo __d('acl', 'Sem ACO para deletar');
        echo '</p>';
    }
}
else
{
    echo '<p>';
    echo __d('acl', 'Esta página permite que você sincronize os controladores existentes e ações com a tabela de dados ACO.');
    echo '</p>';
    
    echo '<p>&nbsp;</p>';
    
    $has_aco_to_sync = false;
    
    if(count($missing_aco_nodes) > 0)
    {
        echo '<h3>' . __d('acl', 'ACOs Deletados') . '</h3>';
        
        echo '<p>';
    	echo $this->Html->nestedList($missing_aco_nodes);
    	echo '</p>';
    	
        $has_aco_to_sync = true;
    }
    
    if(count($nodes_to_prune) > 0)
    {
        echo '<h3>' . __d('acl', 'ACO Obsoleto') . '</h3>';
	    
	    echo '<p>';
    	echo $this->Html->nestedList($nodes_to_prune);
    	echo '</p>';
    	
        $has_aco_to_sync = true;
    }
    
    if($has_aco_to_sync)
    {
        echo '<p>&nbsp;</p>';
        
        echo '<p>';
        echo __d('acl', 'Clicking the link will not change or remove permissions for existing actions ACOs.');
        echo '</p>';
        
        echo '<p>';
        echo $this->Html->link($this->Html->image('/acl/img/design/sync.png') . ' ' . __d('acl', 'Synchronize'), '/admin/acl/acos/synchronize/run', array('escape' => false));
        echo '</p>';
    }
    else
    {
        echo '<p style="font-style:italic;">';
        echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'ACO sincronizado com a base de dados.');
        echo '</p>';
    }
}

echo $this->element('design/footer');
?>