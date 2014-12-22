<?php App::uses('MenuBuilder', 'Lib/Menu') ?>

<div class="users view">
<h2><?php echo h($user['User']['username']); ?></h2>
	<ul class="elements">
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Username'); ?></li>
                        <li class='elemS'><?php echo h($user['User']['username']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('Email'); ?></li>
                        <li class='elemS'><?php echo h($user['User']['email']); ?></li>
                    </ul>
                    </br>
		</li>
                <li>
                    <ul>
                        <li class='elemTitle'><?php echo __('rank'); ?></li>
                        <li class='elemS'><?php echo h($user['User']['rank']); ?></li>
                    </ul>
                    </br>
		</li>
		<!--<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($user['User']['rank']); ?>
			&nbsp;
		</dd>-->
	</ul>
</div>

<?php MenuBuilder::$menuOptions =   '<li>' . $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])) . '</li>
                                    <li>' . $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])) . '</li>
                                    <li>' . $this->Html->link(__('List Users'), array('action' => 'index')) . '</li>
                                    <li>' . $this->Html->link(__('New User'), array('action' => 'add')) . '</li>';
?>
