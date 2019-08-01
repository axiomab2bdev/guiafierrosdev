<?php 
class SuscriptionForm extends CFormModel
{
	public $name;
	public $phone;
	public $email;
	public $city;
	public $comments;
	public $terminos;
	
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, phone, email', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// safe vars
			array('city', 'safe'),
			// verify text length area text
			array('comments','length', 'max'=>500),
			
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Nombre y Apellidos',
			'phone' => 'Teléfono',
			'email' => 'E-mail',
			'city' => 'Ciudad',
			'comments' => 'Comentarios',
		);
	}

	 	
}

?>