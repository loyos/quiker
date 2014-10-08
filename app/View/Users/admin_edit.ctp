<div class="add_user">
	<div class = "form">
		<h1> Editar </h1>
		<?php
			echo  $this->Form->create('User', array('action' => 'edit','novalidate' => true));
			echo  '<table>';
			// echo  '<tr> <td> Username: ' .$this->Form->input('username', array('label' => false)) . ' </td></tr>';
			// echo '<tr> <td> Password: '. $this->Form->input('password', array('label' => false)) .'</td></tr>';
			echo  '<tr> <td> Name:' .$this->Form->input('name', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Lastname:' .$this->Form->input('lastname', array('label' => false)) . ' </td></tr>';
			// echo  '<tr> <td> Email: ' .$this->Form->input('email', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Phone: ' .$this->Form->input('phone', array('label' => false)) . ' </td></tr>';
			echo  '<tr> <td> Address:' .$this->Form->input('address', array('label' => false)) . ' </td></tr></table>';
		?>

		<?php echo '<br>'. $this->Form->end(__('Editar')); ?>
	</div>
</div>