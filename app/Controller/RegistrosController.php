<?php 


class RegistrosController extends AppController 
{
	public $helpers = array( 'Html', 'Form', 'Flash', 'Time' );
	public $components = array( 'Flash', 'RequestHandler' );

	public $paginate = array (
		'limit' => 5,
		'order' => array (
			'Registro.Fecha' => 'desc'
		)
	);

	public function index ()
	{
		$this -> Registro -> recursive = 0;
		$this -> paginate['Registro']['limit'] = 5;
		$this -> paginate['Registro']['order'] = array (
			'Registro.Fecha' => 'desc'
		); 
		//$this -> paginate['Moto']['conditions'] = array ( 'Mesero.id' => '')
		
		$this -> set ( 'registros', $this -> paginate() );
	}

	public function nuevo () 
	{
		if ( $this -> request -> is ( 'post' ) )
		{
			$this -> Registro -> create();

			if ( $this -> Registro ->  save ( $this -> request -> data ) )
			{
				$this -> Flash -> success ( 'La Reparación fue creada.' );				
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}   

			$this -> Flash -> error ( 'No se pudo crear La Reparación.' );
		}

		$motos = $this -> Registro -> Moto -> find( 'list', array ( 'fields' => array ( 'id', 'marca_modelo_color' ) ) );
		$empleados = $this -> Registro -> Empleado -> find( 'list', array ( 'fields' => array ( 'id', 'nombre_completo' ) ) );
		$this -> set ( 'motos', $motos );
		$this -> set ( 'empleados', $empleados );
	}

	public function actualizar ( $id = null )
	{
		if ( !$id )
		{
			throw new NotFoundException( 'Datos Invalidos.');
		}

		$registros = $this -> Registro ->  findById( $id );

		if ( ! $registros )
		{
			throw new NotFoundException('La Reparación no fue encontrada');
		}

		if ( $this -> request -> is ( array( 'post' , 'put' ) ))
		{
			$this -> Registro ->  id = $id ;

			if ( $this -> Registro ->  save( $this -> request -> data ) )
			{
				$this -> Flash -> success ( 'La Reparación fue modificada exitosamente.');
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this -> Flash -> error ( 'La Reparación no pudo ser modificada');
		}

		if ( ! $this -> request -> data )
		{
			$this -> request -> data = $registros;
		}

		$motos = $this -> Registro -> Moto -> find( 'list', array ( 'fields' => array ( 'id', 'marca_modelo_color' ) ) );
		$empleados = $this -> Registro -> Empleado -> find( 'list', array ( 'fields' => array ( 'id', 'nombre_completo' ) ) );
		$this -> set ( 'motos', $motos );
		$this -> set ( 'empleados', $empleados );
	}

	public function eliminar ( $id = null )
	{
		if ( ! $this -> request -> is ( 'post' ) )
		{
			throw new MethodNotAllowedException( 'INCORRECTO' );
		}

		if ( $this -> Registro -> delete ( $id ) )
		{
			$this -> Flash -> success ( 'La Reparación con Id ' . $id . ' Fue Eliminada' );
			$this -> redirect ( array ( 'action' => 'index' ) );
		}
	}

}

// FIN REgistros CONTROLLER