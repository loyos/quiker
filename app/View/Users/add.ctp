<div class="add_user">
	<div class = "form">
		<h1> Registro </h1>
		<?php
			echo  $this->Form->create('User');
			echo  '<table>';
			echo  '<tr> <td> Nombre de usuario: ' .$this->Form->input('username', array('label' => false)) . ' </td></tr>';
			echo '<tr> <td> Contraseña: '. $this->Form->input('password', array('label' => false)) .'</td></tr>';
			echo  '<tr> <td> Nombre:' .$this->Form->input('name', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Apellido:' .$this->Form->input('lastname', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Correo electrónico: ' .$this->Form->input('email', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Teléfono: ' .$this->Form->input('phone', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Dirección:' .$this->Form->input('address', array('label' => false, 'type' => 'textarea')) . ' </td></tr></table>';
		?>

		<?php echo '<br>'. $this->Form->end(__('Registrarse')); ?>
	</div>
</div>