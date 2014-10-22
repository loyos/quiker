<div class= "search">
	<?php
			echo $this->Form->create(null, array('novalidate' => true,
				'url' => array_merge(array('action' => 'admin_index'), $this->params['pass'])
			));
			echo "<table><tr>";
			echo "<td>";
			echo "Username:";
			echo "</td>";
			echo "<td>";
			echo $this->Form->input('username', array('label' => false));
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Nombre: ";
			echo "</td><td>";
			echo $this->Form->input('name', array('label' => false));
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Quiker number";
			echo "</td><td>";
			echo $this->Form->input('quiker', array('label' => false));
			echo "</td></tr>";
			echo "</table>";			
			echo $this->Form->submit(__('Buscar'), array('div' => 'search_button', 'class' => 'boton_busqueda'));
			echo $this->Form->end();
	?>
</div>