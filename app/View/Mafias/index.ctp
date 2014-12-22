<?php App::uses('MenuBuilder', 'Lib/Menu'); ?>
<div class="mafias index">
	<h2><?php echo __('Mafias'); ?></h2>
	<thead>
	<ul class="menuPres">
			<!--<li><?php echo $this->Paginator->sort('id'); ?></li>-->
                        <li><?php echo $this->Paginator->sort('name'); ?></li>
			<li><?php echo $this->Paginator->sort('date_of_origin'); ?></li>
			<li><?php echo $this->Paginator->sort('membership'); ?></li>
			<li><?php echo $this->Paginator->sort('activities'); ?></li>
			<li><?php echo $this->Paginator->sort('customs'); ?></li>
			<li class='options'><?php echo __('Actions'); ?></li>
	</ul>
        </br>
	</thead>
	<tbody>
	<?php foreach ($mafias as $mafia): ?>
	<ul class="pres">
		<!--<td><?php echo h($mafia['Mafia']['id']); ?>&nbsp;</td>-->
		<li><?php echo $this->Text->truncate(h($mafia['Mafia']['name']), 10, array('ellipsis' => '...')); ?>&nbsp;</li>
		<li><?php echo h($mafia['Mafia']['date_of_origin']); ?>&nbsp;</li>
		<li><?php echo h($mafia['Mafia']['membership']); ?>&nbsp;</li>
		<li><?php echo $this->Text->truncate(h($mafia['Mafia']['activities']), 10, array('ellipsis' => '...')); ?>&nbsp;</li>
		<li><?php echo $this->Text->truncate(h($mafia['Mafia']['customs']), 10, array('ellipsis' => '...')); ?>&nbsp;</li>
		<li class="sousMenuPres">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mafia['Mafia']['id'])); ?>
			<?php
                            if (AuthComponent::user('id') == $mafia['Mafia']['id_user'] || AuthComponent::user('rank') == 'admin') {
                                echo $this->Html->link(__('Edit'), array('action' => 'edit', $mafia['Mafia']['id'])); 
                            }
                        ?>
			<?php
                            if (AuthComponent::user('id') == $mafia['Mafia']['id_user'] || AuthComponent::user('rank') == 'admin') {
                                echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mafia['Mafia']['id']), array(), __('Are you sure you want to delete # %s?', $mafia['Mafia']['id']));
                            }
                        ?>
		</li>
	</ul>
        </br>
<?php endforeach; ?>
	</tbody>
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>-->
</div>
<?php 
 MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('New Mafia'), array('action' => 'add')) . '</li><li>' . $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')) . '</li><li>' . $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')) . '</li>';
?>
