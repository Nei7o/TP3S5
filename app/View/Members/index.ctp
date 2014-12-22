<?php App::uses('MenuBuilder', 'Lib/Menu') ?>
<div class="members index">
	<h2><?php echo __('Members'); ?></h2>
	<thead>
	<ul class="menuPresM">
			<!--<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('family_id'); ?></th>-->
			<li><?php echo $this->Paginator->sort('name'); ?></li>
			<li><?php echo $this->Paginator->sort('family_name'); ?></li>
			<li><?php echo $this->Paginator->sort('date_joined_clan'); ?></li>
			<li><?php echo $this->Paginator->sort('date_of_birth'); ?></li>
			<li><?php echo $this->Paginator->sort('date_deceased'); ?></li>
                        <li><?php echo $this->Paginator->sort('gender'); ?></li>
			<li><?php echo $this->Paginator->sort('email'); ?></li>
			<li><?php echo $this->Paginator->sort('age'); ?></li>
			<li class="options"><?php echo __('Actions'); ?></li>
	</ul>
        </br>
	</thead>
	<tbody>
	<?php foreach ($members as $member): ?>
	<ul class='presM'>
		<!--<td><?php echo h($member['Member']['id']); ?>&nbsp;</td>-->
		<li><?php echo $this->Text->truncate(h($member['Member']['name']), 15, array('ellipsis' => '...')); ?>&nbsp;</li>
		<li>
			<?php echo $this->Html->link($member['Family']['name'], array('controller' => 'families', 'action' => 'view', $member['Family']['id'])); ?>
		</li>
		<!--<li><?php echo h($member['Member']['family_name']); ?>&nbsp;</li>-->
		<li><?php echo h($member['Member']['date_joined_clan']); ?>&nbsp;</li>
		<li><?php echo h($member['Member']['date_of_birth']); ?>&nbsp;</li>
		<li><?php echo h($member['Member']['date_deceased']); ?>&nbsp;</li>
		<li><?php echo h($member['Member']['gender']); ?>&nbsp;</li>
		<li><?php echo h($member['Member']['email']); ?>&nbsp;</li>
		<li><?php echo h($member['Member']['age']); ?>&nbsp;</li>
		<li>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $member['Member']['id'])); ?>
                        <?php
                            if (AuthComponent::user('rank') == 'super-utilisateur' || AuthComponent::user('rank') == 'admin') {
                                echo $this->Html->link(__('Edit'), array('action' => 'edit', $member['Member']['id']));
                            }
                        ?>
                        <?php
                            if (AuthComponent::user('rank') == 'super-utilisateur' || AuthComponent::user('rank') == 'admin') {
                                echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $member['Member']['id']), array(), __('Are you sure you want to delete # %s?', $member['Member']['id']));
                            }
                        ?>
			<?php  ?>
			<?php  ?>
		</li>
	</ul>
        </br>
<?php endforeach; ?>
	</tbody>
</div>
<?php 
    MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('New Member'), array('action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Skills'), array('controller' => 'skills', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Skill'), array('controller' => 'skills', 'action' => 'add')) . '</li>';
?>
		
