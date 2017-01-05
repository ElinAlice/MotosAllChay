<h2>Agregar Reparacion</h2>

<?php 

	echo $this -> Form -> create( 'Registro' );
	echo $this -> Form -> input ( 'Fecha' );
	echo $this -> Form -> input ( 'Tipo_Reparacion' );
	echo $this -> Form -> input ( 'Costo' );
	echo $this -> Form -> input ( 'Detalle_Reparacion' );
	echo $this -> Form -> input ( 'moto_id' );
	echo $this -> Form -> input ( 'empleado_id' );
	echo $this -> Form -> end ( 'Guardar Reparacion' );

?>