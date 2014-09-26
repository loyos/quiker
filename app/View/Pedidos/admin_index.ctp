<?php
	// debug($user_info);
 ?>
 
<div class = "pedidos">
	<h1> Todos los pedidos </h1> <h3 style = "float: right;"> <?php echo $this->Html->link('Agregar', array('controller' => 'pedidos', 'action' => 'admin_edit'));  ?> </h3>
	
	<div class = "info">
		
		<?php
			if(!empty($pedidos_info)){
			foreach($pedidos_info as $p){ ?>
			<table>
				<tr>
					<td>	Numero de pedido	</td>
					<td>	Estatus	</td>
					<td>	Numero de Quiker	</td>
					<td></td>
				</tr>
				<tr>
					<td><b> <?php echo $p['Pedido']['id']; ?> </b></td>				
					<td> <b> <?php echo $p['Pedido']['status']; ?> </b> </td>
					<td> <b> <?php echo $p['Pedido']['numero_quiker']; ?>  </b></td>
					<td><?php echo $this->Html->link('Editar informacion', array('controller' => 'pedidos', 'action' => 'admin_edit', $p['Pedido']['id'])); ?></td>
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