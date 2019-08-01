<?php

class MeasureController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $idUsuario ='';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		$this->idUsuario =  Yii::app()->user->getId();
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
				'actions'=>array('create','update','index','view'),
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
		$model=new Measure;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Measure']))
		{
			$model->attributes=$_POST['Measure'];
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

		if(isset($_POST['Measure']))
		{
			$model->attributes=$_POST['Measure'];
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
	 
	 public function startDateRang(){
		 if(isset($_POST['Date']) && $_POST['Date']['from'] != '' && isset($_POST['reset'])){
			 return $_POST['Date']['from'];
		 }else{
			return date('Y-m').'-01'; 
		 }
	 }
	 public function endDateRang(){
		 if(isset($_POST['Date']) && $_POST['Date']['to'] != '' && isset($_POST['reset'])){
			 return $_POST['Date']['to'];
		 }else{
			return date('Y-m')."-".date('t');
		 }
	 }
	
	public function detailObjectId($objectId){
		$objectIdChilds=Measure::model()->idChildsMeasure($objectId);
		$condition.='AND t.object_id IN ('.$objectId;
		if(isset($objectIdChilds) && $objectIdChilds!='')
		{$condition.=','.$objectIdChilds.')';}
		else
		{$condition.=')';}	
		return $condition;
	}
	
	public function detailObjectIdCountry($objectId){
		$objectIdChilds=Measure::model()->idChildsMeasure($objectId);
		$condition.='AND st.object_id IN (';
		
		if(isset($objectIdChilds) && $objectIdChilds!='')
		{$condition.=$objectIdChilds.')';}
		else
		{$condition=NULL;}	
		return $condition;
	}
	 
	 public function graphMeasures(){
		$dateStart = $this->startDateRang();
		$dateEnd = $this->endDateRang();
		$listingForm= new ListingForm;
	    $idListing = $this->objectListingId($idUsuario);
		
		if(isset($_POST['object_id_search']))
			$object_id_search=" AND object_id IN(".$_POST['object_id_search'].")";	
		else if($this->objectListingId()!='')
			$object_id_search=" AND object_id IN(".$this->objectListingId().")";
	
		$sql.= "SELECT DATE_FORMAT( create_date,'%Y' ) as year, DATE_FORMAT( create_date,'%m' ) as month, DATE_FORMAT( create_date,'%d' ) as day, count(*) as cant FROM pmd_measure as t WHERE `create_date`>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) AND `create_date`<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id IN (3) AND object_type_id IN(1) ".$object_id_search;	
		$sql.="GROUP BY DATE_FORMAT( create_date,'%Y-%m-%d' )";
		$count = Yii::app()->db->createCommand($sql)->queryAll();
		return $count; 
	 }
	 
	 public function graphSubMeasures(){
		if(isset($_POST['object_id_search'])){
			$dateStart = $this->startDateRang();
			$dateEnd = $this->endDateRang();
			$idListing = $this->objectListingId($idUsuario);
			
			$conditionCountry = $this->detailObjectIdCountry($_POST['object_id_search']);
			
			if(isset($_POST['object_id_search']))
				if(isset($conditionCountry))/*!='AND st.object_id IN ()'*/
				$object_id_search=$conditionCountry;	
			else if($this->objectListingId()!='')
				$object_id_search=" AND object_id IN(".$this->objectListingId().")";
		
			$sql.= "SELECT DATE_FORMAT( create_date,'%Y' ) as year, DATE_FORMAT( create_date,'%m' ) as month, DATE_FORMAT( create_date,'%d' ) as day, count(*) as cant FROM `pmd_measure` as st WHERE `create_date`>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) AND `create_date`<= DATE_FORMAT( '".(string)$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id IN (3) AND object_type_id IN(2)".$object_id_search;
			if($conditionCountry){
				if(isset($conditionCountry))	/*!='AND st.object_id IN ()'*/
				$sql.="GROUP BY DATE_FORMAT( create_date,'%Y-%m-%d' )";
			}
			if(isset($conditionCountry))/*!='AND st.object_id IN ()'*/
			$count = Yii::app()->db->createCommand($sql)->queryAll();
			//var_dump($count);exit();
			return $count; 
		}else{
			$dateStart = $this->startDateRang();
			$dateEnd = $this->endDateRang();
			$idListing = $this->objectListingId($idUsuario);
			if($this->objectListingId())
			$object_id_search = " AND object_id IN(".$this->objectclassifiedsId(array($this->objectListingId())).")";
			
			$sql.= "SELECT DATE_FORMAT( create_date,'%Y' ) as year, DATE_FORMAT( create_date,'%m' ) as month, DATE_FORMAT( create_date,'%d' ) as day, count(*) as cant FROM `pmd_measure` as st WHERE `create_date`>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) AND `create_date`<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id IN (3) AND object_type_id IN(2) ".$object_id_search;	
			if($object_id_search!=' AND object_id IN()'){
			$sql.="GROUP BY DATE_FORMAT( create_date,'%Y-%m-%d' )";
			$count = Yii::app()->db->createCommand($sql)->queryAll();
			}
			return $count; 
		}
	 }
	 
	 public function VisitMeasures(){
		$dateStart = $this->startDateRang();
		$dateEnd = $this->endDateRang();
		if(isset($_POST['object_id_search'])){
			$object_id_search=$this->detailObjectId($_POST['object_id_search']);
			$objectTypeCondition = 'AND object_type_id IN (2)';
		}else{
			if($this->objectListingId()!='')$object_id_search=" AND object_id IN(".$this->objectListingId().")";
			$objectTypeCondition = 'AND object_type_id IN (1)';
		}	
		
			
		$listingForm= new ListingForm;
	    $idListing = $this->objectListingId();
		
		//$listings = Listings::model()->findByAttributes(array('id'=>$this->loadModel($id)->listing_id))		


		$sql.= "SELECT t.id, t.url, object_id, dt.name, t.country_code, object_type_id FROM `pmd_measure` `t` 
				INNER JOIN pmd_data_type AS dt ON(dt.id=t.data_type_id)
				WHERE `create_date`>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND `create_date`<= DATE_FORMAT( DATE_ADD('".$dateEnd." 23:59:59',INTERVAL 30 DAY),  '%Y-%m-%d %H:%i:%s' ) 
				".$objectTypeCondition." AND data_type_id IN (3) ".$object_id_search;
				/*if($idListing!="" && !$object_id_search){
				  $sql.= " AND object_id IN(".$idListing.")";
				}	*/			
				$sql.= " AND url <> 'http://www.revistaialimentos.com.co/guia/listings'";
				$sql.= " GROUP BY object_id";
	
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		return $dataProvider;
	 }
	 
	public function objectListingId(){
		$sql = "SELECT id FROM pmd_listings as t
				WHERE user_id = ".$this->idUsuario;
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		$idChilds = ''; $cont=0;
		foreach($dataProvider as $value){
			if($cont!=0)
			$idChilds .= ',';
			$idChilds .= $value['id'];
			$cont++;
		}
		return $idChilds;
	}
	
	public function objectclassifiedsId($data){
		foreach($data as $item){
			$sql = "SELECT id FROM pmd_classifieds as t
					WHERE listing_id IN( ".$item.")";
			$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
			$idChilds = ''; $cont=0;
			foreach($dataProvider as $value){
				if($cont!=0)
				$idChilds .= ',';
				$idChilds .= $value['id'];
				$cont++;
			}
		}
		return $idChilds;
	}
	 
	public function VisitCountries(){
	
		$dateStart = $this->startDateRang();
		$dateEnd = $this->endDateRang();
		if(isset($_REQUEST['object_id_search'])){
			$object_id_searchCountry=$this->detailObjectIdCountry($_REQUEST['object_id_search']);
			$generalCondition = " AND object_id IN(".$_REQUEST['object_id_search'].")";
		}else if($this->objectListingId()!=''){
			$generalCondition=" AND object_id IN(".$this->objectListingId().")";
			$childs = $this->objectclassifiedsId(array($this->objectListingId()));
			if($childs != '')
			$object_id_searchCountry = " AND object_id IN(".$childs.")";	
		}
		/*if(isset($_POST['object_id_search'])){
			$object_id_searchCountry = $this->detailObjectIdCountry($_POST['object_id_search']);
			$generalCondition = " AND object_id IN(".$_POST['object_id_search'].")";
		}*/
		
		$objectTypeCondition = 'AND t.object_type_id IN (1)';
		$objectTypeSubCondition = 'AND st.object_type_id IN (2)';
		
				
		$sql ="SELECT (count(`country_code`)) as measures, 
				t.country_name, ot.name FROM `pmd_measure` as t
				inner join pmd_object_type as ot ON(ot.id=t.object_type_id)
				WHERE t.create_date>= 	DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND t.create_date<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) 
				".$objectTypeCondition.$generalCondition." AND data_type_id =3 AND url <> 'http://www.revistaialimentos.com.co/guia/listings'
				GROUP BY country_code";
			
				$sql .=" UNION
				SELECT count(st.country_code), st.country_name, ot.name  FROM `pmd_measure` as st
				inner join pmd_object_type as ot ON(ot.id=st.object_type_id)
				WHERE st.create_date>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND st.create_date<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' )  
				".$objectTypeSubCondition.$object_id_searchCountry." AND data_type_id =3 
				AND url <> 'http://www.revistaialimentos.com.co/guia/listings' 
				GROUP BY country_code  ORDER BY measures DESC";
			
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		return $dataProvider;
			
	}
	
	public function VisitRegions(){
	
		$dateStart = $this->startDateRang();
		$dateEnd = $this->endDateRang();
		if(isset($_POST['object_id_search'])){
			$object_id_searchCountry=$this->detailObjectIdCountry($_POST['object_id_search']);
			$generalCondition = " AND object_id IN(".$_POST['object_id_search'].")";
		}else if($this->objectListingId()!=''){
			$generalCondition=" AND object_id IN(".$this->objectListingId().")";
			$object_id_searchCountry = " AND object_id IN(".$this->objectclassifiedsId(array($this->objectListingId())).")";	
		}
		/*if(isset($_POST['object_id_search'])){
			$object_id_searchCountry = $this->detailObjectIdCountry($_POST['object_id_search']);
			$generalCondition = " AND object_id IN(".$_POST['object_id_search'].")";
		}*/
		
		$objectTypeCondition = 'AND t.object_type_id IN (1)';
		$objectTypeSubCondition = 'AND st.object_type_id IN (2)';
		
				
		$sql ="SELECT (count(regionName)) as measures, 
				t.regionName, ot.name FROM `pmd_measure` as t
				inner join pmd_object_type as ot ON(ot.id=t.object_type_id)
				WHERE t.create_date>= 	DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND t.create_date<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) 
				".$objectTypeCondition.$generalCondition." AND data_type_id =3 AND url <> 'http://www.revistaialimentos.com.co/guia/listings'
				GROUP BY regionName";
			
				$sql .=" UNION
				SELECT count(st.country_code), st.regionName, ot.name  FROM `pmd_measure` as st
				inner join pmd_object_type as ot ON(ot.id=st.object_type_id)
				WHERE st.create_date>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND st.create_date<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' )  
				".$objectTypeSubCondition.$object_id_searchCountry." AND data_type_id =3 
				AND url <> 'http://www.revistaialimentos.com.co/guia/listings' 
				GROUP BY regionName  ORDER BY measures DESC";
			
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		return $dataProvider;
			
	}
	
	public function VisitCities(){
	
		$dateStart = $this->startDateRang();
		$dateEnd = $this->endDateRang();
		if(isset($_POST['object_id_search'])){
			$object_id_searchCountry=$this->detailObjectIdCountry($_POST['object_id_search']);
			$generalCondition = " AND object_id IN(".$_POST['object_id_search'].")";
		}else if($this->objectListingId()!=''){
			$generalCondition=" AND object_id IN(".$this->objectListingId().")";
			$object_id_searchCountry = " AND object_id IN(".$this->objectclassifiedsId(array($this->objectListingId())).")";	
		}
		/*if(isset($_POST['object_id_search'])){
			$object_id_searchCountry = $this->detailObjectIdCountry($_POST['object_id_search']);
			$generalCondition = " AND object_id IN(".$_POST['object_id_search'].")";
		}*/
		
		$objectTypeCondition = 'AND t.object_type_id IN (1)';
		$objectTypeSubCondition = 'AND st.object_type_id IN (2)';
		
				
		$sql ="SELECT (count(cityName)) as measures, 
				t.cityName, ot.name FROM `pmd_measure` as t
				inner join pmd_object_type as ot ON(ot.id=t.object_type_id)
				WHERE t.create_date>= 	DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND t.create_date<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) 
				".$objectTypeCondition.$generalCondition." AND data_type_id =3 AND url <> 'http://www.revistaialimentos.com.co/guia/listings'
				GROUP BY cityName";
			
				$sql .=" UNION
				SELECT count(st.cityName), st.cityName, ot.name  FROM `pmd_measure` as st
				inner join pmd_object_type as ot ON(ot.id=st.object_type_id)
				WHERE st.create_date>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND st.create_date<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' )  
				".$objectTypeSubCondition.$object_id_searchCountry." AND data_type_id =3 
				AND url <> 'http://www.revistaialimentos.com.co/guia/listings' 
				GROUP BY cityName  ORDER BY measures DESC";
			
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		return $dataProvider;
			
	}
	
	public function countClik(){
		
		$dateStart = $this->startDateRang();
		$dateEnd = $this->endDateRang();
		if(isset($_POST['object_id_search']))
		$object_id_search=" AND object_id IN(".$_POST['object_id_search'].")";
		else if($this->objectListingId()!='')
		$object_id_search=" AND object_id IN(".$this->objectListingId().")";

		
		$sql = "SELECT count(`data_type_id`) as measures, name  FROM `pmd_measure` as t 
				INNER JOIN pmd_data_type AS dt ON(dt.id=t.data_type_id) 
				WHERE `create_date`>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
				AND `create_date`<= DATE_FORMAT( '".$dateEnd." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) 
				AND object_type_id IN (1) AND data_type_id IN (1,2,7) ".$object_id_search;				
				$sql.= "AND url <> 'http://www.revistaialimentos.com.co/guia/listings'
				GROUP BY `data_type_id` ORDER BY measures DESC";
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		return $dataProvider;
		
	}
	
	public function actionIndex()
	{
		$objectGraph = $this->graphMeasures();
		
		$objectSubGraph = $this->graphSubMeasures();
		
		$dataProvider= $this->VisitMeasures();
		
		$dataProviderCountry = $this->VisitCountries();
		
		$dataProviderRegion = $this->VisitRegions();
		
		$dataProviderCity = $this->VisitCities();
		
		$dataProviderClick = $this->countClik();
		
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'objectGraph'=>$objectGraph,
			'objectSubGraph'=>$objectSubGraph,
			'dataProviderCountry'=>$dataProviderCountry,
			'dataProviderRegion'=>$dataProviderRegion,	
			'dataProviderCity'=>$dataProviderCity,		
			'dataProviderClick'=>$dataProviderClick,
			'dataProviderUser'=>$dataProviderUser,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Measure('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Measure']))
			$model->attributes=$_GET['Measure'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Measure the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Measure::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Measure $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='measure-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
