<div class="mafias form">
<?php echo $this->Form->create('Mafia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Mafia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('date_of_origin');
		echo $this->Form->input('membership');
		echo $this->Form->input('activities');
		echo $this->Form->input('customs');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Mafia.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Mafia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mafias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')); ?> </li>
	</ul>
</div>
