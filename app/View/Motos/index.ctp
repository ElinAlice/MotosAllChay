<h2>Motos</h2>
<?php echo $this->Html->link('Agregar Moto', array('controller' => 'Motos', 'action' => 'nuevo')); ?>
<table>
	<tr>
		<td>ID</td>
		<td>Marca</td>
		<td>Modelo</td>
		<td>Año</td>
		<td>Color</td>
		<td>Combustible</td>
		<td>Motor</td>
	</tr>

	<?php foreach ( $motos as $moto ) : ?>
		<tr>
			<td> <?= $moto['Moto']['id'] ?> </td>
			<td> <?= $moto['Moto']['Marca'] ?> </td>
			<td> <?= $moto['Moto']['Modelo'] ?> </td>
			<td> <?= $moto['Moto']['Anio'] ?> </td>
			<td> <?= $moto['Moto']['Color'] ?> </td>
			<td> <?= $moto['Moto']['Combustible'] ?> </td>
			<td> <?= $moto['Moto']['Motor'] ?> </td>
			<td> <?= $this -> Html -> link ( 'Mostrar' , array( 'controller' => 'Motos', 'action' => 'ver',  $moto['Moto']['id'] ) ) ?> 
				<?= $this -> Html -> link ( 'Editar' , array( 'controller' => 'Motos', 'action' => 'actualizar',  $moto['Moto']['id'] ) ) ?>
				<?= $this -> Form -> postLink ( 'Eliminar',
					array ( 'controller' => 'Motos', 'action' => 'eliminar',  $moto['Moto']['id'] ),
					array ( 'confirm' => 'Estas Seguro ?' )
				) ?>
			</td>
		</tr>
	<?php endforeach; ?>

</table>