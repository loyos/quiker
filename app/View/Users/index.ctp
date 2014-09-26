<?php	
	// debug($user_info);
 ?>
 
<div class = "dashboard">
	<h1> Mi Perfil </h1>  <h3 style = "float: right;"> <?php echo $this->Html->link('Ir a mis pedidos >>', array('controller' => 'pedidos', 'action' => 'index'));  ?> </h3>
	
	<div class = "info">
		<table>
			<tr>
				<td> Mi Numero Quiker: </td>
				<td><b> <?php echo $user_info['User']['id']; ?> </b></td>
			</tr>
			<tr>
				<td> Username: </td>
				<td> <b> <?php echo $user_info['User']['username']; ?> </b> </td>
			</tr>
			<tr>
				<td> Nombre: </td>
				<td> <b> <?php echo $user_info['User']['name']; ?> </b></td>
			</tr>
			<tr>
				<td> Apellido: </td>
				<td> <b> <?php echo $user_info['User']['lastname']; ?> </b></td>
			</tr>
			<tr>
				<td> Telefono: </td>
				<td><b> <?php echo $user_info['User']['phone']; ?> </b></td>
			</tr>
			<tr>
				<td> Direccion: </td>
				<td><b> <?php echo $user_info['User']['address']; ?></b> </td>
			</tr>
			<tr>
				<td> Correo electronico: </td>
				<td> <b> <?php echo $user_info['User']['email']; ?>  </b></td>
			</tr>
			<tr>
				<td> <b> <?php echo $this->Html->link('Editar informacion', array('controller' => 'users', 'action' => 'edit', $user_info['User']['id'])); ?>  </b></td>
			</tr>
		</table>
	</div>
</div>