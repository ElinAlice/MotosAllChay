<h2>Editar Moto</h2>

<?php 

	echo $this -> Form -> create( 'Moto', array ( 'url' => array ( 'contronller' => 'motos', 'action' => 'actualizar' ) ) );
	echo $this -> Form -> input ( 'Marca' );
	echo $this -> Form -> input ( 'Modelo' );
	echo $this -> Form -> input ( 'Anio' );
	echo $this -> Form -> input ( 'Color' );
	echo $this -> Form -> input ( 'Combustible' );
	echo $this -> Form -> input ( 'Motor' );
	echo $this -> Form -> input ( 'id', array ( 'type' => 'hidden') );
	echo $this -> Form -> end ( 'Guardar Moto' );

	echo $this -> Html -> link ( 'Lista de Motos', array ( 'controller' => 'motos' , 'action' => 'index' ) );
?>