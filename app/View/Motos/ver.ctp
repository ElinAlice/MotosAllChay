

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="page-header">

			<h2><?php echo __('Detalles Moto'); ?></h2>
			</div>
			<ul class="list-group">
				<li class="list-group-item"><strong>ID: </strong><?php echo h($moto['Moto']['id']); ?></li>
				<li class="list-group-item"><strong>Marca: </strong><?php echo h($moto['Moto']['Marca']); ?></li>
				<li class="list-group-item"><strong>Modelo: </strong><?php echo h($moto['Moto']['Modelo']); ?></li>
				<li class="list-group-item"><strong>Año: </strong><?php echo h($moto['Moto']['Anio']); ?></li>
				<li class="list-group-item"><strong>Color: </strong><?php echo h($moto['Moto']['Color']); ?></li>
				<li class="list-group-item"><strong>Combustible: </strong><?php echo h($moto['Moto']['Combustible']); ?></li>
				<li class="list-group-item"><strong>Motor: </strong><?php echo h($moto['Moto']['Motor']); ?></li>
			</ul>
		</div>
	</div>
</div>




<div id="contenedor-registros">

<div class="page-header">

	<h2><?php echo __('Reparaciones'); ?></h2>

</div>

	<div class="col-md-12">

		<?php if(isset($moto['Registro']) && count($moto['Registro']) > 0): ?>
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
		<?php foreach ($moto['Registro'] as $registro): ?>
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
		    	La moto <strong><?= $moto['Moto']['Marca'] ?></strong> no tiene registro de reparaciones.
		    </div>
		<?php endif; ?>
	</div>

</div> <!-- contenedor-meseros -->