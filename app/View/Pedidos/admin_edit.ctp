<div class="add_user">
	<div class = "form">
		<h1> Editar </h1><h3 style = "float: right;"> <?php echo $this->Html->link('<< Regresar', array('controller' => 'pedidos', 'action' => 'admin_index'));  ?> </h3>
		<?php
			echo  $this->Form->create('Pedido');
			echo  '<table>';
			echo '<tr> <td> Status: ' . $this->Form->input('status', array(
				'options' => array('Recibido' => 'Recibido', 'En camino' => 'En camino', 'Entregado' => 'Entregado'),
				'empty' => 'Elige Un Status',
				'label' => false
			)) . ' </td></tr>';
			// echo  '<tr> <td> Status: ' .$this->Form->input('status', array('label' => false)) . ' </td></tr>';
			echo '<tr> <td> Fecha de entrega: '. $this->Form->input('fecha_entrega', array('label' => false)) .'</td></tr>';
			echo  '<tr> <td> Fecha de recibo' .$this->Form->input('fecha_recibido', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Peso:' .$this->Form->input('peso', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Volumen: ' .$this->Form->input('volumen', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Numero de Quiker: ' .$this->Form->input('numero_quiker', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Precio:' .$this->Form->input('precio', array('label' => false)) . ' </td></tr></table>';
		?>

		<?php echo '<br>'. $this->Form->end(__('Editar')); ?>
	</div>
</div>