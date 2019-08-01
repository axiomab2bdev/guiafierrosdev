<?php 
class PauteForm extends CFormModel
{
	public $name;
	public $nameEmpresa;
	public $phone;
	public $email;
	public $cargo;
	public $city;
	public $product;
	
	public $terminos;
	
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, nameEmpresa, phone, email, cargo, city, product', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Nombre Completo',
			'nameEmpresa' => 'Nombre Empresa',
			'phone' => 'Teléfono',
			'email' => 'E-mail',
			'cargo' => 'Cargo',
			'city' => 'Ciudad',
			'product' => 'Productos de interés',
		);
	}

	 	
}

?>