<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="page-header">

			<h2><?php echo __('Detalles Trabajador'); ?></h2>
			</div>
			<ul class="list-group">
				<li class="list-group-item"><strong>ID: </strong><?php echo h($empleado['Empleado']['id']); ?></li>
				<li class="list-group-item"><strong>DNI: </strong><?php echo h($empleado['Empleado']['DNI_Empleado']); ?></li>
				<li class="list-group-item"><strong>Direccion: </strong><?php echo h($empleado['Empleado']['Direccion']); ?></li>
				<li class="list-group-item"><strong>Nombre: </strong><?php echo h($empleado['Empleado']['Nombre']); ?></li>
				<li class="list-group-item"><strong>Apellidos: </strong><?php echo h($empleado['Empleado']['Apellidos']); ?></li>
				<li class="list-group-item"><strong>Tipo: </strong><?php echo h($empleado['Empleado']['Tipo']); ?></li>
			</ul>
		</div>
	</div>
</div>




<div id="contenedor-registros">

<div class="page-header">

	<h2><?php echo __('Reparaciones'); ?></h2>

</div>

	<div class="col-md-12">

		<?php if(isset($empleado['Registro']) && count($empleado['Registro']) > 0): ?>
		<table class="table table-striped">
		<thead>
		<tr>
				<th><strong>id</strong></th>
				<th><strong>Fecha</strong></th>
				<th><strong>Tipo Reparacion</strong></th>
				<th><strong>Costo</strong></th>
				<th><strong>Detalle Reparacion</strong></th>
				
		</tr>
		</thead>
		<tbody>

		<?php foreach ($empleado['Registro'] as $registro): ?>
			<tr>
				<td><?php echo h($registro['id']); ?>&nbsp;</td>
				<td><?php echo h($registro['Fecha']); ?>&nbsp;</td>
				<td><?php echo h($registro['Tipo_Reparacion']); ?>&nbsp;</td>
				<td><?php echo h($registro['Costo']); ?>&nbsp;</td>
				<td><?php echo h($registro['Detalle_Reparacion']); ?>&nbsp;</td>
				
			</tr>
		<?php endforeach; ?>
		
		</tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-warning" role="alert">
		    	El Trabajador <strong><?= $empleado['Empleado']['nombre_completo'] ?></strong> no tiene registro de reparaciones.
		    </div>
		<?php endif; ?>
	</div>

</div> <!-- contenedor-meseros -->