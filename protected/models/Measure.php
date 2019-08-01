<?php

/**
 * This is the model class for table "pmd_measure".
 *
 * The followings are the available columns in table 'pmd_measure':
 * @property integer $id
 * @property integer $object_id
 * @property integer $object_type_id
 * @property integer $data_type_id
 * @property string $create_date
 * @property string $client_ip
 * @property string $url
 * @property string $url_origin
 * @property string $device
 * @property string $country_name
 * @property string $country_code
 * @property string $regionName
 * @property string $cityName
 * @property string $browser
 * @property string $os
 *
 * The followings are the available model relations:
 * @property ObjectType $objectType
 * @property DataType $dataType
 */
class Measure extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_measure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('object_id, object_type_id, data_type_id', 'numerical', 'integerOnly'=>true),
			array('client_ip, url, url_origin, device, country_name, regionName, cityName, browser, os', 'length', 'max'=>255),
			array('country_code', 'length', 'max'=>100),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, object_id, object_type_id, data_type_id, create_date, client_ip, url, url_origin, device, country_name, country_code, browser, os', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'objectType' => array(self::BELONGS_TO, 'ObjectType', 'object_type_id'),
			'dataType' => array(self::BELONGS_TO, 'DataType', 'data_type_id'),
			'Listings'=>array(self::BELONGS_TO, 'Listings', 'object_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'object_id' => 'Object',
			'object_type_id' => 'Object Type',
			'data_type_id' => 'Data Type',
			'create_date' => 'Create Date',
			'client_ip' => 'Client Ip',
			'url' => 'Url',
			'url_origin' => 'Url Origin',
			'device' => 'Device',
			'country_name' => 'Country Name',
			'country_code' => 'Country Code',
			'regionName' => 'Region Name',
			'cityName' => 'City Name',
			'browser' => 'Browser',
			'os' => 'Os',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		//$criteria->compare('object_id',$this->object_id);
		$criteria->compare('object_type_id',$this->object_type_id);
		$criteria->compare('data_type_id',$this->data_type_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('client_ip',$this->client_ip,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('url_origin',$this->url_origin,true);
		$criteria->compare('device',$this->device,true);
		$criteria->compare('country_name',$this->country_name,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('regionName',$this->regionName,true);
		$criteria->compare('cityName',$this->cityName,true);
		$criteria->compare('browser',$this->browser,true);
		$criteria->compare('os',$this->os,true);
			// se agrego el filtro por el usuario actual
		$idUsuario=Yii::app()->user->getId();
		$model = Listings::model()->finbyAttributes(array('user_id'=>$idUsuario));
		if($model->id!=""){
			$criteria->compare('object_id',$model->id);	
		}else{
			$criteria->compare('object_id',"Null");	
		}
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function isUserAllowed($user)
	{
		return($user->id==$this->id);	
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Measure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function dataToObjectFormatDate($data,$subData){
		/////data listing
		$data1 = '{type: "areaspline","name": "Proveedores", "data": [';
		foreach($data as $value){
					$data1 .= '[Date.UTC('.$value['year'].',  '.($value['month']-1).', '.$value['day'].'), '.(int)$value['cant'].' ],';
			}
		$data1 .= ']},';
		
		/////data classifieds
		$data2 = '{type: "areaspline","name": "Productos", "data": [';
		if(isset($subData))
		{
			foreach($subData as $value){
						$data2 .= '[Date.UTC('.$value['year'].',  '.($value['month']-1).', '.$value['day'].'), '.(int)$value['cant'].' ],';
			}
		}
		$data2 .= ']},';
		
		$object = $data1.$data2;
		//var_dump($object);
		return $object;
	}
	
	public function dataToObject($data,$subData){
		if($_POST['Date']){
			$from_date = date($_POST['Date']['from']);
			$to_date = date($_POST['Date']['to']);
			$daysFrom = date("d", strtotime($from_date));
			$daysTo = date("d", strtotime($to_date));
			$days = $daysTo-$daysFrom;
		}else{
			$daysFrom = 0;
			$a_date = date('Y-m-d');
			$daysTo = date("t", strtotime($a_date));
			$days = $daysTo-$daysFrom;
		}
		$object = '"name": "Visitas", "data": [';
		if($days<=0){
			$daysTo+=1;
		}
		//init values in zero
		$thisValue =array();
		for($i=($daysFrom); $i<$daysTo; $i++){
			$thisValue[$i] = 0;
		}
		//define values of listings
		for($i=($daysFrom); $i<$daysTo; $i++){
			$thisDay = 0;
			foreach($data as $value){
				$thisDay = $value['day'];
				if(($i) == ($thisDay-1)){
					$thisValue[$i] += (int)$value['cant'];
					break;
				}
			}
		}
		//define values of classifieds
		if(isset($subData) && $subData!=''){
			for($i=($daysFrom); $i<$daysTo; $i++){
				for($i=($daysFrom-1); $i<=$daysTo; $i++){
					$thisDay = 0;
					foreach($subData as $subValue){
						$thisDay = $subValue['day'];
						if(($i) == ($thisDay-1)){
							$thisValue[$i] += (int)$subValue['cant'];
							break;
						}
					}
				}
			}
		}
		//define object of graph
		foreach($thisValue as $value){
			$object .= $value.',';
		}
		
		$object .=']';
		//return object of graph

		return $object;
	}
	
	public function idChilds($id){
		
			
		$sql = "SELECT id FROM pmd_classifieds as t
				WHERE listing_id = ".$id;
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		//var_dump($dataProvider);exit(0);
		$idChilds = '';
		$i=0;
			foreach($dataProvider as $value){
				if($i!=0)
				{$idChilds.=',';}
				$idChilds.=$value['id'];
				$i++;
			}
		
		return $idChilds;		
	}
	
	public function coutnMeasureListing($id,$type,$dateFrom,$dateTo){
		if($type=='1'){
			//var_dump($id);
			$childs = $this->idChilds($id);
			if(isset($childs) && $childs!=''){
			$sql = "SELECT (COUNT(*)+(SELECT COUNT(*) FROM pmd_measure AS t
					WHERE object_id IN (".$childs.") AND object_type_id=2 AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id=3 )) 
					FROM pmd_measure AS t
					WHERE object_id IN (".$id.") AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id=3 AND object_type_id=".$type;
			}else{
				
			$sql = "SELECT COUNT(*) FROM pmd_measure AS t
					WHERE object_id =".$id." AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id=3 AND object_type_id=".$type;
			}
		}else{
			$sql = "SELECT COUNT(*) FROM pmd_measure AS t
				WHERE object_id IN (".$id.") AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id=3 AND object_type_id=".$type;
		}
		$idChilds = Yii::app()->db->createCommand($sql)->queryScalar();
		return $idChilds;		
	}
	
	public function coutnCountryListing($id,$type,$dateFrom,$dateTo){
		if($type==1){
			$childs = $this->idChilds($id);
			if(isset($childs) && $childs!=''){
			$sql = "SELECT (COUNT(DISTINCT(country_code))+(SELECT COUNT(DISTINCT(country_code))FROM pmd_measure AS t
					WHERE object_id IN (".$childs.") AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id=3 AND object_type_id=2)) 
					FROM pmd_measure AS t
					WHERE object_id IN (".$id.") AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id=3 AND object_type_id=".$type;
			}else{
	
			$sql = "SELECT COUNT(DISTINCT(country_code)) FROM pmd_measure AS t
					WHERE object_id = ".$id." AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' ) AND data_type_id=3 AND object_type_id=".$type;
			}
		}else{
			$sql = "SELECT COUNT(DISTINCT(country_code)) FROM pmd_measure AS t
				WHERE object_id IN (".$id." AND create_date>= DATE_FORMAT('".$dateFrom." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND create_date<= DATE_FORMAT('".$dateTo." 23:59:59',  '%Y-%m-%d %H:%i:%s' )) AND data_type_id=3 AND object_type_id=".$type;
		}
		$idChilds = Yii::app()->db->createCommand($sql)->queryScalar();
		
		return $idChilds;		
	}
	
	public function idChildsMeasure($id){
		$sql = "SELECT id FROM pmd_classifieds as t
				WHERE listing_id = ".$id;
		$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
		$idChilds = ''; $cont=0;
		if(count($dataProvider) >0){
			foreach($dataProvider as $value){
				if($cont!=0)
				$idChilds .= ',';
				$idChilds .= $value['id'];
				$cont++;
			}
		}else{
			$idChilds = NULL;	
		}
		return $idChilds;		
	}
	
	public function getSubMeasures($id){
		$dateStart = MeasureController::startDateRang();
		$dateEnd = MeasureController::endDateRang();
		$object = $this->idChildsMeasure($id);
		//svar_dump($object);
		if(isset($object) && $object!=''){
			$sql = "SELECT t.id, t.url, COUNT(t.object_id) AS cantVisit, dt.name, t.country_code FROM `pmd_measure` `t` 
					INNER JOIN pmd_data_type AS dt ON(dt.id=t.data_type_id)
					WHERE `create_date`>= DATE_FORMAT('".$dateStart." 00:00:00',  '%Y-%m-%d %H:%i:%s' ) 
					AND `create_date`<= DATE_FORMAT( DATE_ADD('".$dateEnd." 23:59:59',INTERVAL 30 DAY),  '%Y-%m-%d %H:%i:%s'' ) 
					AND object_id IN (".$object.")
					AND object_type_id IN (1) AND data_type_id IN (3) 
					AND url <> 'http://www.fierros.com.co/guia/listings'
					GROUP BY object_id";
			$dataProvider = Yii::app()->db->createCommand($sql)->queryAll();
			return $dataProvider;
		}
		
	}
}
