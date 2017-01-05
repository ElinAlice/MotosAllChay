<?php 


class EmpleadosController extends AppController 
{
	public $helpers = array( 'Html', 'Form', 'Flash', 'Js' );
	public $components = array( 'Flash', 'RequestHandler' );

	public $paginate = array (
		'limit' => 5,
		'order' => array (
			'Empleado.id' => 'asc'
		)
	);

	public function index ()
	{
		$this -> Empleado -> recursive = 0;
		$this -> paginate['Empleado']['limit'] = 5;
		$this -> paginate['Empleado']['order'] = array (
			'Empleado.id' => 'asc'
		); 
		//$this -> paginate['Empleado']['conditions'] = array ( 'Mesero.id' => '')
		
		$this -> set ( 'empleados', $this -> paginate() );
	}

	public function ver ( $id = null ) 
	{
		if ( ! $id )
		{
			throw new NotFoundException ( 'Datos Invalidos.' );
		}

		$empleado = $this -> Empleado -> findById ( $id );

		if ( ! $empleado )
		{
			throw new NotFoundException ( 'El Empleado no existe' );
		}

		$this -> set ( 'empleado', $empleado );
	}

	public function nuevo () 
	{
		if ( $this -> request -> is ( 'post' ) )
		{
			$this -> Empleado -> create();

			if ( $this -> Empleado ->  save ( $this -> request -> data ) )
			{
				$this -> Flash -> success ( 'Empleado fue creado.' );				
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this -> Flash -> error ( 'No se pudo crear el empleado.' );
		}
	}

	public function actualizar ( $id = null )
	{
		if ( !$id )
		{
			throw new NotFoundException( 'Datos Invalidos.');
		}

		$empleado = $this -> Empleado ->  findById( $id );

		if ( ! $empleado )
		{
			throw new NotFoundException('El Empleado no fue encontrado');
		}

		if ( $this -> request -> is ( array( 'post' , 'put' ) ))
		{
			$this -> Empleado ->  id = $id ;

			if ( $this -> Empleado ->  save( $this -> request -> data ) )
			{
				$this -> Flash -> success ( 'El Empleado fue modificado exitosamente.');
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this -> Flash -> error ( 'El Empleado no pudo ser modificado');
		}

		if ( ! $this -> request -> data )
		{
			$this -> request -> data = $empleado;
		}
	}

	public function eliminar ( $id = null )
	{
		if ( ! $this -> request -> is ( 'post' ) )
		{
			throw new MethodNotAllowedException( 'INCORRECTO' );
		}

		if ( $this -> Empleado -> delete ( $id ) )
		{
			$this -> Flash -> success ( 'El Empleado con Id ' . $id . ' Fue Eliminado' );
			$this -> redirect ( array ( 'action' => 'index' ) );
		}
	}

}

// FIN TRAJABADOR CONTROLLER