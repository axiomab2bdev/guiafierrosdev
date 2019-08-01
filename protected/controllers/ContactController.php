<?php

class ContactController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $idUsuario = '';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		$this->idUsuario = Yii::app()->user->getId();
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
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','export','exportcontact'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view','export','exportcontact'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Contact;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
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

		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
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
		$objectId = $this->objectListingId();
		if(isset($this->idUsuario) && isset($objectId))
		$condition = $this->objectListingId();	
		$dataProvider=new CActiveDataProvider('Contact',array(
				'criteria'=> array(
					'condition'=>$condition,
					'order'=>' create_date DESC',
				),
			  'pagination'=>array(
				  'pageSize'=>'100'
			  ),
			));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionExport()
	{
		if(isset($_POST['Date']['range']) && $_POST['Date']['range']!=''){
			$objectId = $this->objectListingId();
			if(isset($this->idUsuario) && isset($objectId))
			if($this->objectListingId()!='')
			$condition = '  AND '.$this->objectListingId();
			$sql = "SELECT * FROM pmd_lead as t INNER JOIN pmd_contact as m ON(m.lead_id=t.id) WHERE  m.data_type_id <> 8 AND t.create_date LIKE '".$_POST['Date']['range']."%' ".$condition." ORDER BY name ASC";
			$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
			$this->render('export',array(
				'dataProvider'=>$dataProvider,
				'date'=>$_POST['Date']['range'],
			));
		}
		echo '<script>alert("Seleccione una fecha");window.close();</script>';
		exit(0);	
	}
	
	public function actionExportContact()
	{
		if(isset($_POST['Date']['range']) && $_POST['Date']['range']!=''){
			$objectId = $this->objectListingId();
			if(isset($this->idUsuario) && isset($objectId))
			if($this->objectListingId()!='')
			$condition = ' AND '.$this->objectListingId();
			
			$sql = "SELECT  t.*, l.*, dt.name as data_type FROM pmd_contact as t JOIN pmd_data_type as dt ON(dt.id = t.data_type_id) INNER JOIN pmd_lead as l ON(t.lead_id=l.id) WHERE t.data_type_id <> 8 AND t.create_date LIKE '".$_POST['Date']['range']."%'  ".$condition." ORDER BY name ASC";
			$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
			
			$this->render('exportContact',array(
				'dataProvider'=>$dataProvider,
				'date'=>$_POST['Date']['range'],
			));
			

		}
		echo '<script>alert("Seleccione una fecha");window.close();</script>';
		exit(0);
	}
	
	public function objectListingId(){
		$sql = "SELECT id FROM pmd_listings as t
				WHERE  user_id = ".$this->idUsuario;
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		$idChilds = ''; $cont=0;
		foreach($dataProvider as $value){
			if($cont!=0)
			$idChilds .= ',';
			$idChilds .= $value['id'];
			$cont++;
		}
		if(isset($idChilds) && $idChilds!='')
		return "  data_type_id <> 8 AND  object_id IN(".$idChilds.")";
		else
		return '  data_type_id <> 8';
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Contact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Contact']))
			$model->attributes=$_GET['Contact'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Contact the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Contact::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Contact $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
