<?php

/**
 * This is the model class for table "pmd_contact".
 *
 * The followings are the available columns in table 'pmd_contact':
 * @property integer $id
 * @property integer $lead_id
 * @property integer $object_id
 * @property integer $object_type_id
 * @property integer $status_id
 * @property integer $data_type_id
 * @property string $create_date
 * @property string $body
 * @property string $location
 * @property string $origin_url
 *
 * The followings are the available model relations:
 * @property DataType $dataType
 * @property Lead $lead
 * @property ObjectType $objectType
 * @property Status $status
 */
class Contact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lead_id, object_id, object_type_id, status_id, data_type_id', 'numerical', 'integerOnly'=>true),
			array('location, origin_url', 'length', 'max'=>255),
			array('create_date,body', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lead_id, object_id, object_type_id, status_id, data_type_id, create_date, body, location, origin_url', 'safe', 'on'=>'search'),
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
			'dataType' => array(self::BELONGS_TO, 'DataType', 'data_type_id'),
			'lead' => array(self::BELONGS_TO, 'Lead', 'lead_id'),
			'objectType' => array(self::BELONGS_TO, 'ObjectType', 'object_type_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lead_id' => 'Lead',
			'object_id' => 'Object',
			'object_type_id' => 'Object Type',
			'status_id' => 'Status',
			'data_type_id' => 'Data Type',
			'create_date' => 'Create Date',
			'body' => 'Body',
			'location' => 'Location',
			'origin_url' => 'Origin Url',
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
		$criteria->compare('lead_id',$this->lead_id);
		$criteria->compare('object_id',$this->object_id);
		$criteria->compare('object_type_id',$this->object_type_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('data_type_id',$this->data_type_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('origin_url',$this->origin_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
