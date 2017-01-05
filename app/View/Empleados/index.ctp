

<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-empleados',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>

<div id="contenedor-empleados">

<div class="page-header">

	<h2><?php echo __('Empleados'); ?></h2>

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
				<th><?php echo $this->Paginator->sort('DNI_Empleado'); ?></th>
				<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
				<th><?php echo $this->Paginator->sort('Apellidos'); ?></th>
				<th><?php echo $this->Paginator->sort('Direccion'); ?></th>
				<th><?php echo $this->Paginator->sort('Tipo'); ?></th>
				<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($empleados as $empleado): ?>
		<tr>
			<td><?php echo h($empleado['Empleado']['id']); ?>&nbsp;</td>
			<td><?php echo h($empleado['Empleado']['DNI_Empleado']); ?>&nbsp;</td>
			<td><?php echo h($empleado['Empleado']['Nombre']); ?>&nbsp;</td>
			<td><?php echo h($empleado['Empleado']['Apellidos']); ?>&nbsp;</td>
			<td><?php echo h($empleado['Empleado']['Direccion']); ?>&nbsp;</td>
			<td><?php echo h($empleado['Empleado']['Tipo']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Detalles'), array('action' => 'ver', $empleado['Empleado']['id']), array('class' => 'btn btn-sm btn-default')); ?>
				<?php echo $this->Html->link(__('Editar'), array('action' => 'actualizar', $empleado['Empleado']['id']), array('class' => 'btn btn-sm btn-default')); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $empleado['Empleado']['id']), array('class' => 'btn btn-sm btn-default'), __('Seguro que desea eliminar a Empleado # %s?', $empleado['Empleado']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>

	</div>

		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-meseros -->