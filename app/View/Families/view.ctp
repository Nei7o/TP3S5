<?php App::uses('MenuBuilder', 'Lib/Menu') ?>
<div class="families view">
<h2><?php echo h($family['Family']['name']); ?></h2>
            <img src="<?php echo '../../../app/webroot/img/logos/' . $family['Family']['logo'];?>" height="50" width="50" />
	<ul class='elements'>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Name'); ?></li>
                        <li class='elem'><?php echo h($family['Family']['name']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Mafia'); ?></li>
                        <li class='elem'><?php echo $this->Html->link($family['Mafia']['name'], array('controller' => 'mafias', 'action' => 'view', $family['Mafia']['id'])); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Years Active'); ?></li>
                        <li class='elem'><?php echo h($family['Family']['years_active']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Country'); ?></li>
                        <li class='elem'><?php echo h($family['Family']['country_id']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('State'); ?></li>
                        <li class='elem'><?php echo h($family['Family']['state_id']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Membership'); ?></li>
                        <li class='elem'><?php echo h($family['Family']['membership']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Criminal Activities'); ?></li>
                        <li class='elem'><?php echo h($family['Family']['criminal_activities']); ?></li>
                    </ul>
                    </br>
		</li>
		
                <!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($family['Family']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mafia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($family['Mafia']['name'], array('controller' => 'mafias', 'action' => 'view', $family['Mafia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($family['Family']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Years Active'); ?></dt>
		<dd>
			<?php echo h($family['Family']['years_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Territory'); ?></dt>
		<dd>
			<?php echo h($family['Family']['territory']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership'); ?></dt>
		<dd>
			<?php echo h($family['Family']['membership']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Criminal Activities'); ?></dt>
		<dd>
			<?php echo h($family['Family']['criminal_activities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($family['Family']['logo']); ?>
			&nbsp;
		</dd>-->
	</ul>
</div>

<?php 
    MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('Edit Family'), array('action' => 'edit', $family['Family']['id'])) . '</li>
                                <li>' . $this->Form->postLink(__('Delete Family'), array('action' => 'delete', $family['Family']['id']), array(), __('Are you sure you want to delete # %s?', $family['Family']['id'])) . '</li>
                                <li>' . $this->Html->link(__('List Families'), array('action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Family'), array('action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Mafias'), array('controller' => 'mafias', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Mafia'), array('controller' => 'mafias', 'action' => 'add')) . '</li>
                                <li>' . $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')) . '</li>
                                <li>' . $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')) . '</li>';
?>


<div class="related">
	<h3><?php echo __('Related Members'); ?></h3>
	<?php if (!empty($family['Member'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<ul class='menuPresM'>
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
	<?php foreach ($family['Member'] as $member): ?>
		<ul class='presM'>
                    <li><?php echo $this->Text->truncate($member['name'], 15, array('ellipsis' => '...')); ?></li>
			<li><?php echo $this->Text->truncate($member['family_name'], 15, array('ellipsis' => '...')); ?></li>
			<li><?php echo $member['date_joined_clan']; ?></li>
			<li><?php echo $member['date_of_birth']; ?></li>
			<li><?php echo $member['date_deceased']; ?></li>
			<li><?php echo $member['gender']; ?></li>
			<li><?php echo $this->Text->truncate($member['email'], 15, array('ellipsis' => '...')); ?></li>
			<li><?php echo $member['age']; ?></li>
			<li class="sousMenuPres">
				<?php echo $this->Html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
                                <?php
                                    if (AuthComponent::user('id') == $family['Mafia']['id_user'] || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id']));
                                    }
                                ?>
                                <?php
                                    if (AuthComponent::user('id') == $family['Mafia']['id_user'] || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Form->postLink(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), array(), __('Are you sure you want to delete # %s?', $member['id']));
                                    }
                                ?>
			</li>
		</ul>
            </br>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

    </br>
    <?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add'), array('class' => 'btn btn-primary')); ?> </li>
</div>
