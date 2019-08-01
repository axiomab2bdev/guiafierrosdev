<?php 
class ListingForm extends CFormModel
{
	public $name;
	public $email;
	public $body;
	public $phone;
	public $city;
	public $captcha;
	
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, body, phone, city', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('captcha', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'captcha'=>'Verification Code',
		);
	}
	 	
}

?>