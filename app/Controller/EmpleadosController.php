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

	public function isAuthorized($user)
	{
		if($user['role'] == 'user')
		{
			if(in_array($this->action, array('nuevo', 'index', 'ver', 'actualizar')))
			{
				return true;
			}
			else
			{
				if($this->Auth->user('id'))
				{
					$this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
					$this->redirect($this->Auth->redirect());
				}
			}
		}
		
		return parent::isAuthorized($user);
	}

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
				$this->Session->setFlash('El Trabajador fue creado.', 'default', array('class' => 'alert alert-success'));			
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this->Session->setFlash('No puedo crear el empleado.', 'default', array('class' => 'alert alert-danger'));
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
				$this->Session->setFlash('El Trabajador fue modificado exitosamente.', 'default', array('class' => 'alert alert-success'));
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this->Session->setFlash('El Trabajador no pudo ser modificado.', 'default', array('class' => 'alert alert-danger'));
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
			$this->Session->setFlash('El Empleado fue eliminado.', 'default', array('class' => 'alert alert-success'));
			$this -> redirect ( array ( 'action' => 'index' ) );
		}
	}

}

// FIN TRAJABADOR CONTROLLER