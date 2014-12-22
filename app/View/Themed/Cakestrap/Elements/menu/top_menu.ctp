<?php App::uses('MenuBuilder', 'Lib/Menu') ?>

<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link(__('Mafia Organised Crime'), array('controller' => 'pages', 'action' => 'display', 'home'), array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><?php 
                            if (AuthComponent::user()) {
                                $message = AuthComponent::user('username') . ' (' . AuthComponent::user('rank') . ')';
                                echo $this->Html->Link($message, array('controller' => 'users', 'action' => 'view', AuthComponent::user('id')));
                            } else {
                                echo $this->Html->Link(__('Login'), array('controller' => 'users', 'action' => 'login'));
                            }
                        ?></li>
			<li><?php 
                            if (AuthComponent::user()) {
                                echo $this->Html->Link(__('Disconnect'), array('controller' => 'users', 'action' => 'logout'));
                            } else {
                                echo $this->Html->Link(__('Register'), array('controller' => 'users', 'action' => 'add'));
                            }
                        ?></li>
                        <li><?php echo $this->Html->Link(__('Informations'), array('controller' => 'pages', 'action' => 'informations')) ?></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Menu') ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
                                        <?php if (isset(MenuBuilder::$menuOptions)) {echo MenuBuilder::$menuOptions;} else { ?>
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>
					<li><a href="#">One more separated link</a></li>
                                        <?php } ?>
				</ul>
			</li>
                        <?php echo $this->I18n->flagSwitcher(array(
                            'class' => 'languages'
                        )); ?>
		</ul><!-- /.nav navbar-nav -->
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->