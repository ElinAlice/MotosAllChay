<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Empleado', array('role' => 'form')); ?>
				<fieldset>
					<div class="page-header">

					<h2><?php echo __('Editar Trabajador'); ?></h2>
					</div>
				<?php
					echo $this->Form->input('DNI_Empleado', array('class' => 'form-control', 'label' => 'DNI'));
					echo $this->Form->input('Direccion', array('class' => 'form-control', 'label' => 'Direccion'));
					echo $this->Form->input('Nombre', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('Apellidos', array('class' => 'form-control', 'label' => 'Apellidos'));
					echo $this->Form->input('Tipo', array('class' => 'form-control', 'label' => 'Tipo', 'type' => 'select', 'options' => array('mecanico' => 'Mecanico', 'electricista' => 'Electricista'), array('class' => 'form-control')));
					echo $this -> Form -> input ( 'id', array ( 'type' => 'hidden') );
				?>
				</fieldset>

				<p>
				<?php echo $this->Form->end(array('label' => 'Guardar Trabajador', 'class' =>'btn btn-success')); ?>
				</p>
			
		</div>
	</div>
</div>