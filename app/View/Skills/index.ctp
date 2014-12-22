<?php App::uses('MenuBuilder', 'Lib/Menu') ?>
div class="skills index">
	<h2><?php echo __('Skills'); ?></h2>
	<thead>
	<ul class="menuPres">
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
			<li><?php echo $this->Paginator->sort('name'); ?></li>
			<li><?php echo $this->Paginator->sort('description'); ?></li>
			<li class="options"><?php echo __('Actions'); ?></li>
	</ul>
        </br>
	</thead>
	<tbody>
	<?php foreach ($skills as $skill): ?>
	<ul class="pres">
		<!--<td><?php echo h($skill['Skill']['id']); ?>&nbsp;</td>-->
		<li><?php echo $this->Text->truncate(h($skill['Skill']['name']), 25, array('ellipsis' => '...')); ?>&nbsp;</li>
		<li><?php echo $this->Text->truncate(h($skill['Skill']['description']), 25, array('ellipsis' => '...')); ?>&nbsp;</li>
		<li>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $skill['Skill']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $skill['Skill']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $skill['Skill']['id']), array(), __('Are you sure you want to delete # %s?', $skill['Skill']['id'])); ?>
		</li>
	</ul>
        </br>
<?php endforeach; ?>
	</tbody>
</div>
<?php
    MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('New Skill'), array('action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')) . '</li>';
?>
