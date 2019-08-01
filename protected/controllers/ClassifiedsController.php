<?php
require_once('protected/components/messageContactForm.php');
class ClassifiedsController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$listingForm= new ListingForm;
		$listings = Listings::model()->findByAttributes(array('id'=>$this->loadModel($id)->listing_id));
		if($listings->status != 'active'){
			$this->redirect(array('site/index'));			
		}else{
			$messages="";
			if(isset($_POST["ListingForm"])){
					$listingForm->attributes=$_POST['ListingForm'];
				if($listingForm->validate())
						{						
							$Nombre= strtr($listingForm->name,Yii::app()->params->unwanted_array);
							$Email= $listingForm->email;
							$Telefono.= $listingForm->phone;
							$Ciudad= strtr($listingForm->city,Yii::app()->params->unwanted_array);
							$Observaciones= strtr($listingForm->body,Yii::app()->params->unwanted_array);
							$Pagina= "classified/".$this->loadModel($id)->friendly_url."-".$this->loadModel($id)->id.".html"; 
							$Cliente= strtr($listings->title,Yii::app()->params->unwanted_array);
							$EmailCliente= $listings->mail;
							$EmailCliente2= $listings->custom_14;
							if($listings->phone!="")
							$TelefonoCliente= $listings->phone;
							elseif($listings->custom_5!="")
							$TelefonoCliente= $listings->custom_5;

							$send_full_information = $_POST['send_full_information'];
							$productName = $_POST['productName'];
							$productURL = $_POST['productURL'];
							
							
							$emaildeproveedor="";
							
							if($EmailCliente!=""){
								$emaildeproveedor.=",$EmailCliente";
							}
							if($EmailCliente2!=""){
								$emaildeproveedor.=",$EmailCliente2";	
							}
							
	
							$cabeceras= 'MIME-Version: 1.0' . "\r\n";
							$cabeceras.= 'Content-type: text/html; charset=utf-8' . "\r\n";
							$cabeceras.= 'From: Revista Fierros<fierros@fie.fierros.com.co>'."\r\n";
	
			
							// $formProveedor= formularioProveedor($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente);	
							
							$lead_id = $this->loadModel($id)->listing_id;
							$lead_info = $this->loadModel($id)->get_listing_parent_by_id($lead_id);
							$template_file = $lead_info[0]["template_file"];

							if ($template_file !="") {
								$formProveedor = formularioProducto_oro($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente,$ClienteTel,$EmailCliente,$productName,$productURL);
							}else{
								$formProveedor = formularioProducto_bronce($Nombre,$Email,$Telefono,$Ciudad,$Observaciones,$Pagina,$Cliente,$ClienteTel,$EmailCliente,$productName,$productURL,$send_full_information);
							}

							$formCliente=formularioCliente($Nombre,$Cliente,$Pagina, $EmailCliente, $TelefonoCliente);	
							$correosGuiaLaBarra=Yii::app()->params->listEmail.$emaildeproveedor;
										
							$title = 'Cotización Cliente -  '.Yii::app()->name.'!';		
							mail($correosGuiaLaBarra, '=?utf-8?B?'.base64_encode($title).'?=', $formProveedor, $cabeceras);
							
							if($Email!=""){

								if($template_file=="" && !$send_full_information){

									$categories = Categories::model()->findByAttributes(array('id'=>$listings->primary_category_id));
									$WebCliente = $this->loadModel($id)->www;
									
									$formCliente2=formularioCliente_infoRestringida($Nombre,$Cliente,$Pagina, $TelefonoCliente, $WebCliente, $categories->title,$categories->friendly_url);

									mail($Email,'Cotización - Guía de proveedores de ferreterias construcción eléctricos e industriales!', $formCliente2, $cabeceras);
								}else{
									mail($Email,'Cotización - Guía de proveedores de ferreterias construcción eléctricos e industriales!', $formCliente, $cabeceras);	
								}

								if(!isset($_POST['object_id']) || $_POST['object_id']=='')
										$_POST['object_id'] = $id;
								if(!isset($_POST['object_type']) || $_POST['object_type']=='')
									$_POST['object_type'] = 2;
								Yii::import("application.controllers.ApiController");
								
								Yii::import("application.controllers.ApiController");
								$apiController = new ApiController($id);
								$apiController->actionContactAnalityc($_POST);
							}

							$this->redirect(array('site/page/view/confirm', 'url' =>$this->loadModel($id)->friendly_url,'id' =>$this->loadModel($id)->id, 'category_id'=>$listingForm->CategoriId));
							
							
						}
			}
			
			$classifiedsDataProvider = new 
			CActiveDataProvider('ClassifiedsImages',
				array(
					'criteria'=> array(
						'condition'	=>'classified_id='.$id,
				
					),
				)
			);
			$listingsDataProvider = new 
			CActiveDataProvider('Classifieds',
				array(
					'criteria'=> array(
						'join' => 'join pmd_listings on pmd_listings.id=t.listing_id',
						'condition'=>'status="active"',
						'condition'	=>'listing_id='.$this->loadModel($id)->listing_id.' AND t.id<>'.$id,
				
					),
				)
			);
			
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				'classifiedsDataProvider'=>$classifiedsDataProvider,
				'listingsDataProvider'=>$listingsDataProvider,
				'listingForm'=>$listingForm,
				'resp5'=>$resp5,
			));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
		require_once('protected/views/listings/recaptchalib.php');
		$model=new Classifieds;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Classifieds']))
		{
			$model->attributes=$_POST['Classifieds'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Classifieds']))
		{
			$model->attributes=$_POST['Classifieds'];
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
			
		//Productos
		$dataProvider=new CActiveDataProvider('Classifieds', 
					array('criteria' => array(
						'join' => 'join pmd_listings on pmd_listings.id=t.listing_id',
						'condition'=>'status="active"',
						'condition'=>'template_file<>"" ORDER BY template_file ASC, rand()',
					),
					'pagination'=>array(
								'pageSize'=>12,
						),
				));
		
		//Categories
		$dataProviderCategories=Categories::model()->getCategories();
			
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
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'dataProviderCategories'=>$dataProviderCategories,
			'dataProviderBanners'=>$dataProviderBanners,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Classifieds('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Classifieds']))
			$model->attributes=$_GET['Classifieds'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Classifieds the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Classifieds::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Classifieds $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='classifieds-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

		public function build_4goldListingsForm($gold_listing, $setCategory, $product_name)	{
		if ($gold_listing != "") {
		$output = "";
		$output .= "<div id='proveedores-oro' class='hidden'>";
			$output .= "<div class='gold4-box'>";
				$output .= "<div class='interes-info'>";
					// $output .= "<p id='goldListing-name' class='name-cotizacion'></p>";
					// $output .= "<p class='cotizacion-text'>Estos proveedores también podrían tener el producto ";
					// $output .= "<span style='text-transform:uppercase'> \"$product_name\"</span>";
					// $output .=" que busca: </p>";
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
							
							$output .= "<input type='hidden' name='productName' value='".$product_name."' readonly>";
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
