<?php

/**
 * This is the model class for table "pmd_banners".
 *
 * The followings are the available columns in table 'pmd_banners':
 * @property string $id
 * @property string $listing_id
 * @property integer $type_id
 * @property string $title
 * @property string $status
 * @property string $url
 * @property string $target
 * @property string $alt_text
 * @property string $code
 * @property string $extension
 * @property string $clicks
 * @property string $impressions
 * @property string $date_last_displayed
 */
class Banners extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_banners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id', 'numerical', 'integerOnly'=>true),
			array('listing_id, clicks, impressions', 'length', 'max'=>10),
			array('title, alt_text', 'length', 'max'=>255),
			array('status, target', 'length', 'max'=>15),
			array('extension', 'length', 'max'=>55),
			array('url, code, date_last_displayed', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, listing_id, type_id, title, status, url, target, alt_text, code, extension, clicks, impressions, date_last_displayed', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'listing_id' => 'Listing',
			'type_id' => 'Type',
			'title' => 'Title',
			'status' => 'Status',
			'url' => 'Url',
			'target' => 'Target',
			'alt_text' => 'Alt Text',
			'code' => 'Code',
			'extension' => 'Extension',
			'clicks' => 'Clicks',
			'impressions' => 'Impressions',
			'date_last_displayed' => 'Date Last Displayed',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('listing_id',$this->listing_id,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('alt_text',$this->alt_text,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('clicks',$this->clicks,true);
		$criteria->compare('impressions',$this->impressions,true);
		$criteria->compare('date_last_displayed',$this->date_last_displayed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Banners the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
