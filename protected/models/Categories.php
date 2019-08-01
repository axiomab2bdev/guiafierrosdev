<?php

/**
 * This is the model class for table "pmd_categories".
 *
 * The followings are the available columns in table 'pmd_categories':
 * @property string $id
 * @property string $title
 * @property string $description_short
 * @property string $description
 * @property string $keywords
 * @property string $friendly_url
 * @property string $friendly_url_path
 * @property string $friendly_url_path_hash
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $link
 * @property string $small_image_url
 * @property string $large_image_url
 * @property integer $hidden
 * @property integer $closed
 * @property integer $no_follow
 * @property integer $display_columns
 * @property string $count
 * @property string $count_total
 * @property integer $level
 * @property integer $left_
 * @property integer $right_
 * @property string $parent_id
 * @property string $impressions
 * @property string $ip
 * @property integer $import_id
 * @property string $header_template_file
 * @property string $footer_template_file
 * @property string $wrapper_template_file
 * @property string $results_template_file
 * @property string $child_row_id
 * @property string $impressions_search
 * @property integer $hits
 * @property integer $columns
 */
class Categories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hits, columns', 'required'),
			array('hidden, closed, no_follow, display_columns, level, left_, right_, import_id, hits, columns', 'numerical', 'integerOnly'=>true),
			array('title, friendly_url, meta_title, link, small_image_url, large_image_url', 'length', 'max'=>255),
			array('friendly_url_path_hash', 'length', 'max'=>32),
			array('count, count_total, parent_id, impressions, child_row_id, impressions_search', 'length', 'max'=>10),
			array('ip', 'length', 'max'=>15),
			array('header_template_file, footer_template_file, wrapper_template_file, results_template_file', 'length', 'max'=>75),
			array('description_short, description, keywords, friendly_url_path, meta_description, meta_keywords', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description_short, description, keywords, friendly_url, friendly_url_path, friendly_url_path_hash, meta_title, meta_description, meta_keywords, link, small_image_url, large_image_url, hidden, closed, no_follow, display_columns, count, count_total, level, left_, right_, parent_id, impressions, ip, import_id, header_template_file, footer_template_file, wrapper_template_file, results_template_file, child_row_id, impressions_search, hits, columns', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'description_short' => 'Description Short',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'friendly_url' => 'Friendly Url',
			'friendly_url_path' => 'Friendly Url Path',
			'friendly_url_path_hash' => 'Friendly Url Path Hash',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'link' => 'Link',
			'small_image_url' => 'Small Image Url',
			'large_image_url' => 'Large Image Url',
			'hidden' => 'Hidden',
			'closed' => 'Closed',
			'no_follow' => 'No Follow',
			'display_columns' => 'Display Columns',
			'count' => 'Count',
			'count_total' => 'Count Total',
			'level' => 'Level',
			'left_' => 'Left',
			'right_' => 'Right',
			'parent_id' => 'Parent',
			'impressions' => 'Impressions',
			'ip' => 'Ip',
			'import_id' => 'Import',
			'header_template_file' => 'Header Template File',
			'footer_template_file' => 'Footer Template File',
			'wrapper_template_file' => 'Wrapper Template File',
			'results_template_file' => 'Results Template File',
			'child_row_id' => 'Child Row',
			'impressions_search' => 'Impressions Search',
			'hits' => 'Hits',
			'columns' => 'Columns',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description_short',$this->description_short,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('friendly_url',$this->friendly_url,true);
		$criteria->compare('friendly_url_path',$this->friendly_url_path,true);
		$criteria->compare('friendly_url_path_hash',$this->friendly_url_path_hash,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('small_image_url',$this->small_image_url,true);
		$criteria->compare('large_image_url',$this->large_image_url,true);
		$criteria->compare('hidden',$this->hidden);
		$criteria->compare('closed',$this->closed);
		$criteria->compare('no_follow',$this->no_follow);
		$criteria->compare('display_columns',$this->display_columns);
		$criteria->compare('count',$this->count,true);
		$criteria->compare('count_total',$this->count_total,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('left_',$this->left_);
		$criteria->compare('right_',$this->right_);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('impressions',$this->impressions,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('import_id',$this->import_id);
		$criteria->compare('header_template_file',$this->header_template_file,true);
		$criteria->compare('footer_template_file',$this->footer_template_file,true);
		$criteria->compare('wrapper_template_file',$this->wrapper_template_file,true);
		$criteria->compare('results_template_file',$this->results_template_file,true);
		$criteria->compare('child_row_id',$this->child_row_id,true);
		$criteria->compare('impressions_search',$this->impressions_search,true);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('columns',$this->columns);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getCategoriesEdiciones()
	{
		
		$criteria=new CDbCriteria(array(  
								'distinct'=>true,                  
								'order'=>'title asc',
								'condition'=>'parent_id=1 AND id<>1',
						));
							
		return new CActiveDataProvider('Categories', array(
				'criteria'=>$criteria,
				'pagination'=>array(
							'pageSize'=>50,
					),
				));	
	}
	
	public function getCategoriesEdicionesFooter()
	{
		
		$criteria=new CDbCriteria(array(  
								'distinct'=>true,                  
								'order'=>'rand()',
								'condition'=>'parent_id=1 AND id<>1',
								'limit'=>10,
						));
							
		return new CActiveDataProvider('Categories', array(
				'criteria'=>$criteria,
				'pagination'=>array(
							'pageSize'=>10,
					),
				));	
	}
	
	public function getCategories()
	{
		
		$criteria=new CDbCriteria(array(                    
								'order'=>'title asc',
								'condition'=>'parent_id=1 AND id<>1',
						));
							
		return new CActiveDataProvider('Categories', array(
				'criteria'=>$criteria,
				'pagination'=>array(
							'pageSize'=>50,
					),
				));	
	}
	
	public function getListingSubcategories($cid){
		$model = Categories::model()->findAllByAttributes(array('parent_id'=>$cid));
		$ids = '';
		$ids=$cid;
		//var_dump($model);
		if(!is_null($model))
		foreach($model as $item){
			$ids.=', '.$item['id'];	
		}
		return $ids;
	}
	public function getCountByCategoryId($cid){
		$sql = 'SELECT COUNT(*) as "cant" FROM pmd_listings WHERE  status="active" AND primary_category_id IN ('.$this->getListingSubcategories($cid).')';
		$sum = Yii::app()->db->createCommand($sql)->queryScalar();
		return $sum;
	}
	public function getCountClassfiedsByCategoryId($cid){
		$sql = 'SELECT COUNT(*) as "cant" FROM pmd_classifieds as c join pmd_listings as l on l.id=c.listing_id WHERE  l.status="active" AND l.primary_category_id IN ('.$this->getListingSubcategories($cid).')';
		$sum = Yii::app()->db->createCommand($sql)->queryScalar();
		return $sum;
	}
	
	//Combobox Categories		
	public function getCategoriesArray()
	{
		$datos=Yii::app()->db->createCommand('SELECT title,id FROM pmd_categories WHERE parent_id=1 AND id<>1 ORDER BY title ASC')->queryAll();
		$datosArray = CHTML::listData($datos,'id','title');
		return $datosArray;		
	}

	public function get4gold_fullRandom($cid){
		$sql = "SELECT * FROM pmd_listings AS t
				INNER JOIN pmd_listings_categories AS lc ON(lc.list_id=t.id)
				WHERE status='active' AND (t.primary_category_id IN (".$this->getListingSubcategories($cid).") OR lc.cat_id IN(".$this->getListingSubcategories($cid)."))
				AND template_file != ''
				GROUP BY title
				ORDER BY IF(`priority`='5','A',priority) DESC, RAND()
				LIMIT 4";
		$datos = Yii::app()->db->createCommand($sql)->queryAll();
		return $datos;
	}

	public function get4gold_lessLeads($cid){
		$sql = "SELECT * FROM vLeads_quincenales AS t
			INNER JOIN pmd_listings_categories AS lc ON(lc.list_id=t.id)
			WHERE status='active' AND (t.primary_category_id IN (".$this->getListingSubcategories($cid).") OR lc.cat_id IN(".$this->getListingSubcategories($cid)."))
			AND template_file != ''
			GROUP BY title
			ORDER BY IF(`priority`='5','A',priority) DESC, t.`Total Leads` ASC
			LIMIT 4";
		$datos = Yii::app()->db->createCommand($sql)->queryAll();
		return $datos;
	}


	public function get4gold_2less2Rand($cid){
		$sql = "(SELECT * FROM vLeads_quincenales AS t
				INNER JOIN pmd_listings_categories AS lc ON(lc.list_id=t.id)
				WHERE status='active' AND (t.primary_category_id IN (".$this->getListingSubcategories($cid)."))
				AND template_file != ''
				GROUP BY title
				ORDER BY IF(`priority`='5','A',priority) DESC, t.`Total Leads` ASC
				LIMIT 2)
				UNION
				(SELECT * FROM vLeads_quincenales AS t
				INNER JOIN pmd_listings_categories AS lc ON(lc.list_id=t.id)
				WHERE status='active' AND (t.primary_category_id IN (".$this->getListingSubcategories($cid)."))
				AND template_file != ''
				GROUP BY title
				ORDER BY RAND() LIMIT 4)
				LIMIT 4
				";
		$datos = Yii::app()->db->createCommand($sql)->queryAll();
		return $datos;
	}
}
