
<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-registros',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>

<div id="contenedor-registros">

<div class="page-header">

	<h2><?php echo __('Reparaciones'); ?></h2>

</div>

	<div class="col-md-12">

	<div class="progress oculto" id="procesando">
	  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	    <span class="sr-only">100% Complete</span>
	  </div>
	</div>

	
		<table class="table table-striped">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('Fecha'); ?></th>
				<th><?php echo $this->Paginator->sort('Tipo_Reparacion'); ?></th>
				<th><?php echo $this->Paginator->sort('Costo'); ?></th>
				<th><?php echo $this->Paginator->sort('Detalle_Reparacion'); ?></th>
				<th><?php echo $this->Paginator->sort('moto_id'); ?></th>
				<th><?php echo $this->Paginator->sort('empleado_id'); ?></th>
				<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($registros as $registro): ?>
		<tr>
			<td><?php echo h($registro['Registro']['id']); ?>&nbsp;</td>
			<td><?php echo h($registro['Registro']['Fecha']); ?>&nbsp;</td>
			<td><?php echo h($registro['Registro']['Tipo_Reparacion']); ?>&nbsp;</td>
			<td><?php echo h($registro['Registro']['Costo']); ?>&nbsp;</td>
			<td><?php echo h($registro['Registro']['Detalle_Reparacion']); ?>&nbsp;</td>
			<td><?= $this -> Html -> link ( $registro['Moto']['Marca'] . ' ' . $registro['Moto']['Modelo'], array ( 'controller' => 'motos', 'action' => 'ver', $registro['Moto']['id'] ) ) ?></td>
	 		<td><?= $this -> Html -> link ( $registro['Empleado']['Nombre'] . ' ' . $registro['Empleado']['Apellidos'], array ( 'controller' => 'empleados', 'action' => 'ver', $registro['Empleado']['id'] ) ) ?></td>
			<td class="actions">
			
				<?php echo $this->Html->link(__('Editar'), array('action' => 'actualizar', $registro['Registro']['id']), array('class' => 'btn btn-info')); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $registro['Registro']['id']), array('class' => 'btn btn-danger'), __('Seguro que desea eliminar la Moto # %s?', $registro['Registro']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>

	</div>

		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}, Mostrando {:current} registros de {:count}.')
		));
		?>	</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-meseros -->