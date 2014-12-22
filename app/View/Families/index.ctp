<?php App::uses('MenuBuilder', 'Lib/Menu'); ?>
<div class="families index">
	<h2><?php echo __('Families'); ?></h2>
	<thead>
	<ul class='menuPresM'>
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
			<li><?php echo $this->Paginator->sort('name'); ?></li>
			<li><?php echo $this->Paginator->sort('mafia_id', 'Mafia'); ?></li>
			<li><?php echo $this->Paginator->sort('years_active'); ?></li>
			<li><?php echo $this->Paginator->sort('country_id'); ?></li>
                        <li><?php echo $this->Paginator->sort('state_id'); ?></li>
			<li><?php echo $this->Paginator->sort('membership'); ?></li>
			<li><?php echo $this->Paginator->sort('criminal_activities'); ?></li>
			<!--<li><?php echo $this->Paginator->sort('logo'); ?></li>-->
			<li><?php echo __('Actions'); ?></li>
	</ul>
        </br>
	</thead>
	<tbody>
	<?php foreach ($families as $family): ?>
	<ul class='presM'>
		<li><?php echo $this->Text->truncate(h($family['Family']['name']), 15, array('ellipsis' => '...')); ?>&nbsp;</td>
		<li>
			<?php echo $this->Html->link($family['Mafia']['name'], array('controller' => 'mafias', 'action' => 'view', $family['Mafia']['id'])); ?>
		</li>
                <li><?php echo h($family['Family']['years_active']); ?>&nbsp;</li>
                <li><?php echo $this->Text->truncate(h($family['Family']['country_id']), 15, array('ellipsis' => '...')); ?>&nbsp;</li>
                <li><?php echo $this->Text->truncate(h($family['Family']['state_id']), 15, array('ellipsis' => '...')); ?>&nbsp;</li>
		<li><?php echo h($family['Family']['membership']); ?>&nbsp;</li>
		<li><?php echo $this->Text->truncate(h($family['Family']['criminal_activities']), 15, array('ellipsis' => '...')); ?>&nbsp;</li>
		<!--<li><?php echo h($family['Family']['logo']); ?>&nbsp;</li>-->
		<li>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $family['Family']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $family['Family']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $family['Family']['id']), array(), __('Are you sure you want to delete # %s?', $family['Family']['id'])); ?>
		</li>
	</ul>
        </br>
<?php endforeach; ?>
	</tbody>
</div>
<?php 
    MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('New Family'), array('action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Mafias'), array('controller' => 'mafias', 'action' => 'index')) .  '</li>
                                <li>' . $this->Html->link(__('New Mafia'), array('controller' => 'mafias', 'action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')) .  '</li>
                                <li>' . $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')) . '</li>';
?>
