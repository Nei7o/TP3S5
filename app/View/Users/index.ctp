<?php App::uses('MenuBuilder', 'Lib/Menu') ?>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<thead>
	<ul class="menuPres">
			<li><?php echo $this->Paginator->sort('username'); ?></li>
			<li><?php echo $this->Paginator->sort('rank'); ?></li>
			<li class="options"><?php echo __('Actions'); ?></li>
	</ul>
        </br>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<ul class="pres">
		<li><?php echo h($user['User']['username']); ?>&nbsp;</li>
		<li><?php echo h($user['User']['rank']); ?>&nbsp;</li>
		<li>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                        <?php
                            if (AuthComponent::user('id') == $user['User']['id'] || AuthComponent::user('rank') == 'admin') {
                                echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']));
                            }
                        ?>
			<?php
                            if (AuthComponent::user('id') == $user['User']['id'] || AuthComponent::user('rank') == 'admin') {
                                echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id']));
                            }
                        ?>
		</li>
	</ul>
        </br>
<?php endforeach; ?>
	</tbody>
</div>
 <?php MenuBuilder::$menuOptions = '<li>' . $this->Html->link(__('New User'), array('action' => 'add')) . '</li>';
