
<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-motos',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>

<div id="contenedor-motos">

<div class="page-header">

	<h2><?php echo __('Motos'); ?></h2>

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
				<th><?php echo $this->Paginator->sort('Marca'); ?></th>
				<th><?php echo $this->Paginator->sort('Modelo'); ?></th>
				<th><?php echo $this->Paginator->sort('Anio'); ?></th>
				<th><?php echo $this->Paginator->sort('Color'); ?></th>
				<th><?php echo $this->Paginator->sort('Combustible'); ?></th>
				<th><?php echo $this->Paginator->sort('Motor'); ?></th>
				<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($motos as $moto): ?>
		<tr>
			<td><?php echo h($moto['Moto']['id']); ?>&nbsp;</td>
			<td><?php echo h($moto['Moto']['Marca']); ?>&nbsp;</td>
			<td><?php echo h($moto['Moto']['Modelo']); ?>&nbsp;</td>
			<td><?php echo h($moto['Moto']['Anio']); ?>&nbsp;</td>
			<td><?php echo h($moto['Moto']['Color']); ?>&nbsp;</td>
			<td><?php echo h($moto['Moto']['Combustible']); ?>&nbsp;</td>
			<td><?php echo h($moto['Moto']['Motor']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Detalles'), array('action' => 'ver', $moto['Moto']['id']), array('class' => 'btn btn-sm btn-default')); ?>
				<?php echo $this->Html->link(__('Editar'), array('action' => 'actualizar', $moto['Moto']['id']), array('class' => 'btn btn-sm btn-default')); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'eliminar', $moto['Moto']['id']), array('class' => 'btn btn-sm btn-default'), __('Seguro que desea eliminar la Moto # %s?', $moto['Moto']['id'])); ?>
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