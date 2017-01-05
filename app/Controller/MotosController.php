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