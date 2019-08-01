<?php
/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $CategoriId;
	public $name;
	public $email;
	public $phone;
	public $city;
	public $subject;
	public $body;
	public $verifyCode;
	public $terminos;

	/**
	 * Declares the validation rules.
	 */

	 
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, phone, subject, body, terminos, CategoriId', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('city', 'required'),
			// verifyCode needs to be entered correctly
/*			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
*/		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
	
	public function listaEmailListing($listacategorias, $listaciudades){
		 $sql = Yii::app()->db->createCommand("SELECT pmd_listings.id as idListing, pmd_listings.title, pmd_listings.mail, pmd_listings.location_id, pmd_orders.id 
		 FROM pmd_listings 
		 LEFT JOIN pmd_orders ON(pmd_listings.id = pmd_orders.type_id) 
		 WHERE primary_category_id IN($listacategorias) AND pmd_listings.status ='active' AND priority>0 AND mail !='' 
		 AND pmd_listings.location_id IN($listaciudades)
		 Group by pmd_orders.id 
		 ORDER BY primary_category_id DESC, pricing_id DESC, pmd_orders.date DESC 
		 LIMIT 0, 200")->queryAll();;			
		return $sql;	
	}
	
}