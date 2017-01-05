
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Moto', array('role' => 'form')); ?>
				<fieldset>
					<div class="page-header">

					<h2><?php echo __('Editar Moto'); ?></h2>
					</div>
				<?php
					echo $this->Form->input('Marca', array('class' => 'form-control', 'label' => 'Marca'));
					echo $this->Form->input('Modelo', array('class' => 'form-control', 'label' => 'Modelo'));
					echo $this->Form->input('Anio', array('class' => 'form-control', 'label' => 'Año'));
					echo $this->Form->input('Color', array('class' => 'form-control', 'label' => 'Color'));
					echo $this->Form->input('Combustible', array('class' => 'form-control', 'label' => 'Combustible'));
					echo $this->Form->input('Motor', array('class' => 'form-control', 'label' => 'Motor'));
					echo $this -> Form -> input ( 'id', array ( 'type' => 'hidden') );
				?>
				</fieldset>

				<p>
				<?php echo $this->Form->end(array('label' => 'Editar Moto', 'class' =>'btn btn-success')); ?>
				</p>
			
		</div>
	</div>
</div>