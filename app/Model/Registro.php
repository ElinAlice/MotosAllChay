<?php 


class Registro extends AppModel 
{
	public $name = 'Registro';

	public $validate = array (
		'Fecha' => array (
			'notBlank' => array (
				'rule' => 'notBlank'
			)
		),
		'Tipo_Reparacion'         => 'notBlank',
		'Costo'      => array (
			'notBlank' => array (
				'rule' => 'notBlank'
			),
			'decimal' => array (
				'rule' => 'decimal'
			)
		),
		'Detalle_Reparacion'     => 'notBlank',
		'moto_id'     => 'notBlank',
		'empleado_id'     => 'notBlank'
	);

	public $belongsTo = array (
		'Empleado' => array (
			'className' => 'Empleado',
			'foreignKey' => 'empleado_id'	
		),
		'Moto' => array (
			'className' => 'Moto',
			'foreignKey' => 'moto_id'	
		)
	);

}


// FIN Registro MODEL