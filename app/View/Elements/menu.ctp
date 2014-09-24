<div class = "direccion">
	<span>
		<?php
			// debug(AuthComponent::user('id')); // accessing the variable outside controller
			// debug($logged);
			if($logged){
				echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
			}else{
				echo $this->Html->link('Log in - 	', array('controller' => 'users', 'action' => 'login'));
				echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'add'));
			}
		?>
	</span>
</div>

<div class = "menu">
	<ul>
		<li> <?php echo $this->Html->link('Home', array()); ?></li>
		<li><?php echo $this->Html->link('About', array()); ?></li>
		<li><?php echo $this->Html->link('Services', array()); ?></li>
		<li><?php echo $this->Html->link('Blog', array()); ?></li>
		<li><?php echo $this->Html->link('Contacts', array()); ?></li>
	</ul>
</div>