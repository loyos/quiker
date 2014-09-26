<?php
	// debug($user_info);
 ?>
 
<div class = "pedidos">
	<h1> Mis pedidos </h1> <h3 style = "float: right;"> <?php echo $this->Html->link(' << Regresar ', array('controller' => 'users', 'action' => 'index'));  ?> </h3>
	
	<div class = "info">
		
		<?php
			if(!empty($pedidos_info)){
			foreach($pedidos_info as $p){ ?>
			<table>
				<tr>
					<td style = "width: 350px;"> Pedido Numero: </td>
					<td><b> <?php echo $p['Pedido']['id']; ?> </b></td>
				</tr>
				<tr>
					<td> Status: </td>
					<td> <b> <?php echo $p['Pedido']['status']; ?> </b> </td>
				</tr>
				<tr>
					<td> Fecha estimadada de entrega: </td>
					<td> <b> <?php echo $p['Pedido']['fecha_entrega']; ?> </b></td>
				</tr>
				<tr>
					<td> Fecha cuando fue recibido el paquete: </td>
					<td> <b> <?php echo $p['Pedido']['fecha_recibido']; ?> </b></td>
				</tr>
				<tr>
					<td> Peso: </td>
					<td><b> <?php echo $p['Pedido']['peso']; ?> </b></td>
				</tr>
				<tr>
					<td> Volumen: </td>
					<td><b> <?php echo $p['Pedido']['volumen']; ?></b> </td>
				</tr>
				<tr>
					<td> Precio a pagar: </td>
					<td> <b> <?php echo $p['Pedido']['precio']; ?>  </b></td>
				</tr>
			</table>
		<?php
			}
			}else{
				echo 'No tienes pedidos registrados por el momento.';
			}
		?>
	</div>
	<div class = "chicle">
	</div>
</div>