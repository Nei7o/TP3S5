<?php App::uses('MenuBuilder', 'Lib/Menu'); ?>
<div class="skills view">
<h2><?php echo $skill['Skill']['name']; ?></h2>
	<ul class="elements">
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Name'); ?></li>
                        <li class='elemS'><?php echo h($skill['Skill']['name']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Description'); ?></li>
                        <li class='elemS'><?php echo h($skill['Skill']['description']); ?></li>
                    </ul>
                    </br>
		</li>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($skill['Skill']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($skill['Skill']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($skill['Skill']['description']); ?>
			&nbsp;
		</dd>-->
	</ul>
</div>
<?php 
    MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('Edit Skill'), array('action' => 'edit', $skill['Skill']['id'])) . '</li>
                                <li>' . $this->Form->postLink(__('Delete Skill'), array('action' => 'delete', $skill['Skill']['id']), array(), __('Are you sure you want to delete # %s?', $skill['Skill']['id'])) . '</li>
                                <li>' . $this->Html->link(__('List Skills'), array('action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Skill'), array('action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')) . '</li>';
?>

<div class="related">
	<h3><?php echo __('Related Members'); ?></h3>
	<?php if (!empty($skill['Member'])): ?>
	<ul class="menuPresM">
		<!--<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Family Id'); ?></th>-->
		<li><?php echo __('Name'); ?></li>
		<li><?php echo __('Family Name'); ?></li>
		<li><?php echo __('Date Joined Clan'); ?></li>
		<li><?php echo __('Date Of Birth'); ?></li>
		<li><?php echo __('Date Deceased'); ?></li>
		<li><?php echo __('Gender'); ?></li>
		<li><?php echo __('Email'); ?></li>
		<li><?php echo __('Age'); ?></li>
		<li class="options"><?php echo __('Actions'); ?></li>
	</ul>
            </br>
	<?php foreach ($skill['Member'] as $member): ?>
		<ul class="presM">
			<!--<td><?php echo $member['id']; ?></td>
			<td><?php echo $member['family_id']; ?></td>-->
			<li><?php echo $this->Text->truncate($member['name'], 15, array('ellipsis' => '...')); ?></li>
			<li><?php echo $this->Text->truncate($member['family_name'], 15, array('ellipsis' => '...')); ?></li>
			<li><?php echo $member['date_joined_clan']; ?></li>
			<li><?php echo $member['date_of_birth']; ?></li>
			<li><?php echo $member['date_deceased']; ?></li>
			<li><?php echo $member['gender']; ?></li>
			<li><?php echo $this->Text->truncate($member['email'], 15, array('ellipsis' => '...')); ?></li>
			<li><?php echo $member['age']; ?></li>
			<li>
				<?php echo $this->Html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
                                <?php
                                    if (AuthComponent::user('rank') == 'super-utilisateur' || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id']));
                                    }
                                ?>
                                <?php
                                    if (AuthComponent::user('rank') == 'super-utilisateur' || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Form->postLink(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), array(), __('Are you sure you want to delete # %s?', $member['id']));
                                    }
                                ?>
			</li>
		</ul>
            </br>
	<?php endforeach; ?>
<?php endif; ?>
</div>
