<h2>Editar Empleado</h2>

<?php 

	echo $this -> Form -> create( 'Empleado', array ( 'url' => array ( 'contronller' => 'empleados', 'action' => 'actualizar' ) ) );
	echo $this -> Form -> input ( 'DNI_Empleado' );
	echo $this -> Form -> input ( 'Contrasena' );
	echo $this -> Form -> input ( 'Nombre' );
	echo $this -> Form -> input ( 'Apellidos' );
	echo $this -> Form -> input ( 'Tipo' );
	echo $this -> Form -> input ( 'id', array ( 'type' => 'hidden') );
	echo $this -> Form -> end ( 'Guardar Empleado' );

	echo $this -> Html -> link ( 'Lista de Empleados', array ( 'controller' => 'empleados' , 'action' => 'index' ) );
?>