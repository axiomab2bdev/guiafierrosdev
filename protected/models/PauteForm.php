<?php 
class PauteForm extends CFormModel
{
	public $name;
	public $nameEmpresa;
	public $phone;
	public $email;
	public $city;
	public $product;
	public $terminos;
	public $comments;
	
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, phone, email, product', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('city, nameEmpresa','length', 'max'=>255),
			array('comments','length', 'max'=>700),
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Nombre y Apellido',
			'nameEmpresa' => 'Nombre Empresa',
			'phone' => 'Teléfono',
			'email' => 'E-mail',
			'city' => 'Ciudad',
			'product' => 'Interesado en',
			'comments' => 'Comentarios',
		);
	}

	 	
}

?>