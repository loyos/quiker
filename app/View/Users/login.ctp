<div class="login">
	<h1> Login </h1>
<?php
	echo  $this->Form->create('User');
	echo  '<table>';
	echo  '<tr> <td> Username: ' .$this->Form->input('username', array('label' => false)) . ' </td></tr>';
	echo '<tr> <td> Password: '. $this->Form->input('password', array('label' => false)) .'</td></tr></table>';
?>

<?php echo '<br>'. $this->Form->end(__('Entrar')); ?>
</div>