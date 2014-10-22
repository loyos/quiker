<div class = "forgot_password">
	<div style = "padding-top: 50px; padding-bottom: 50px; position: relative; margin-left: auto; margin-right: auto; width: 350px; text-align: center;">
	<h3 style = "padding-bottom: 30px;">Por favor introduce el correo que utilizaste para registrarte. </h3>
	<?php
	echo $this->Form->create('User');
	echo $this->Form->input('email',array(
		'label' => 'Email:   '
	));
	echo '<br>';
	echo $this->Form->submit('Enviar', array('class' => 'button'));
	echo $this->Form->end;
	?>
	</div>
</div>
