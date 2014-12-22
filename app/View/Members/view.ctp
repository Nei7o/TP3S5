<?php App::uses('MenuBuilder', 'Lib/Menu'); ?>
<div class="members view">
<h2><?php echo $member['Member']['name'] . ' ' . $member['Member']['family_name']; ?></h2>
        <ul class="elements">
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Name'); ?></li>
                        <li class='elem'><?php echo $this->Text->truncate(h($member['Member']['name']), 25, array('ellipsis' => '...')); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Family Name'); ?></li>
                        <li class='elem'><?php echo $this->Text->truncate(h($member['Member']['family_name']), 25, array('ellipsis' => '...')); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Family'); ?></li>
                        <li class='elem'><?php echo $this->Html->link($member['Family']['name'], array('controller' => 'families', 'action' => 'view', $member['Family']['id'])); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Date Joined Clan'); ?></li>
                        <li class='elem'><?php echo h($member['Member']['date_joined_clan']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Date of Birth'); ?></li>
                        <li class='elem'><?php echo h($member['Member']['date_of_birth']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Date Deceased'); ?></li>
                        <li class='elem'><?php echo h($member['Member']['date_deceased']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Gender'); ?></li>
                        <li class='elem'><?php echo h($member['Member']['gender']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Email'); ?></li>
                        <li class='elem'><?php echo $this->Text->truncate(h($member['Member']['email']), 25, array('ellipsis' => '...')); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Age'); ?></li>
                        <li class='elem'><?php echo h($member['Member']['age']); ?></li>
                    </ul>
                    </br>
		</li>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($member['Member']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family'); ?></dt>
		<dd>
			<?php echo $this->Html->link($member['Family']['name'], array('controller' => 'families', 'action' => 'view', $member['Family']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family Name'); ?></dt>
		<dd>
			<?php echo h($member['Member']['family_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($member['Member']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Joined Clan'); ?></dt>
		<dd>
			<?php echo h($member['Member']['date_joined_clan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($member['Member']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Deceased'); ?></dt>
		<dd>
			<?php echo h($member['Member']['date_deceased']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($member['Member']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($member['Member']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($member['Member']['age']); ?>
			&nbsp;
		</dd>-->
	</dl>
</div>
<?php 
    MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])) . '</li>
                                <li>' . $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), array(), __('Are you sure you want to delete # %s?', $member['Member']['id'])) . '</li>
                                <li>' . $this->Html->link(__('List Members'), array('action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Member'), array('action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Skills'), array('controller' => 'skills', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Skill'), array('controller' => 'skills', 'action' => 'add')) . '</li>';
?>

<div class="related">
	<h3><?php echo __('Related Skills'); ?></h3>
	<?php if (!empty($member['Skill'])): ?>
	<ul class="menuPres">
		<!--<th><?php echo __('Id'); ?></th>-->
		<li><?php echo __('Name'); ?></li>
		<li><?php echo __('Description'); ?></li>
		<li class="options"><?php echo __('Actions'); ?></li>
	</ul>
        <br>
	<?php foreach ($member['Skill'] as $skill): ?>
		<ul class="pres">
			<!--<li><?php echo $skill['id']; ?></li>-->
			<li><?php echo $this->Text->truncate($skill['name'], 25, array('ellipsis' => '...')); ?></li>
			<li><?php echo $this->Text->truncate($skill['description'], 25, array('ellipsis' => '...')); ?></li>
			<li>
				<?php echo $this->Html->link(__('View'), array('controller' => 'skills', 'action' => 'view', $skill['id'])); ?>
                                <?php
                                    if (AuthComponent::user('rank') == 'super-utilisateur' || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Html->link(__('Edit'), array('controller' => 'skills', 'action' => 'edit', $skill['id']));
                                    }
                                ?>
                                <?php
                                    if (AuthComponent::user('rank') == 'super-utilisateur' || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Form->postLink(__('Delete'), array('controller' => 'skills', 'action' => 'delete', $skill['id']), array(), __('Are you sure you want to delete # %s?', $skill['id']));
                                    }
                                ?>
			</li>
		</ul>
        </br>
	<?php endforeach; ?>
<?php endif; ?>
</br>
<?php echo $this->Html->link(__('New Skill'), array('controller' => 'skills', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
