<div class="add_user">
	<div class = "form">
		<h1> Contáctanos! </h1>
		<?php
			echo  $this->Form->create('Contacto');
			echo  '<table>';
			echo  '<tr> <td> Nombre: ' .$this->Form->input('nombre', array('label' => false)) . ' </td></tr>';
			echo '<tr> <td> Email: '. $this->Form->input('email', array('label' => false)) .'</td></tr>';
			echo  '<tr> <td> Teléfono:' .$this->Form->input('telefono', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Dirección:' .$this->Form->input('direccion', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Mensaje: ' .$this->Form->input('mensaje', array('label' => false)) . ' </td></tr>';
			echo '</table>';
		?>

		<?php echo '<br>'. $this->Form->end(__('Enviar')); ?>
	</div>
</div>