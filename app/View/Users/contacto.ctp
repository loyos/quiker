<div class = "contacto">
	<h1>QUIKER WIRE ENVIOS </h1>

	<h3> Nuestros datos de contacto.. </h3>

<p>3900 NW 79th St #594 .MIAMI  FL 33166 </p>
<p>0212-3357585 </p>
<p>001-786-534-9686 </p>
<p>quikerwireenvios.com </p>
<p> quikerwireenvios@gmail.com </p>
<p> quikerwireenvios1@gmail.com </p>
<p>twiter: @quikerwireenvio </p>
<p>facebok: quikerwireenvios  </p>
<p>instagram:quikerwireenvios</p>
	<br>
	<h3> Tambien puedes contactarnos a traves del siguiente formulario, te responderemos a la brevedad posible. </h3>	
</div>

<div class="add_user">
	<div class = "form">
				
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