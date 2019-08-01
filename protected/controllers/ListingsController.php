<?php
require_once('protected/components/messageContactForm.php');
class ListingsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		
		if($model->status != 'active'){
			throw new CHttpException(404,'No se puede encontrar la página solicitada.',404);
			//$this->render('/site/error',array('code'=>'404','message'=>'No se puede encontrar la página solicitada.'));			
		}else{
			$listingForm= new ListingForm;
			$messages="";
			
			if(isset($_POST["ListingForm"])){
			$listingForm->attributes=$_POST['ListingForm'];
				if($listingForm->validate())
						{
							$Nombre= strtr($listingForm->name,Yii::app()->params->unwanted_array);
							$Email= $listingForm->email;
							$Telefono.= (isset($listingForm->phone)? $listingForm->phone : '' );
							$Ciudad= strtr($listingForm->city,Yii::app()->params->unwanted_array);
							$Observaciones= strtr($listingForm->body,Yii::app()->params->unwanted_array);
							$Pagina= $this->loadModel($id)->friendly_url.".html"; 
							$Cliente= strtr($this->loadModel($id)->title,Yii::app()->params->unwanted_array);
							$EmailCliente= $this->loadModel($id)->mail;
							$EmailCliente2= $this->loadModel($id)->custom_14;
							$TelefonoCliente= (isset($this->loadModel($id)->phone)? $this->loadModel($id)->phone : '' ).' '.(isset($this->loadModel($id)->phone)? $this->loadModel($id)->phone: '' );
							$send_full_information = $_POST['send_full_information'];
							$emaildeproveedor="";
							
							if($EmailCliente!=""){
								$emaildeproveedor.=",$EmailCliente";
							}
							if($EmailCliente2!=""){
								$emaildeproveedor.=",$EmailCliente2";	
							}
	
							$cabeceras= 'MIME-Version: 1.0' . "\r\n";
							$cabeceras.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
							$cabeceras.= 'From: Revista Fierros<fierros@fie.fierros.com.co>'."\r\n";

							
	
							if ($this->loadModel($id)->template_file!="") {
								$formProveedor= formularioProveedor_oro($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente);	
							}
							else{	
								$formProveedor= formularioProveedor_bronce($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente,$ClienteTel,$EmailCliente,$send_full_information);	
							}
							
							$formCliente=formularioCliente($Nombre,$Cliente,$Pagina, $EmailCliente,$TelefonoCliente);
							$correosGuiaFierros=Yii::app()->params->listEmail.$emaildeproveedor;
							
							$title = 'Cotización Cliente - Guía de proveedores de ferreterias construcción eléctricos e industriales!';

							if($Email == 'desarrolladorback@revistalabarra.com' || $Nombre == 'prueba' || $Observaciones == 'prueba'){
								$correosGuiaFierros = 'desarrolladorback@revistalabarra.com,desarrolladorfront@revistalabarra.com,ebusiness@axioma.com.co';
							}
							
							mail($correosGuiaFierros, '=?utf-8?B?'.base64_encode($title).'?=', $formProveedor, $cabeceras);


							
							if($Email!=""){
								$titleClient = 'Cotización -  '.Yii::app()->name.'!'; 
								
								if($this->loadModel($id)->template_file=="" && !$send_full_information){

									$categories = Categories::model()->findByAttributes(array('id'=>$this->loadModel($id)->primary_category_id));
									$WebCliente = $this->loadModel($id)->www;

									$formCliente2=formularioCliente_infoRestringida($Nombre,$Cliente,$Pagina, $TelefonoCliente, $WebCliente, $categories->title,$categories->friendly_url);

									mail($Email,'=?utf-8?B?'.base64_encode($titleClient).'?=' , $formCliente2, $cabeceras);
								}else{
									mail($Email, '=?utf-8?B?'.base64_encode($titleClient).'?=', $formCliente, $cabeceras);	
								}


								if(!isset($_POST['object_id']) || $_POST['object_id']=='')
									$_POST['object_id'] = $id;
								if(!isset($_POST['object_type']) || $_POST['object_type']=='')
									$_POST['object_type'] = 1;
								
								Yii::import("application.controllers.ApiController");
								$apiController = new ApiController($id);
								$apiController->actionContactAnalityc($_POST);
							}
							Yii::app()->theme='guia';
							$this->redirect(array('site/page/view/confirm', 'urll' =>$this->loadModel($id)->friendly_url, 'category_id'=>$listingForm->CategoriId));
							
						}
			}
			//Lista de Banners Categoria
			$dataProviderBanners=new CActiveDataProvider('Banners', 
						array('criteria' => array(
							'join'=>'inner join pmd_banners_categories AS pbc ON (t.id=pbc.banner_id)',
							'condition'=>' pbc.category_id='.$this->loadModel($id)->primary_category_id,
							"order" => "t.id ASC"
						)
					));
					
			//Lista de Banners Generales
			$dataProviderBannersGenerales=new CActiveDataProvider('Banners', 
						array('criteria' => array(
							'join'=>'inner join pmd_banners_categories AS pbc ON (t.id=pbc.banner_id)',
							'condition'=>' t.type_id>8',
							"order" => "t.id ASC",
							),
							'pagination'=>array('pageSize'=>10
							),
					));
			
			  //Lista de Classifieds
			$classifiedsDataProvider = new 
			CActiveDataProvider('Classifieds',
				array(
					'criteria'=> array(
						'condition'	=>'listing_id='.$id,
						'order'=>'date DESC',
					),
					'pagination'=>array(
							'pageSize'=>9,
							'route'=>'../',
                            'params'=>array('guia'=>$model->friendly_url.'.html'),
							),
				)
			);
			
			$this->render('view',array(
				'model'=>$model,
				'listingForm'=>$listingForm,
				'classifiedsDataProvider'=>$classifiedsDataProvider,	
				'dataProviderBanners'=>$dataProviderBanners,
				'dataProviderBannersGenerales'=>$dataProviderBannersGenerales,
				'resp5'=>$resp5,
			));
		}
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 
	 public function getIP() { 
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
		   $ips = $_SERVER['HTTP_X_FORWARDED_FOR']; 
		}  
		elseif (isset($_SERVER['HTTP_VIA'])) { 
		   $ips = $_SERVER['HTTP_VIA']; 
		}  
		elseif (isset($_SERVER['REMOTE_ADDR'])) { 
		   $ips = $_SERVER['REMOTE_ADDR']; 
		} 
		else {  
		   $ips = "unknown"; 
		} 
		 
		return $ips; 
	
	}

	public function actionCreate()
	{
		require_once('protected/views/listings/recaptchalib.php');
		$model=new Listings;
		$resp5='';
		//Categorias	
		$dataProviderCategories=Categories::model()->getCategories();
		//Lista de Banners Generales
		$dataProviderBannersGenerales=$this->getBanners();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Listings']))
		{	
			/*$model->attributes=$_POST['Listings'];
			$imageUploadFile = CUploadedFile::getInstance($model,'logo_extension');
			if(!empty($imageUploadFile)){ // only do if file is really uploaded 
				$extension = $_FILES["Listings"]["type"]["logo_extension"];
				$pieces = explode("/", $extension);
				$model->logo_extension=$pieces[1];
				$imageFileName = 'id.'.$model->logo_extension;
				$urlImage = Yii::app()->basePath.'/../prueba/'.$imageFileName; 
			}
			if($imageUploadFile)
				$imageUploadFile->saveAs($urlImage);
			else
				echo 'error <br>';
			exit(0);*/
			$privatekey = "6LehiAoTAAAAACusNIhrtTEg7J9vuyQKh1HE_xJD"; 
			$resp = recaptcha_check_answer ($privatekey,
											 $this->getIP(),
											 $_POST["recaptcha_challenge_field"],
											 $_POST["recaptcha_response_field"]);
			/***verify captcha****/
			 if (!$resp->is_valid) {
			   // What happens when the CAPTCHA was entered incorrectly
			   	$model->attributes=$_POST['Listings'];
				$resp5="Captcha Invalido";
			 }else{	
				/***verify email****/
				$modelUser = Users::model()->findByAttributes(array('user_email'=>$_POST['Listings']['mail']));
				if($modelUser->user_email!=$_POST['Listings']['mail']){
					/***add user*****/
					$modelUser=new Users;
					$modelUser->user_first_name=$_POST['Listings']['title'];
					$modelUser->user_email=$_POST['Listings']['mail'];
					$modelUser->login=$_POST['Listings']['mail'];
					$modelUser->password_hash='md5';
					
					$saveUser = $modelUser->save();
					
					if($saveUser){
						/*$modelUser = '';
						$modelUser = Users::model()->findByAttributes(array('user_email'=>$_POST['Listings']['mail']));*/
						/***add listing*****/
						$model->attributes=$_POST['Listings'];
						$model->user_id=$modelUser->id;
						$model->status='pending';
						$model->ip=$this->getIP();
						$model->date=date("Y-m-d H:i:s");
						// Order of replacement for friendly_url
						$order   = array(" ", "\n", "\r", "/", "_");
						$replace = '-';
						// Processes space first so they aren't converted twice.
						$model->friendly_url = strtolower(str_replace($order, $replace, $model->title));
						// verify unic url for listing
						$modelVerifyListingUrl = Listings::model()->findAllByAttributes(array('friendly_url'=>$model->friendly_url));
						//var_dump($model);
						if(isset($modelVerifyListingUrl) && $modelVerifyListingUrl!=''){
							foreach($modelVerifyListingUrl as $value){
								if($model->friendly_url==$value['friendly_url']){
									$model->friendly_url=$model->friendly_url.'-'.$modelUser->id;
								}
							}
						}
						// init upload image
						$imageUploadFile = CUploadedFile::getInstance($model,'logo_extension');
						/***define extension file*****/
						if(!empty($imageUploadFile)){ // only do if file is really uploaded 
							$extension = $_FILES["Listings"]["type"]["logo_extension"];
							$pieces = explode("/", $extension);
							$model->logo_extension=$pieces[1];
						}					
						
						$saveListing = $model->save();
			
						if($saveListing){
							
							$fecha = date('Y-m-d', strtotime('+1 years'));
							$sqlOrder = "INSERT INTO `pmd_orders` VALUES(DEFAULT, ".$model->id.$modelUser->id.", 'listing_membership', ".$model->id.", ".$modelUser->id.", 0, 2, '', '".date("Y-m-d H:i:s")."','', 'pending', '0.00', 'years', 1, '".$fecha."', '0000-00-00', '0000-00-00', 0, '', 0, '2', 1, '', '0.00', NULL, 'fixed', '".$this->getIP()."', 0, '');";
							
							Yii::app()->db->createCommand($sqlOrder)->execute();
							
							/***upload file*****/
							if($imageUploadFile){
								$imageFileName = $model->id.'.'.$model->logo_extension;
								$urlImage = Yii::app()->basePath.'/../files/logo/'.$imageFileName;
								$imageUploadFile->saveAs($urlImage);
							}
							/***confirm create listing*****/
							$modelLocation = Locations::model()->findByPk($model->location_id);
							$Nombre= strtr($model->title,Yii::app()->params->unwanted_array);
							$Email= $model->mail;
							$Telefono.= $model->phone;
							$Ciudad= strtr($modelLocation->title,Yii::app()->params->unwanted_array);
							$Descripcion= strtr($model->description,Yii::app()->params->unwanted_array);
							$imageUploadFile = CUploadedFile::getInstanceByName($_POST['image']);
	
							$cabeceras= 'MIME-Version: 1.0' . "\r\n";
							$cabeceras.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$cabeceras.= 'From: Revista Fierros<fierros@fie.fierros.com.co>'."\r\n";
	
			
							$formIA= formularioCreateMicrositioIA($Nombre,$Email,$Telefono,$Ciudad,$Descripcion);	
							$formCliente=formularioCreateMicrositioCliente($Nombre,$Email,$Telefono,$Ciudad,$Descripcion);
							
							$correosGuiaFierros=Yii::app()->params->listEmailCreateListing;
							
							/***Email confirm create listing*****/
							$titleListing = 'Registro Nuevo Micrositio -  '.Yii::app()->name.'!';
							mail($correosGuiaFierros, '=?utf-8?B?'.base64_encode($titleListing).'?=', $formIA, $cabeceras);
							/***Email confirm create listing for client*****/
							$titleClient = 'Registro Exitoso Micrositio -  '.Yii::app()->name.'!';
							mail($Email, '=?utf-8?B?'.base64_encode($titleClient).'?=', $formCliente, $cabeceras);
							Yii::app()->user->setFlash('successCreate','<span class="dropcap">G</span>racias por registrar su Micrositio en la <b>Guía de proveedores de ferreterias construcción eléctricos e industriales de Colombia</b>, pronto nos comunicaremos con usted.');
							/***clear vars listing*****/
							$model=new Listings;
							$modelUser='';
							$modelLocation='';
						}else{
							$modelUser->delete();
							Yii::app()->user->setFlash('successCreate','No se pudo registrar.');	
						}
					}else{
						Yii::app()->user->setFlash('successCreate','No se pudo registrar.');	
					}
				}else{
					$model->attributes=$_POST['Listings'];
					$model->addError('mail', "El correo electronico es incorrecto o se encuentra en uso");	
				}
			 }
			
		}
		

		$this->render('create',array(
			'model'=>$model,
			'dataProviderCategories'=>$dataProviderCategories,
			'dataProviderBannersGenerales'=>$dataProviderBannersGenerales,
			'resp5'=>$resp5,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Listings']))
		{
			$model->attributes=$_POST['Listings'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function getProductsByKeywordAndLocation($keyword,$location){
		return new CActiveDataProvider('Classifieds', 
					array(
					'criteria' => Classifieds::model()->searchAdvance($keyword,$location),					
					'pagination'=>array(
								'pageSize'=>12,
						),
				));	
	}
	public function getListingsByKeywordAndLocation($keyword,$location){
		return new CActiveDataProvider('Listings', 
					array(
					'criteria' => Listings::model()->searchAdvance($keyword,$location),	
					
				));
	}
	public function getListingsByLocationId($lid){
		return new CActiveDataProvider('Listings', 
						array('criteria' => array(
							'condition'=>'status="active" AND location_id IN ('.$lid.Locations::model()->getLocationsSubCountry($lid).')',
							"order" => "IF(`priority`='5','A',priority) DESC,
										IF(`template_file`='','Z',template_file) ASC,
										RAND(CURDATE())",
						)
					));	
	}
	public function getBannerByCategoryId($cid){
		return new CActiveDataProvider('Banners', 
					array('criteria' => array(
						'join'=>'inner join pmd_banners_categories AS pbc ON (t.id=pbc.banner_id)',
						'condition'=>' pbc.category_id='.$cid,
						"order" => "t.id ASC"
					)
				));
	}
	
	public function getListingsByCategoryId($cid){
		return new CActiveDataProvider('Listings', 
						array('criteria' => array(
							'distinct'=>true,
							'join'=>'JOIN pmd_listings_categories as lc ON(lc.list_id=t.id)',
							'condition'=>'status="active" AND (t.primary_category_id IN ('.Categories::model()->getListingSubcategories($cid).') OR lc.cat_id IN('.Categories::model()->getListingSubcategories($cid).'))',
							"order" => "IF(`priority`= 5 AND t.primary_category_id = $cid,'A',priority) DESC,
										IF(`priority`= 5 AND t.primary_category_id != $cid,'B',priority) DESC,
										IF(`template_file`='','Z',template_file) ASC,
										RAND(CURDATE())"
						),
						'pagination'=>array(
								'pageSize'=>12,
						)
					));
	}
	public function getClassifiedsByCategoryId($categoryProduct){
		return new CActiveDataProvider('Classifieds', 
					array('criteria' => array(
						'join' => 'join pmd_listings as tl on tl.id=t.listing_id',
						'condition'=>'tl.status="active" AND tl.primary_category_id IN ('.Categories::model()->getListingSubcategories($categoryProduct).')',
						"order" => "IF(tl.template_file='','Z',tl.template_file) ASC"),				
					'pagination'=>array(
								'pageSize'=>12,
						),
				));	
	}
	public function getListings(){
		return new CActiveDataProvider('Listings', 
					array('criteria' => array(/*
						'condition'=>'template_file<>""',*/
						'condition'=>'status="active"',
						"order" => "IF(`priority`='5','A',priority) DESC,
										IF(`template_file`='','Z',template_file) ASC,
										RAND(CURDATE())",
					)
				));	
	}
	public function getBanners(){
		return new CActiveDataProvider('Banners', 
					array('criteria' => array(
						'join'=>'inner join pmd_banners_categories AS pbc ON (t.id=pbc.banner_id)',
						'condition'=>' t.type_id>8',
						"order" => "t.id ASC",
						),
						'pagination'=>array('pageSize'=>10
						),
				));
	}
	/**
	 * Lists all models.
	 */
public function actionIndex($keyword = '',$location = '')
	{
		$dataProviderProductos='';
			
		$dataProviderBanners='';
		if(isset($_GET['cid']) || isset($_GET['lid']))
		{
			//Lista de Banners Categoria
			if(isset($_GET['cid']))
			$dataProviderBanners=$this->getBannerByCategoryId($_GET['cid']);
			
			if(isset($_GET['location'])){
				$dataProvider=$this->getListingsByLocationId($_GET['lid']);
				
			}else	
				$dataProvider=$this->getListingsByCategoryId($_GET['cid']);
			
		}elseif( (strlen( $keyword ) > 0 && $keyword!='') || strlen( $location ) > 0 && $location!=''){
			//Consultar Productos
			$dataProviderProductos= $this->getProductsByKeywordAndLocation($keyword,$location);
			//Consultar Proveedores
			$dataProvider=$this->getListingsByKeywordAndLocation($keyword,$location);
			/****************************************************************************************/
		}
		elseif(isset($_GET['categoryProduct']) && $_GET['categoryProduct']!='')
		{
			
			//Lista de Banners Categoria	
			$dataProviderBanners=$this->getBannerByCategoryId($_GET['categoryProduct']);
	
			$dataProvider='';

				//Consultar Productos
			$dataProviderProductos=$this->getClassifiedsByCategoryId($_GET['categoryProduct']);
			
		}elseif(!isset($_GET['id']))
		{
			$dataProvider=$this->getListings();
			
		}
		//Categorias	
		$dataProviderCategories=Categories::model()->getCategories();
		//Lista de Banners Generales
		$dataProviderBannersGenerales=$this->getBanners();
		
		//render
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'dataProviderProductos'=>$dataProviderProductos,	
				'dataProviderBanners'=>$dataProviderBanners,
				'dataProviderCategories'=>$dataProviderCategories,	
				'dataProviderBannersGenerales'=>$dataProviderBannersGenerales,
			));
		
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Listings('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Listings']))
			$model->attributes=$_GET['Listings'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Listings the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Listings::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
			//$model=Listings::model()->find('friendly_url="AGA---COLOMBIA"');
		//if($model===null)
			//throw new CHttpException(404,'The requested page does not exist.');
			//echo "esta null";
		//else
			//echo "No cargo".$id;
		
		//echo "Estoy aca";*/
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Listings $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='listings-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function build_4goldListingsForm($gold_listing, $setCategory , $prueba)	{
		if ($gold_listing != "") {
		$output = "";
		$output .= "<div id='proveedores-oro' class='hidden'>";
			$output .= "<div class='gold4-box'>";
				$output .= "<div class='interes-info'>";
					// $output .= "<p id='goldListing-name' class='name-cotizacion'></p>";
					$output .= "<p class='cotizacion-text'>¡UPS! HAY UN PROBLEMA</p>";
					$output .= "<div id='cotizacion-border'><p class='cotizacion-msj'>Este proveedor no tiene activa la opción para recibir cotizaciones, te invitamos a que lo contactes a través de su número telefónico o lo visites en su punto de venta.</p></div>";
					$output .= "<p class='cotizacion-msj'>Sin embargo hemos encontrado proveedores similares en nuestra guía. <strong> ¿te gustaría cotizar con ellos?</strong></p>";
				$output .= "</div>";
				
				$output .= "<div class='provedor-container'>";
					$output .= "<form id='form-proveedores'>";
						$output .= "<div class='one-whole'>";
						
							
						
							foreach ($gold_listing as $key => $value) {

								$output .= "<div class='gold4-provider display-none'>";
									$output .= "<div class='provedor-main-container'>";
										$output .= "<div class='proveedor-img-container'>";
											$idheadImg = uniqid($value["id"]);

											$output .= '<img rel="image_src" class="logo-form" id="img'. $idheadImg.'" src="/themes/guia/images/loading_EO_mini.gif" alt="'. strtr($value["title"],Yii::app()->params->unwanted_array ).'" />';

											$output .= '<script> imageAPi("'. $idheadImg.
											 		'","'. CHtml::encode($value["id"]).".".CHtml::encode($value["logo_extension"]) .
											 		'","listing");	</script>';
										$output .= "</div>";

										$output .= "<label class='provedor-name']'>".$value['title']."</label>";
										$output .= "<input type='hidden' class='provedor-name' name='title-provider[".$value["id"]."]' value='".$value['title']."'>";

										$output .= "<div class='check-box'>";
											$output .= "<input type='checkbox' name='check-provider[".$value['id']."]' id='check-provider[".$value['id']."]' class='css-checkbox' checked='checked'>";
											$output .= "<label for='check-provider[".$value['id']."]' class='css-label provedor-name'></label>";
										$output .= "</div>";

										$output .= "<input type='hidden' name='mailing-provider[".$value['id']."]' value='".$value['mail']."' >";
										$output .= "<input type='hidden' name='tel-provider[".$value['id']."]' value='".$value['phone']."' >";
									$output .= "</div>";
								$output .= "</div>";
							}

							
						$output .= "</div>";
						$output .= "<div class='clear'></div>";
						$output .= "<div class='one-whole mt20'>";
							$output .= "<input type='hidden' name='name'>";
							$output .= "<input type='hidden' name='email'>";
							$output .= "<input type='hidden' name='cedula'>";
							$output .= "<input type='hidden' name='phone'>";
							$output .= "<input type='hidden' name='city'>";
							$output .= "<input type='hidden' name='url_origin'>";
							$output .= "<input type='hidden' name='object_type'>";
							$output .= "<input type='hidden' name='CategoriId'>";
							$output .= "<input type='hidden' name='CatName' value='".$setCategory->title."' readonly>";
							$output .= "<input type='hidden' name='CatURL' value='".$setCategory->friendly_url."' readonly>";
							$output .= "<input type='hidden' name='object_id'>";

							$output .= "<p class='cotizacion-text display-none'>¿Quiere editar el mensaje?</p>";
							$output .= "<textarea value='' name='body' class='gold4-message cotizacion-text-area display-none'> </textarea>";

							
							
							$output .= "<div class='buttons-container mt10'>";
								$output .= "<input id='goldenListing-submit' class='btn-cot' value='Enviar Cotización' type='button'>";
								$output .= "<input id='lightbox-close' value='Cerrar' type='button'>";
								$output .= "<script> $(document).on('click', '#lightbox-close', function(event) { event.preventDefault(); $('.fancybox-close').trigger('click'); });</script>";
							$output .= "</div>";
						$output .= "</div>";
					$output .= "</form>";
				$output .= "</div>";
			$output .= "</div>";
		$output .= "</div>";

		 }else{
		 	$output = "";
		$output .= "<div id='proveedores-oro' class='hidden'>";
			$output .= "<div class='gold4-box'>";
				$output .= "<div class='interes-info'>";
					// $output .= "<p id='goldListing-name' class='name-cotizacion'></p>";
					$output .= "<p class='cotizacion-text'>¡UPS! HAY UN PROBLEMA</p>";
					$output .= "<div id='cotizacion-border'><p class='cotizacion-msj'>Este proveedor no tiene activa la opción para recibir cotizaciones, te invitamos a que lo contactes a través de su número telefónico o lo visites en su punto de venta. <strong>Si lo deseas puedes cotizar con otros proveedores de la misma categoría haciendo clic en el botón verde.</strong></p></div>";
				$output .= "</div>";
				
				$output .= "<div class='provedor-container'>";
					$output .= "<form id='form-proveedores'>";
						$output .= "<div class='one-whole'>";

							$output .= "<div class='buttons-container mt10'>";
								$output .= "<a href='/guia/category/".$setCategory->friendly_url."' class='btn-cat'>Categoria</a>";
								$output .= "<input id='lightbox-close' value='Cerrar' type='button'>";
								$output .= "<script> $(document).on('click', '#lightbox-close', function(event) { event.preventDefault(); $('.fancybox-close').trigger('click'); });</script>";
							$output .= "</div>";
						$output .= "</div>";
					$output .= "</form>";
				$output .= "</div>";
			$output .= "</div>";
		$output .= "</div>";
		 }

		echo strtr($output,Yii::app()->params->unwanted_array);
	}
}
