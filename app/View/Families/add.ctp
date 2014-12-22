<div class="families form">
<?php echo $this->Form->create('Family', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Family'); ?></legend>
	<?php
                echo $this->Html->script('View/Families/add', array('inline' => false));
                
		echo $this->Form->input('mafia_id');
		echo $this->Form->input('name');
		echo $this->Form->input('years_active');
		//echo $this->Form->input('territory');
                echo $this->Form->input('country_id');
                echo $this->Form->input('state_id');
		echo $this->Form->input('criminal_activities', array('class' => 'ui-autocomplete', 'id' => 'autocomplete'));
		echo $this->Form->input('logo_file', array('label' => 'Le logo de cette famille (JPG, PNG ou GIF; 1Mo max.)', 'type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Families'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Mafias'), array('controller' => 'mafias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mafia'), array('controller' => 'mafias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php

$this->Js->get('#FamilyCountryId')->event('change',
        $this->Js->request(array(
            'controller' => 'states',
            'action' => 'getByCountry'
        ), array(
            'update' => '#FamilyStateId',
            'async' => true,
            'method' => 'post',
            'dataExpression' => true,
            'data' => $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        )));
