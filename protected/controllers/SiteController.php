<?php
require_once('protected/components/messageContactForm.php');
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		//Categories
		$dataProviderCategories=Categories::model()->getCategories();
		
	
		//Productos
		$listingsDataProvider = new 
		CActiveDataProvider('Classifieds',
			array(
				'criteria'=> array(
					'join' => 'join pmd_listings on pmd_listings.id=t.listing_id',
					'condition'=>'custom_14=1 AND status="active" AND template_file<>""',
					"order" => "template_file ASC, rand()"
				),
			  'pagination'=>array(
				  'pageSize'=>'16'
			  ),
			)
		);

		// Lista de Banners
		// $dataProviderBanners=new CActiveDataProvider('Banners', 
		// 			array('criteria' => array(
		// 				'join'=>'inner join pmd_banners_categories AS pbc ON (t.id=pbc.banner_id)',
		// 				'condition'=>' t.type_id>8',
		// 				"order" => "t.id ASC",
		// 				),
		// 				'pagination'=>array('pageSize'=>10
		// 				),
		// ));
	
		$this->render('index',array(
			'listingsDataProvider'=>$listingsDataProvider,
			'dataProviderCategories'=>$dataProviderCategories,
			//'dataProviderBanners'=>$dataProviderBanners,
		));

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}	
	}
	
	
	
	/**
	 * Displays the vendor page
	 */
	public function actionVendor()
	{
		$ContactForm=new ContactForm();
		$messages="";
		$resp="";
		$this->performAjaxValidation($ContactForm);
		
		
		if(isset($_POST["ContactForm"])){
				$ContactForm->attributes=$_POST['ContactForm'];
			if($ContactForm->validate())
					{
					 require_once('protected/views/guia/site/recaptchalib.php');
					 $privatekey = "6LehiAoTAAAAACusNIhrtTEg7J9vuyQKh1HE_xJD";  
					 $resp = recaptcha_check_answer ($privatekey,
														 $_SERVER["REMOTE_ADDR"],
														 $_POST["recaptcha_challenge_field"],
														 $_POST["recaptcha_response_field"]);
						 if (!$resp->is_valid) {
						   // What happens when the CAPTCHA was entered incorrectly
						    $resp5="Captcha Invalido";
						 } else {
						$Nombre= $ContactForm->name;
						$Email= $ContactForm->email;
						$Telefono= $ContactForm->phone;
						$Observaciones= $ContactForm->body;
						//recorremos el array de categorias seleccionados por el check y busca sus hijos
						$tamanocategoria = sizeof($ContactForm->CategoriId);
  						foreach($ContactForm->CategoriId as $value){
							$listacategorias.= ",".Categories::model()->getListingSubcategories($value);
						}
						
						//Lista las ciudades seleccionadas por check
						foreach($ContactForm->city as $value2){
							$dataLocation = Locations::model()->findByPk($value2);
							$listaCiudades.= ",".$value2;
							$listaNameCiudades.= ",".$dataLocation->title;
							$dataLocation ='';
						}
						//Elimina la primera coma de la lista
						$listacategorias = substr($listacategorias,1);
						$listaCiudades = substr($listaCiudades,1);
						$listaNameCiudades = substr($listaNameCiudades,1);
						
						//Me lista los emails de acuerdo a la seleccion de la categoria y ubicacion
						$Listings = ContactForm::listaEmailListing($listacategorias,$listaCiudades);
							
						
						Yii::import("application.controllers.ApiController");
						ApiController::actionContactAnalitycVendor($Listings);
						
						foreach($Listings as $value){
							$mails.= ",".$value['mail'];
						}
						
						$cabeceras= 'MIME-Version: 1.0' . "\r\n";
						$cabeceras.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$cabeceras.= 'From: Revista Fierros<fierros@fie.fierros.com.co>'."\r\n";
		
						$formProveedor=formularioProveedorVendor($Nombre,$Email,$Telefono,$listaNameCiudades,$Observaciones,"");	
						$formCliente=formularioClienteVendor($Nombre);
						$correosGuiaFierros=Yii::app()->params->listEmail.$mails;
						if($mails!=""){
							mail($correosGuiaFierros, 'Cotización Cliente - Todo para: Guía De Proveedores Revista Fierros!', $formProveedor, $cabeceras);
						}
							mail($Email, 'Cotización Cliente - Todo para: Guía De Proveedores Revista Fierros!', $formCliente, $cabeceras);
						Yii::app()->theme='guia';
						$this->redirect(array('guia/site/page/view/confirm'));
						
						}
					}
		}
			
		//Categories
		$DataProviderCategories=Categories::model()->getCategories();
		
		//Lista de Banners
		$dataProviderBanners=new CActiveDataProvider('Banners', 
					array('criteria' => array(
						'join'=>'inner join pmd_banners_categories AS pbc ON (t.id=pbc.banner_id)',
						'condition'=>' t.type_id>8',
						"order" => "t.id ASC",
						),
						'pagination'=>array('pageSize'=>10
						),
				));
			$this->render('vendor',array(
				'model'=>$model,
				'ContactForm'=>$ContactForm,
				'DataProviderCategories'=>$DataProviderCategories,
				//'dataProviderBanners'=>$dataProviderBanners,
				'resp5'=>$resp5,
			));
	}
	
	
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect('/guia/measure/');
		}
		
		if(Yii::app()->user->isGuest){
			// display the login form
			$this->render('login',array('model'=>$model));
		}else{
			$this->redirect('/guia/measure/');		
		}
		
	}

	/** 
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	protected function performAjaxValidation($model)
	{
		
		$model=new ContactForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}