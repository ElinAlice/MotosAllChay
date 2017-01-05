<h2>Editar Empleado</h2>

<?php 

	echo $this -> Form -> create( 'Empleado', array ( 'url' => array ( 'contronller' => 'empleados', 'action' => 'actualizar' ) ) );
	echo $this -> Form -> input ( 'DNI_Empleado' );
	echo $this -> Form -> input ( 'Direccion' );
	echo $this -> Form -> input ( 'Nombre' );
	echo $this -> Form -> input ( 'Apellidos' );
	echo $this->Form->input('Tipo', array('class' => 'form-control', 'label' => 'Tipo', 'type' => 'select', 'options' => array('mecanico' => 'Mecanico', 'electricista' => 'Electricista'), array('class' => 'form-control')));
	echo $this -> Form -> input ( 'id', array ( 'type' => 'hidden') );
	echo $this -> Form -> end ( 'Guardar Empleado' );

	echo $this -> Html -> link ( 'Lista de Empleados', array ( 'controller' => 'empleados' , 'action' => 'index' ) );
?>