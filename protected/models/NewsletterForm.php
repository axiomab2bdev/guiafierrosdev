<?php 
class NewsletterForm extends CFormModel
{
	public $email;
	public $area;
	public $industria;

	
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('email', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// safe vars
			array('area,industria', 'safe'),
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email' => 'E-mail',
			'area' => 'Área en la que se desempeña',
			'industria' => 'Industria a la que pertenece',
		);
	}

	 	
}

?>