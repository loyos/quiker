<?php	
	// debug($user_info);
 ?>
 
<div class = "dashboard">
	<h1> Mi Perfil </h1>  <h3 style = "float: right;"> <?php echo $this->Html->link('<< Regresar', array('controller' => 'users', 'action' => 'index', 'admin' => true));  ?> </h3>
	
	<div class = "info">
		<table>
			<tr>
				<td> Mi Numero Quiker: </td>
				<td><b> <?php echo $user['User']['id']; ?> </b></td>
			</tr>
			<tr>
				<td> Username: </td>
				<td> <b> <?php echo $user['User']['username']; ?> </b> </td>
			</tr>
			<tr>
				<td> Nombre: </td>
				<td> <b> <?php echo $user['User']['name']; ?> </b></td>
			</tr>
			<tr>
				<td> Apellido: </td>
				<td> <b> <?php echo $user['User']['lastname']; ?> </b></td>
			</tr>
			<tr>
				<td> Telefono: </td>
				<td><b> <?php echo $user['User']['phone']; ?> </b></td>
			</tr>
			<tr>
				<td> Direccion: </td>
				<td><b> <?php echo $user['User']['address']; ?></b> </td>
			</tr>
			<tr>
				<td> Correo electronico: </td>
				<td> <b> <?php echo $user['User']['email']; ?>  </b></td>
			</tr>
		</table>
	</div>
</div>