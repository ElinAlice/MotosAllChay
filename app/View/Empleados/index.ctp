<h2>Trabajadores</h2>
<?php echo $this->Html->link('Agregar Empleado', array('controller' => 'Empleados', 'action' => 'nuevo')); ?>
<table>
	<tr>
		<td>ID</td>
		<td>DNI</td>
		<td>Contraseña</td>
		<td>Nombre</td>
		<td>Apellidos</td>
		<td>Tipo</td>
		<td>Operaciones</td>
	</tr>

	<?php foreach ( $empleados as $empleado ) : ?>
		<tr>
			<td> <?= $empleado['Empleado']['id'] ?> </td>
			<td> <?= $empleado['Empleado']['DNI_Empleado'] ?> </td>
			<td> <?= $empleado['Empleado']['Contrasena'] ?> </td>
			<td> <?= $empleado['Empleado']['Nombre'] ?> </td>
			<td> <?= $empleado['Empleado']['Apellidos'] ?> </td>
			<td> <?= $empleado['Empleado']['Tipo'] ?> </td>
			<td> <?= $this -> Html -> link ( 'Mostrar' , array( 'controller' => 'Empleados', 'action' => 'ver',  $empleado['Empleado']['id'] ) ) ?> 
				<?= $this -> Html -> link ( 'Editar' , array( 'controller' => 'Empleados', 'action' => 'actualizar',  $empleado['Empleado']['id'] ) ) ?>
				<?= $this -> Form -> postLink ( 'Eliminar',
					array ( 'controller' => 'Empleados', 'action' => 'eliminar',  $empleado['Empleado']['id'] ),
					array ( 'confirm' => 'Estas Seguro ?' )
				) ?>
			</td>
		</tr>
	<?php endforeach; ?>

</table>