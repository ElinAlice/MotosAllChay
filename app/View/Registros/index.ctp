 <h1>Lista de Registro</h1>
 <?php echo $this->Html->link('Nueva Reparación', array('controller' => 'Registros', 'action' => 'nuevo')); ?>
 <table>
 	<tr>
 		<td>ID</td>
 		<td>Fecha</td>
 		<td>Tipo Reparacion</td>
 		<td>Costo</td>
 		<td>Detalle</td>
 		<td>Moto</td>
 		<td>Empleado</td>
 		<td>Operaciones</td>
 	</tr>

	 <?php foreach( $registros as $registro ): ?>
	 	<tr>
	 		<td><?= $registro['Registro']['id'] ?></td>
	 		<td><?= $this -> Time -> format ( 'd-m-Y', $registro['Registro']['Fecha']  ) ?></td>
	 		<td><?= $registro['Registro']['Tipo_Reparacion'] ?></td>
	 		<td><?= $registro['Registro']['Costo'] ?></td>
	 		<td><?= $registro['Registro']['Detalle_Reparacion'] ?></td> 
	 		<td><?= $this -> Html -> link ( $registro['Moto']['Marca'] . ' ' . $registro['Moto']['Modelo'], array ( 'controller' => 'motos', 'action' => 'ver', $registro['Moto']['id'] ) ) ?></td>
	 		<td><?= $this -> Html -> link ( $registro['Empleado']['Nombre'] . ' ' . $registro['Empleado']['Apellidos'], array ( 'controller' => 'empleados', 'action' => 'ver', $registro['Empleado']['id'] ) ) ?></td>
	 		<td>
	 			<?= $this -> Html -> link ( 'Editar' , array( 'controller' => 'Registros', 'action' => 'actualizar',  $registro['Registro']['id'] ) ) ?>
				<?= $this -> Form -> postLink ( 'Eliminar',
					array ( 'controller' => 'Registros', 'action' => 'eliminar',  $registro['Registro']['id'] ),
					array ( 'confirm' => 'Estas Seguro ?' )
				) ?>
	 		</td>
	 	</tr>
	 <?php endforeach; ?>

 </table>