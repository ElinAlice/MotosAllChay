<h2>Agregar Moto</h2>

<?php 

	echo $this -> Form -> create( 'Moto' );
	echo $this -> Form -> input ( 'Marca' );
	echo $this -> Form -> input ( 'Modelo' );
	echo $this -> Form -> input ( 'Anio' );
	echo $this -> Form -> input ( 'Color' );
	echo $this -> Form -> input ( 'Combustible' );
	echo $this -> Form -> input ( 'Motor' );
	echo $this -> Form -> end ( 'Guardar Trabajador' );

?>