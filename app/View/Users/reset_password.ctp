<div class = "forgot_password">
	<div  style = "padding-top: 50px; padding-bottom: 50px; position: relative; margin-left: auto; margin-right: auto; width: 350px; text-align: center;">
		<?php
		echo $this->Form->create('User', array( "enctype" => "multipart/form-data"));
		
		echo '<table class="table_reset_password">';
		echo '<tr><td>';
		echo ' New Password</td><td>';
		echo $this->Form->input('password',array(
			'label' => false,
		));
		echo '</td></tr><br>';
		echo '<tr><td>';
		echo 'Password Confirmation</td><td>';
		echo $this->Form->input('password_confirmation',array(
			'label' => false,
			'type' => 'password'
		));
		echo '</td></tr><br>';
		echo $this->Form->input('id',array(
			'type' => 'hidden',
			'value' => $id
		));
		echo '<br><tr><td colspan= 2 style= "text-align: center;">';
		echo $this->Form->submit('Entrar', array('class' => 'button'));
		echo $this->Form->end;
		echo "</td></tr></table><br>";
		//echo $this->Html->link('¿Olvidaste tu contraseña?',array('controller' => 'users', 'action' => 'reset_password'));
		?>
	</div>
</div>