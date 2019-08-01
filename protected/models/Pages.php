<?php

/**
 * This is the model class for table "pmd_pages".
 *
 * The followings are the available columns in table 'pmd_pages':
 * @property integer $id
 * @property integer $active
 * @property string $title
 * @property string $content
 * @property string $friendly_url
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $header_template_file
 * @property string $footer_template_file
 * @property string $wrapper_template_file
 */
class Pages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('title, friendly_url, meta_title', 'length', 'max'=>255),
			array('header_template_file, footer_template_file, wrapper_template_file', 'length', 'max'=>75),
			array('meta_description, meta_keywords', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, active, title, content, friendly_url, meta_title, meta_description, meta_keywords, header_template_file, footer_template_file, wrapper_template_file', 'safe', 'on'=>'search'),
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
			'active' => 'Active',
			'title' => 'Title',
			'content' => 'Content',
			'friendly_url' => 'Friendly Url',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'header_template_file' => 'Header Template File',
			'footer_template_file' => 'Footer Template File',
			'wrapper_template_file' => 'Wrapper Template File',
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
		$criteria->compare('active',$this->active);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('friendly_url',$this->friendly_url,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('header_template_file',$this->header_template_file,true);
		$criteria->compare('footer_template_file',$this->footer_template_file,true);
		$criteria->compare('wrapper_template_file',$this->wrapper_template_file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
