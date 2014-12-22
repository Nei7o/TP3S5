<?php App::uses('MenuBuilder', 'Lib/Menu') ?>
<div class="mafias view">
<h2><?php echo h($mafia['Mafia']['name']); ?></h2>
	<ul class='elements'>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mafia['Mafia']['id']); ?>
			&nbsp;
		</dd>-->
		<li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Name'); ?></li>
                        <li class='elem'><?php echo $this->Text->truncate(h($mafia['Mafia']['name']), 20, array('ellipsis' => '...')); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Date Of Origin'); ?></li>
                        <li class='elem'><?php echo h($mafia['Mafia']['date_of_origin']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Membership'); ?></li>
                        <li class='elem'><?php echo h($mafia['Mafia']['membership']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Activities'); ?></li>
                        <li class='elem'><?php echo $this->Text->truncate(h($mafia['Mafia']['activities']), 20, array('ellipsis' => '...')); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Customs'); ?></li>
                        <li class='elem'><?php echo $this->Text->truncate(h($mafia['Mafia']['customs']), 20, array('ellipsis' => '...')); ?></li>
                    </ul>
                    </br>
		</li>
		<!--<dt><?php echo __('Date Of Origin'); ?></dt>
		<dd>
			<?php echo h($mafia['Mafia']['date_of_origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership'); ?></dt>
		<dd>
			<?php echo h($mafia['Mafia']['membership']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activities'); ?></dt>
		<dd>
			<?php echo h($mafia['Mafia']['activities']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customs'); ?></dt>
		<dd>
			<?php echo h($mafia['Mafia']['customs']); ?>
			&nbsp;
		</dd>-->
	</ul>
</div>

<?php 
    MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('Edit Mafia'), array('action' => 'edit', $mafia['Mafia']['id'])) . '</li>
<li>' . $this->Html->link(__('List Mafias'), array('action' => 'index')) . '</li>
<li>' . $this->Html->link(__('New Mafia'), array('action' => 'add')) . '</li>
<li>' . $this->Html->link(__('List Families'), array('controller' => 'families', 'action' => 'index')) . '</li>
<li>' . $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add')) . '</li>';
?>

<div class="related">
	<h3><?php echo __('Related Families'); ?></h3>
	<?php if (!empty($mafia['Family'])): ?>
	<ul class='menuPres'>
		<!--<th><?php echo __('Id'); ?></th>-->
		<!--<th><?php echo __('Mafia Id'); ?></th>-->
		<li><?php echo __('Name'); ?></li>
		<li><?php echo __('Years Active'); ?></li>
		<li><?php echo __('Country'); ?></li>
                <li><?php echo __('State'); ?></li>
		<li><?php echo __('Membership'); ?></li>
		<li><?php echo __('Criminal Activities'); ?></li>
		<li class='options'><?php echo __('Actions'); ?></li>
		<!--<th><?php echo __('Logo'); ?></th>-->
	</ul>
        </br>
	<?php foreach ($mafia['Family'] as $family): ?>
		<ul class='pres'>
			<li><?php echo $this->Text->truncate($family['name'], 20, array('ellipsis' => '...')); ?></li>
			<li><?php echo $family['years_active']; ?></li>
			<li><?php echo $this->Text->truncate($family['country_id'], 20, array('ellipsis' => '...')); ?></li>
                        <li><?php echo $this->Text->truncate($family['state_id'], 20, array('ellipsis' => '...')); ?></li>
			<li><?php echo $family['membership']; ?></li>
			<li><?php echo $this->Text->truncate($family['criminal_activities'], 20, array('ellipsis' => '...')); ?></li>
			<!--<li><?php echo $family['logo']; ?></li>-->
			<li class="sousMenuPres">
				<?php echo $this->Html->link(__('View'), array('controller' => 'families', 'action' => 'view', $family['id'])); ?>
                                
				<?php
                                    if (AuthComponent::user('id') == $mafia['Mafia']['id_user'] || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Html->link(__('Edit'), array('controller' => 'families', 'action' => 'edit', $family['id']));
                                    }
                                ?>
				<?php
                                    if (AuthComponent::user('id') == $mafia['Mafia']['id_user'] || AuthComponent::user('rank') == 'admin') {
                                        echo $this->Form->postLink(__('Delete'), array('controller' => 'families', 'action' => 'delete', $family['id']), array(), __('Are you sure you want to delete # %s?', $family['id']));
                                    }
                                ?>
			</li>
                </ul>
        </br>
	<?php endforeach; ?>
        </br>
<?php endif; ?>

<?php echo $this->Html->link(__('New Family'), array('controller' => 'families', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
		
</div>
