<div class = "direccion">
	<span>
		<?php
			// debug(AuthComponent::user('id')); // accessing the variable outside controller
			// 	debug($logged);
			if($logged){
				echo 'Hola ' . $this->Html->link($username, array('controller' => 'users', 'action' => 'index', 'admin' => false)) . '<br>';				
				if($_SESSION['Auth']['User']['rol'] == 'admin'){
					echo $this->Html->link('Cerrar Sesion', array('controller' => 'users', 'action' => 'logout', 'admin' => true));
				}else{
					echo $this->Html->link('Cerrar Sesion', array('controller' => 'users', 'action' => 'logout', 'admin' => false));
				}
			}else{
				echo $this->Html->link('Inicia Sesion', array('controller' => 'users', 'action' => 'login', 'admin' => false)). '<br>';
				echo 'o<br>';
				echo $this->Html->link('Registrate', array('controller' => 'users', 'action' => 'add', 'admin' => false));
			}
		?>
	</span>
</div>

<div class = "menu">
	<?php 
		if(!empty($_SESSION['Auth']['User']['rol']) && $_SESSION['Auth']['User']['rol'] == 'admin'){ ?>
			<ul>
				<li> <?php echo $this->Html->link('Pedidos', array('controller' => 'pedidos', 'action' => 'index', 'admin' => true)); ?></li>
				<li><?php echo $this->Html->link('Usuarios', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>
			</ul>
	
	<?php
		}else{ ?>
			<ul>
				<li> <?php echo $this->Html->link('Home', array('controller' => 'index', 'action' => 'index', 'admin' => false)); ?></li>
				<li><?php echo $this->Html->link('Como funciona', array()); ?></li>
				<li><?php echo $this->Html->link('Servicios', array()); ?></li>
				<li><?php echo $this->Html->link('Contacto', array('controller' => 'users', 'action' => 'contacto')); ?></li>
			</ul>
	<?php
		}
	?>
</div>