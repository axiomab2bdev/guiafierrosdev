<?php 
class ContactHomeForm extends CFormModel
{
	public $name;
	public $email;
	public $phone;
	public $subject;
	public $body;
	public $verifyCode;
	public $terminos;
	
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, body, phone, subject', 'required'),
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
			'name' => 'Nombre y Apellidos',
			'email' => 'Correo Electrónico',
			'phone' => 'Teléfono',
			'subject' => 'Dirigido a',
			'body' => 'Comentarios',
		);
	}

	 	
}

?>