<?php 
class ListingForm extends CFormModel
{
	public $name;
	public $email;
	public $body;
	public $phone;
	public $city;
	public $CategoriId;
	public $cedula;
	public $captcha;
	
	
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, body, phone, city, CategoriId', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('email',
					'match','not' => true, 'pattern' => '/(?:jimos)(?:[^@]+@)/'),
			// phone has to be numerical
			array('phone','numerical'),
			// body has to be safe
			array('body',
				// 'match', 'not' => true, 'pattern' => '/\[url/'),
			'match', 'not' => true, 'pattern' => "/(?:\[url)|(?:(?:(?:http:\/\/)|(?:www.))(?:[^(\s)]{25,}))/"),
			// verifyCode needs to be entered correctly
			
		);
	}
	

	 	
}

?>