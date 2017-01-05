<?php 


class Empleado extends AppModel 
{
	public $name = 'Empleado';

	public $virtualFields = array (
		'nombre_completo' => 'CONCAT(Empleado.Nombre, " ", Empleado.Apellidos)'
	); 

	public $validate = array (
		'DNI_Empleado' => array (
			'notBlank' => array (
				'rule' => 'notBlank'
			),
			'numeric' => array (
				'rule' => 'numeric',
				'message' => 'Solo numeros'
			),
			'unique' => array (
				'rule' => 'isUnique',
				'message' => 'El DNI ya esta registrado.'
			)
		),
		'Nombre'         => 'notBlank',
		'Apellidos'      => 'notBlank',
		'Contrasena'     => 'notBlank',
		'Tipo'           => 'notBlank'
	);

	public $hasMany = array (
		'Registro' => array (
			'className' => 'Registro',
			'foreignkey' => 'empleado_id',
			'conditions' => '',
			'order' => 'Registro.Fecha DESC',
			'depend' => false
		)
	);

}


// FIN TRABAJADOR MODEL