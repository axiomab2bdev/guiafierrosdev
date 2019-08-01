<?php

/**
 * This is the model class for table "pmd_classifieds".
 *
 * The followings are the available columns in table 'pmd_classifieds':
 * @property string $id
 * @property string $listing_id
 * @property string $title
 * @property string $friendly_url
 * @property string $date
 * @property string $description
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $keywords
 * @property string $meta_description
 * @property string $price
 * @property string $expire_date
 * @property string $www
 * @property string $buttoncode
 */
class Classifieds extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_classifieds';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('listing_id, price', 'length', 'max'=>10),
			array('title, friendly_url, meta_title, www', 'length', 'max'=>255),
			array('date, description, meta_keywords, keywords, meta_description, expire_date, buttoncode', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, listing_id, title, friendly_url, date, description, meta_title, meta_keywords, keywords, meta_description, price, expire_date, www, buttoncode', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'friendly_url' => 'Friendly Url',
			'date' => 'Date',
			'description' => 'Description',
			'meta_title' => 'Meta Title',
			'meta_keywords' => 'Meta Keywords',
			'keywords' => 'Keywords',
			'meta_description' => 'Meta Description',
			'price' => 'Price',
			'expire_date' => 'Expire Date',
			'www' => 'Www',
			'buttoncode' => 'Buttoncode',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('friendly_url',$this->friendly_url,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('expire_date',$this->expire_date,true);
		$criteria->compare('www',$this->www,true);
		$criteria->compare('buttoncode',$this->buttoncode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Classifieds the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function searchAdvance($keyword,$location){
		
		$criteria = new CDbCriteria();
		/****************************************************************************************/
		/***Generar multiples palabras****/
		$piecesWord = explode(" ", $keyword);
		/***Generar consulta a Proveedores****/
		foreach($piecesWord as $valor){
			if(strlen($valor)>2){
			$criteria->addSearchCondition( 't.title', $valor, true, 'OR' );
			//$criteria->addSearchCondition( 't.keywords', $valor, true, 'OR' );
			}
		}
		$criteria->addSearchCondition( 't.title', $keyword, true, 'OR' );
		$criteria->addSearchCondition( 't.description', $keyword, true, 'OR' );
		$criteria->join='JOIN pmd_listings as tl ON (tl.id=t.listing_id)';
		$criteria->addSearchCondition( 'tl.status', 'active', true, 'AND' );
		// $criteria->addCondition('tl.template_file<>""','AND' );
		/***Filtro por ciudad****/
		if(!empty($location)){
		$criteria->addSearchCondition( 'tlo.friendly_url_path', $location, true, 'AND' );
		$criteria->join.=' INNER JOIN pmd_locations as tlo on tlo.id=tl.location_id';
		}
		/***Fin Filtro por ciudad****/
		$criteria->order = "IF(tl.template_file='','Z',tl.template_file) ";
			
		return $criteria;
	}
	
	/*	public function searchAdvance_sql2($keyword,$location){
		$keyword_url = preg_replace("/\s/", "-", $keyword);
		$sql="(SELECT * FROM pmd_classifieds
					WHERE title LIKE '%{$keyword}%'
					OR friendly_url LIKE '%{$keyword_url}%'
				)
				UNION (SELECT * FROM pmd_classifieds
					WHERE (description LIKE '%{$keyword}%'
							OR keywords LIKE '%{$keyword}'))
				UNION (SELECT * FROM pmd_classifieds
					WHERE (".$this->add_like_conditions('title',$keyword)."
					OR ".$this->add_like_conditions('friendly_url',$keyword).")
				)
				UNION (SELECT * FROM pmd_classifieds
					WHERE
						".$this->add_like_conditions('description',$keyword)."
			        OR ".$this->add_like_conditions('keywords',$keyword).")";

		$count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();

		return new CSqlDataProvider($sql, array(
			'id'=>'Classifieds',
			'totalItemCount' => $count,
		    'pagination'=>array(
		    	'pageVar' => 'Classifieds_page',
		        'pageSize'=>18,
		    ),
		));
	} */

	public function searchAdvance_sql2($keyword,$location){
		$keyword_url = preg_replace("/\s/", "-", $keyword);
		$sql="(SELECT c.id, c.listing_id, c.title, c.friendly_url, c.date, c.description, c.meta_title,  c.meta_keywords, c.keywords, c.meta_description, c.price, c.expire_date, c.www, c.buttoncode FROM `pmd_listings` AS l INNER join pmd_classifieds AS c on l.id = c.listing_id where l.template_file = 'listing_oro.tpl' and c.keywords like '%{$keyword}%' and status = 'active' ORDER by l.title
				)
			UNION (SELECT c.id, c.listing_id, c.title, c.friendly_url, c.date, c.description, c.meta_title,  c.meta_keywords, c.keywords, c.meta_description, c.price, c.expire_date, c.www, c.buttoncode FROM `pmd_listings` AS l INNER join pmd_classifieds AS c on l.id = c.listing_id where l.template_file = 'listing_oro.tpl' and c.title like '%{$keyword}%' and status = 'active' ORDER by l.title)
				UNION (SELECT * FROM pmd_classifieds
					WHERE (".$this->add_like_conditions('title',$keyword)."
					OR ".$this->add_like_conditions('friendly_url',$keyword).")
				)
				UNION (SELECT * FROM pmd_classifieds
					WHERE
						".$this->add_like_conditions('description',$keyword)."
			        OR ".$this->add_like_conditions('keywords',$keyword).")";

		$count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();

		return new CSqlDataProvider($sql, array(
			'id'=>'Classifieds',
			'totalItemCount' => $count,
		    'pagination'=>array(
		    	'pageVar' => 'Classifieds_page',
		        'pageSize'=>18,
		    ),
		));
	}

	private function add_like_conditions($field, $full_keyword){
		$keywords_parts = explode(" ", $full_keyword);
		$or_condition = '';
		$output = '(';
		foreach ($keywords_parts as $key => $keyword) {
			if(strlen($keyword)>2){
				$output .= "$or_condition $field LIKE '%$keyword%'";
				$or_condition = "OR";
			}
		}
		return $output . ')';
	}
	
	//strip tags not permited and style
	public function stripTags($str,$tagNone=false,$tagExtra = NULL){
		
		if($tagNone)
			$tags = '';
		else
			$tags = '<p><br><br /><img><a><b><strong><iframe><center><h1><h2>'.$tagExtra;
		
		$content=  strip_tags($str, $tags);
		$content=  preg_replace('/(<p.+?)style=".+?"(>.+?)/i', "$1$2", $content);
		$content=  str_replace('&nbsp;','',$content);
		
		return $content;
	}

		public function get_listing_parent(){
		$sql = "SELECT * FROM pmd_listings AS l
				WHERE l.id = ".$this->listing_id."
				LIMIT 1
				";
		$datos = Yii::app()->db->createCommand($sql)->queryAll();
		return $datos;
	}
	public function get_listing_parent_by_id($id){
		$sql = "SELECT * FROM pmd_listings AS l
				WHERE l.id = $id
				LIMIT 1
				";
		$datos = Yii::app()->db->createCommand($sql)->queryAll();
		return $datos;
	}
}
