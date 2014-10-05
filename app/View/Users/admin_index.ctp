<?php	
	// debug($user_info);
 ?>
 
<div class = "dashboard">
	<h1> Todos los Usuarios </h1> <h3 style = "float: right;"> <?php echo $this->Html->link('Agregar Usuario', array('controller' => 'users', 'action' => 'admin_add'));  ?> </h3>
	<?php echo $this->element('search_usuarios'); ?>
	
	<div class = "info">
		<?php foreach($users as $u){ ?>
			<table style = "border-bottom: 1px solid white; padding-bottom: 15px;">
				<tr>
					<td>Numero de Quiker</td> <td>Username</td> <td> Nombre </td> <td>Apellido</td> <td>Ver detalles</td>
				</tr>
				<tr>
					<td><b> <?php echo $u['User']['id']; ?> </b></td>
					<td> <b> <?php echo $u['User']['username']; ?> </b> </td>
					<td> <b> <?php echo $u['User']['name']; ?> </b></td>
					<td> <b> <?php echo $u['User']['lastname']; ?> </b></td>
					<td><b> <?php echo $this->Html->link('Ver detalles', array('controller' => 'users', 'action' => 'view', 'admin' => true, $u['User']['id'])); ?> </b></td>
					<td><b> <?php echo $this->Html->link('Borrar Usuario', array('controller' => 'users', 'action' => 'delete', 'admin' => true, $u['User']['id'])); ?> </b></td>
				</tr>
			</table>
		<?php }?>
	</div>
	<div class = "chicle">
	</div>
</div>