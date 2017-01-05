<?php 


class Moto extends AppModel 
{
	public $name = 'Moto';

	public $virtualFields = array (
		'marca_modelo_color' => 'CONCAT(Moto.Marca, " ", Moto.Modelo, " ", Moto.Color, " ", Moto.Anio)'
	); 

	public $validate = array (
		'Marca' => array (
			'notBlank' => array (
				'rule' => 'notBlank'
			)
		),
		'Modelo'         => 'notBlank',
		'Anio'      => 'notBlank',
		'Color'     => 'notBlank',
		'Combustible'     => 'notBlank',
		'Motor'     => 'notBlank'
	);

	public $hasMany = array (
		'Registro' => array (
			'className' => 'Registro',
			'foreignkey' => 'moto_id',
			'conditions' => '',
			'order' => 'Registro.Fecha ASC',
			'depend' => false
		)
	);

}


// FIN TRABAJADOR MODEL