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
				$this->Session->setFlash('La reparacion fue guardada.', 'default', array('class' => 'alert alert-success'));				
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}   

			$this->Session->setFlash('No se pudo guardar la reparacion', 'default', array('class' => 'alert alert-danger'));
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
				$this->Session->setFlash('La Reparacion fue modificada exitosamente.', 'default', array('class' => 'alert alert-success'));
				return $this -> redirect ( array ( 'action' => 'index' ) );
			}

			$this->Session->setFlash('La Reparacion no pudo ser modificada.', 'default', array('class' => 'alert alert-danger'));
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
			$this->Session->setFlash('Se elimino la reparacion exitosamente.', 'default', array('class' => 'alert alert-success'));
			$this -> redirect ( array ( 'action' => 'index' ) );
		}
	}

}

// FIN REgistros CONTROLLER