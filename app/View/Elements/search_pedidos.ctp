<div class= "search">
	<?php
			echo $this->Form->create(null, array(
				'url' => array_merge(array('action' => 'admin_index'), $this->params['pass'])
			));
			echo "<table style = 'border: 0px'><tr>";
			echo "<td>";
			echo "Numero de Quiker";
			echo "</td>";
			echo "<td>";
			echo $this->Form->input('quiker', array('label' => false, 'empty' => 'Todos'));
			echo "</td></tr>";
			echo "<tr><td>";
			echo "Estatus:";
			echo "</td>";
			echo "<td>";
			echo $this->Form->select('status', array(
				'Recibido' => 'Recibido',
				'En camino' => 'En camino',
				'Entregado' => 'Entregado',
			), array('empty' => 'Todos'));
			echo "</td></tr>";
			echo "<tr><td>";
			echo $this->Form->submit(__('Buscar'), array('div' => 'search_button', 'class' => 'boton_busqueda'));
			echo $this->Form->end();
			echo "</td></tr>";
			echo "</table>";			
	?>
</div>