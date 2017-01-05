<?php 


class MotosController extends AppController 
{
	public $helpers = array( 'Html', 'Form', 'Flash' );
	public $components = array( 'Flash', 'RequestHandler' );

	public $paginate = array (
		'limit' => 5,
		'order' => array (
			'Moto.id' => 'asc'
		)
	);

	public function index ()
	{
		$this -> Moto -> recursive = 0;
		$this -> paginate['Moto']['limit'] = 5;
		$this -> paginate['Moto']['order'] = array (
			'Moto.id' => 'asc'
		); 
		//$this -> paginate['Moto']['conditions'] = array ( 'Mesero.id' => '')
		
		$this -> set ( 'motos', $this -> paginate() );
	}

	public function ver ( $id = null ) 
	{
		if ( ! $id )
		{
			throw new NotFoundException ( 'Datos Invalidos.' );
		}

		$moto = $this -> Moto -> findById ( $id );

		if ( ! $moto )
		{
			throw new NotFoundException ( 'La Moto no existe' );
		}

		$this -> set ( 'moto', $moto );
	}

	public function nuevo () 
	{
		if ( $this -> request -> is ( 'post' ) )
		{
			$this -> Moto -> create();

			if ( $this -> Moto ->  save ( $this -> request -> data ) )
			{
				$this -> Flash -> success ( 'Moto fue creado.' );				
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this -> Flash -> error ( 'No se pudo crear La Moto.' );
		}
	}

	public function actualizar ( $id = null )
	{
		if ( !$id )
		{
			throw new NotFoundException( 'Datos Invalidos.');
		}

		$moto = $this -> Moto ->  findById( $id );

		if ( ! $moto )
		{
			throw new NotFoundException('La Moto no fue encontrado');
		}

		if ( $this -> request -> is ( array( 'post' , 'put' ) ))
		{
			$this -> Moto ->  id = $id ;

			if ( $this -> Moto ->  save( $this -> request -> data ) )
			{
				$this -> Flash -> success ( 'La Moto fue modificado exitosamente.');
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this -> Flash -> error ( 'La Moto no pudo ser modificado');
		}

		if ( ! $this -> request -> data )
		{
			$this -> request -> data = $moto;
		}
	}

	public function eliminar ( $id = null )
	{
		if ( ! $this -> request -> is ( 'post' ) )
		{
			throw new MethodNotAllowedException( 'INCORRECTO' );
		}

		if ( $this -> Moto -> delete ( $id ) )
		{
			$this -> Flash -> success ( 'La Moto con Id ' . $id . ' Fue Eliminado' );
			$this -> redirect ( array ( 'action' => 'index' ) );
		}
	}

}

// FIN TRAJABADOR CONTROLLER