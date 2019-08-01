<?php

/**
 * This is the model class for table "pmd_blog".
 *
 * The followings are the available columns in table 'pmd_blog':
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property string $friendly_url
 * @property string $content_short
 * @property string $content
 * @property string $date
 * @property string $date_updated
 * @property string $date_publish
 * @property string $status
 * @property string $impressions
 * @property string $keywords
 * @property string $image_extension
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, title, friendly_url, content, date, date_updated, date_publish, status, impressions, image_extension, meta_title', 'required'),
			array('user_id, impressions', 'length', 'max'=>10),
			array('title, friendly_url, meta_title', 'length', 'max'=>255),
			array('status', 'length', 'max'=>15),
			array('image_extension', 'length', 'max'=>4),
			array('content_short, keywords, meta_description, meta_keywords', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, friendly_url, content_short, content, date, date_updated, date_publish, status, impressions, keywords, image_extension, meta_title, meta_description, meta_keywords', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'title' => 'Title',
			'friendly_url' => 'Friendly Url',
			'content_short' => 'Content Short',
			'content' => 'Content',
			'date' => 'Date',
			'date_updated' => 'Date Updated',
			'date_publish' => 'Date Publish',
			'status' => 'Status',
			'impressions' => 'Impressions',
			'keywords' => 'Keywords',
			'image_extension' => 'Image Extension',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('friendly_url',$this->friendly_url,true);
		$criteria->compare('content_short',$this->content_short,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('date_updated',$this->date_updated,true);
		$criteria->compare('date_publish',$this->date_publish,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('impressions',$this->impressions,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('image_extension',$this->image_extension,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function searchAdvance($keyword){
		
		$criteria = new CDbCriteria();
		/****************************************************************************************/
		/***Generar multiples palabras****/
		$piecesWord = explode(" ", $keyword);
		/***Generar consulta a News****/
		foreach($piecesWord as $valor){
			if(strlen($valor)>3){
			$criteria->addSearchCondition( 't.title', $valor, true, 'OR' );
			$criteria->addSearchCondition( 't.content', $valor, true, 'OR' );
			$criteria->addSearchCondition( 't.keywords', $valor, true, 'OR' );}
		}
		$criteria->addSearchCondition( 't.title', $keyword, true, 'OR' );
		$criteria->addSearchCondition( 't.content', $keyword, true, 'OR' );
		$criteria->addSearchCondition( 't.status', 'active', true, 'AND' );
		$criteria->order="t.date_publish ASC";
			
		return $criteria;
	}
}
