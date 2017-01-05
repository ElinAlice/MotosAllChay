<h2>Editar Reparación</h2>

<?php 

	echo $this -> Form -> create( 'Registro', array ( 'url' => array ( 'contronller' => 'registros', 'action' => 'actualizar' ) ) );
	echo $this -> Form -> input ( 'Fecha' );
	echo $this -> Form -> input ( 'Tipo_Reparacion' );
	echo $this -> Form -> input ( 'Costo' );
	echo $this -> Form -> input ( 'Detalle_Reparacion' );
	echo $this -> Form -> input ( 'moto_id' );
	echo $this -> Form -> input ( 'empleado_id' );
	echo $this -> Form -> input ( 'id', array ( 'type' => 'hidden') );
	echo $this -> Form -> end ( 'Guardar Reparacion' );

	echo $this -> Html -> link ( 'Lista de Reparaciones', array ( 'controller' => 'reparaciones' , 'action' => 'index' ) );
?>