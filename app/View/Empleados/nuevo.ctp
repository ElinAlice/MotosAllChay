<h2>Agregar Trabajador</h2>

<?php 

	echo $this -> Form -> create( 'Empleado' );
	echo $this -> Form -> input ( 'DNI_Empleado' );
	echo $this -> Form -> input ( 'Direccion' );
	echo $this -> Form -> input ( 'Nombre' );
	echo $this -> Form -> input ( 'Apellidos' );
	echo $this -> Form -> input ( 'Tipo' );
	echo $this -> Form -> end ( 'Guardar Trabajador' );

?>