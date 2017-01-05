
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Registro', array('role' => 'form')); ?>
				<fieldset>
					<div class="page-header">

					<h2><?php echo __('Nueva Reparacion'); ?></h2>
					</div>
				<?php
					echo $this->Form->input('Fecha', array('class' => 'form-control', 'label' => 'Fecha'));
					echo $this->Form->input('Tipo_Reparacion', array('class' => 'form-control', 'label' => 'Tipo Reparacion'));
					echo $this->Form->input('Costo', array('class' => 'form-control', 'label' => 'Costo'));
					echo $this->Form->input('Detalle_Reparacion', array('class' => 'form-control', 'label' => 'Detalle Reparacion'));
					echo $this->Form->input('moto_id', array('class' => 'form-control', 'label' => 'Moto'));
					echo $this->Form->input('empleado_id', array('class' => 'form-control', 'label' => 'Trabajador'));
				?>
				</fieldset>

				<p>
				<?php echo $this->Form->end(array('label' => 'Guardar Reparacion', 'class' =>'btn btn-success')); ?>
				</p>
			
		</div>
	</div>
</div>