<div class = "direccion">
	<span>
		<?php
			// debug(AuthComponent::user('id')); // accessing the variable outside controller
			// 	debug($logged);
			if($logged){
				echo 'Hola ' . $this->Html->link($username, array('controller' => 'users', 'action' => 'index')) . '<br>';
				echo $this->Html->link('Cerrar Sesion', array('controller' => 'users', 'action' => 'logout'));
			}else{
				echo $this->Html->link('Inicia Sesion', array('controller' => 'users', 'action' => 'login')). '<br>';
				echo 'o<br>';
				echo $this->Html->link('Registrate', array('controller' => 'users', 'action' => 'add'));
			}
		?>
	</span>
</div>

<div class = "menu">
	<ul>
		<li> <?php echo $this->Html->link('Home', array('controller' => 'index', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('About', array()); ?></li>
		<li><?php echo $this->Html->link('Services', array()); ?></li>
		<li><?php echo $this->Html->link('Blog', array()); ?></li>
		<li><?php echo $this->Html->link('Contacts', array()); ?></li>
	</ul>
</div>