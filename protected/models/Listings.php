<?php

/**
 * This is the model class for table "pmd_listings".
 *
 * The followings are the available columns in table 'pmd_listings':
 * @property string $id
 * @property string $user_id
 * @property string $primary_category_id
 * @property string $status
 * @property string $priority
 * @property string $title
 * @property string $friendly_url
 * @property string $description_short
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $keywords
 * @property string $logo_extension
 * @property string $phone
 * @property string $fax
 * @property string $location_id
 * @property string $listing_address1
 * @property string $listing_address2
 * @property string $listing_zip
 * @property string $location_text_1
 * @property string $location_text_2
 * @property string $location_text_3
 * @property string $location_search_text
 * @property string $hours
 * @property string $latitude
 * @property string $longitude
 * @property string $coordinates_date_checked
 * @property string $www
 * @property integer $www_status
 * @property integer $www_reciprocal
 * @property string $www_date_checked
 * @property string $website_clicks
 * @property string $www_screenshot_last_updated
 * @property integer $pagerank
 * @property string $pagerank_expiration
 * @property string $ip
 * @property string $date
 * @property string $date_update
 * @property string $ip_update
 * @property string $email_counter
 * @property string $search_impressions
 * @property string $impressions
 * @property string $emails
 * @property double $rating
 * @property string $banner_impressions
 * @property string $banner_clicks
 * @property string $counterip
 * @property string $mail
 * @property integer $claimed
 * @property string $comment
 * @property string $votes
 * @property string $header_template_file
 * @property string $footer_template_file
 * @property string $wrapper_template_file
 * @property string $template_file
 * @property string $template_file_results
 * @property integer $category_limit
 * @property integer $featured
 * @property string $featured_date
 * @property integer $friendly_url_allow
 * @property integer $html_editor_allow
 * @property integer $phone_allow
 * @property integer $fax_allow
 * @property integer $address_allow
 * @property integer $zip_allow
 * @property integer $hours_allow
 * @property integer $email_allow
 * @property integer $email_friend_allow
 * @property integer $www_allow
 * @property integer $www_screenshot_allow
 * @property integer $require_reciprocal
 * @property integer $map_allow
 * @property integer $logo_allow
 * @property integer $reviews_allow
 * @property integer $ratings_allow
 * @property integer $suggestion_allow
 * @property integer $claim_allow
 * @property integer $pdf_allow
 * @property integer $vcard_allow
 * @property integer $addtofavorites_allow
 * @property integer $print_allow
 * @property integer $coordinates_allow
 * @property integer $classifieds_images_allow
 * @property integer $classifieds_limit
 * @property integer $images_limit
 * @property integer $documents_limit
 * @property integer $title_size
 * @property integer $short_description_size
 * @property integer $description_size
 * @property integer $meta_title_size
 * @property integer $meta_description_size
 * @property integer $meta_keywords_limit
 * @property integer $keywords_limit
 * @property string $custom_2
 * @property integer $custom_2_allow
 * @property string $custom_3
 * @property integer $custom_3_allow
 * @property string $custom_4
 * @property integer $custom_4_allow
 * @property string $custom_5
 * @property integer $custom_5_allow
 * @property string $custom_6
 * @property integer $custom_6_allow
 * @property integer $banner_limit_1
 * @property integer $custom_7_allow
 * @property integer $custom_8_allow
 * @property integer $custom_9_allow 
 * @property integer $custom_10_allow
 * @property integer $banner_limit_2
 * @property integer $banner_limit_4
 * @property integer $banner_limit_5  
 * @property integer $custom_12
 * @property integer $custom_12_allow
 * @property integer $qrcode_allow
 * @property integer $contact_requests_allow
 * @property integer $description_images_limit
 * @property string $custom_14
 * @property integer $custom_14_allow
 * @property string $custom_15
 * @property integer $custom_15_allow
 */
class Listings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_listings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('primary_category_id, title, mail, phone, location_id', 'required'),
			array('www_status, www_reciprocal, pagerank, claimed, category_limit, featured, friendly_url_allow, html_editor_allow, phone_allow, fax_allow, address_allow, zip_allow, hours_allow, email_allow, email_friend_allow, www_allow, www_screenshot_allow, require_reciprocal, map_allow, logo_allow, reviews_allow, ratings_allow, suggestion_allow, claim_allow, pdf_allow, vcard_allow, addtofavorites_allow, print_allow, coordinates_allow, classifieds_images_allow, classifieds_limit, images_limit, documents_limit, title_size, short_description_size, description_size, meta_title_size, meta_description_size, meta_keywords_limit, keywords_limit, custom_2_allow, custom_3_allow, custom_4_allow, custom_5_allow, custom_6_allow, banner_limit_1, custom_7_allow, custom_9_allow, custom_10_allow, custom_12, custom_12_allow, banner_limit_2, custom_14_allow, banner_limit_4, qrcode_allow, share_allow, contact_requests_allow, description_images_limit, custom_15,custom_15_allow', 'numerical', 'integerOnly'=>true),
			array('rating', 'numerical'),
			array('user_id, primary_category_id, priority, location_id, website_clicks, impressions, emails, banner_impressions, banner_clicks, votes, search_impressions', 'length', 'max'=>10),
			array('status', 'length', 'max'=>9),
			array('title', 'length', 'max'=>150),
			array('friendly_url, meta_title, listing_address1, listing_address2, location_text_1, location_text_2, location_text_3, location_search_text, www, mail, comment, custom_14', 'length', 'max'=>255),
			array('logo_extension', 'length', 'max'=>4),
			array('phone, fax', 'length', 'max'=>25),
			array('listing_zip, latitude, longitude, ip, ip_update, counterip', 'length', 'max'=>15),
			array('header_template_file, footer_template_file, wrapper_template_file, template_file, template_file_results', 'length', 'max'=>75),
			array('description_short, description, meta_description, meta_keywords, keywords, hours, coordinates_date_checked, www_date_checked, www_screenshot_last_updated, pagerank_expiration, date, date_update, featured_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, primary_category_id, status, priority, title, friendly_url, description_short, description, meta_title, meta_description, meta_keywords, keywords, logo_extension, phone, fax, location_id, listing_address1, listing_address2, listing_zip, location_text_1, location_text_2, location_text_3, location_search_text, hours, latitude, longitude, coordinates_date_checked, www, www_status, www_reciprocal, www_date_checked, website_clicks, www_screenshot_last_updated, pagerank, pagerank_expiration, ip, date, date_update, ip_update, impressions, emails, rating, banner_impressions, banner_clicks, counterip, mail, claimed, comment, votes, header_template_file, footer_template_file, wrapper_template_file, template_file, template_file_results, category_limit, featured, featured_date, friendly_url_allow, html_editor_allow, phone_allow, fax_allow, address_allow, zip_allow, hours_allow, email_allow, email_friend_allow, www_allow, www_screenshot_allow, require_reciprocal, map_allow, logo_allow, reviews_allow, ratings_allow, suggestion_allow, claim_allow, pdf_allow, vcard_allow, addtofavorites_allow, print_allow, coordinates_allow, classifieds_images_allow, classifieds_limit, images_limit, documents_limit, title_size, short_description_size, description_size, meta_title_size, meta_description_size, meta_keywords_limit, keywords_limit, custom_1_allow, custom_2, custom_2_allow, custom_3, custom_3_allow, custom_4, custom_4_allow, custom_5, custom_5_allow, custom_6, custom_6_allow, banner_limit_1, custom_7_allow, custom_9_allow, custom_10_allow, custom_12, custom_12_allow, banner_limit_2, custom_14, custom_14_allow, banner_limit_4, search_impressions, qrcode_allow, share_allow, contact_requests_allow, description_images_limit, custom_14, custom_15,custom_15_allow, email_counter, banner_limit_5', 'safe', 'on'=>'search'),
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
			'location' => array(self::BELONGS_TO, 'Locations', 'location_id'),
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
			'primary_category_id' => 'Primary Category',
			'status' => 'Status',
			'priority' => 'Priority',
			'title' => 'Title',
			'friendly_url' => 'Friendly Url',
			'description_short' => 'Description Short',
			'description' => 'Description',
			'meta_title' => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords' => 'Meta Keywords',
			'keywords' => 'Keywords',
			'logo_extension' => 'Logo Extension',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'location_id' => 'Location',
			'listing_address1' => 'Listing Address1',
			'listing_address2' => 'Listing Address2',
			'listing_zip' => 'Listing Zip',
			'location_text_1' => 'Location Text 1',
			'location_text_2' => 'Location Text 2',
			'location_text_3' => 'Location Text 3',
			'location_search_text' => 'Location Search Text',
			'hours' => 'Hours',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'coordinates_date_checked' => 'Coordinates Date Checked',
			'www' => 'Www',
			'www_status' => 'Www Status',
			'www_reciprocal' => 'Www Reciprocal',
			'www_date_checked' => 'Www Date Checked',
			'website_clicks' => 'Website Clicks',
			'www_screenshot_last_updated' => 'Www Screenshot Last Updated',
			'pagerank' => 'Pagerank',
			'pagerank_expiration' => 'Pagerank Expiration',
			'ip' => 'Ip',
			'date' => 'Date',
			'date_update' => 'Date Update',
			'ip_update' => 'Ip Update',
			'impressions' => 'Impressions',
			'emails' => 'Emails',
			'rating' => 'Rating',
			'banner_impressions' => 'Banner Impressions',
			'banner_clicks' => 'Banner Clicks',
			'counterip' => 'Counterip',
			'mail' => 'Mail',
			'claimed' => 'Claimed',
			'comment' => 'Comment',
			'votes' => 'Votes',
			'header_template_file' => 'Header Template File',
			'footer_template_file' => 'Footer Template File',
			'wrapper_template_file' => 'Wrapper Template File',
			'template_file' => 'Template File',
			'template_file_results' => 'Template File Results',
			'category_limit' => 'Category Limit',
			'featured' => 'Featured',
			'featured_date' => 'Featured Date',
			'friendly_url_allow' => 'Friendly Url Allow',
			'html_editor_allow' => 'Html Editor Allow',
			'phone_allow' => 'Phone Allow',
			'fax_allow' => 'Fax Allow',
			'address_allow' => 'Address Allow',
			'zip_allow' => 'Zip Allow',
			'hours_allow' => 'Hours Allow',
			'email_allow' => 'Email Allow',
			'email_friend_allow' => 'Email Friend Allow',
			'www_allow' => 'Www Allow',
			'www_screenshot_allow' => 'Www Screenshot Allow',
			'require_reciprocal' => 'Require Reciprocal',
			'map_allow' => 'Map Allow',
			'logo_allow' => 'Logo Allow',
			'reviews_allow' => 'Reviews Allow',
			'ratings_allow' => 'Ratings Allow',
			'suggestion_allow' => 'Suggestion Allow',
			'claim_allow' => 'Claim Allow',
			'pdf_allow' => 'Pdf Allow',
			'vcard_allow' => 'Vcard Allow',
			'addtofavorites_allow' => 'Addtofavorites Allow',
			'print_allow' => 'Print Allow',
			'coordinates_allow' => 'Coordinates Allow',
			'classifieds_images_allow' => 'Classifieds Images Allow',
			'classifieds_limit' => 'Classifieds Limit',
			'images_limit' => 'Images Limit',
			'documents_limit' => 'Documents Limit',
			'title_size' => 'Title Size',
			'short_description_size' => 'Short Description Size',
			'description_size' => 'Description Size',
			'meta_title_size' => 'Meta Title Size',
			'meta_description_size' => 'Meta Description Size',
			'meta_keywords_limit' => 'Meta Keywords Limit',
			'keywords_limit' => 'Keywords Limit',
			'custom_2' => 'Custom 2',
			'custom_2_allow' => 'Custom 2 Allow',
			'custom_3' => 'Custom 3',
			'custom_3_allow' => 'Custom 3 Allow',
			'custom_4' => 'Custom 4',
			'custom_4_allow' => 'Custom 4 Allow',
			'custom_5' => 'Custom 5',
			'custom_5_allow' => 'Custom 5 Allow',
			'custom_6' => 'Custom 6',
			'custom_6_allow' => 'Custom 6 Allow',
			'banner_limit_1' => 'Banner Limit 1',
			'email_counter' => 'Email counter',
			'custom_7_allow' => 'Custom 7 Allow',
			'custom_9_allow' => 'Custom 9 Allow',
			'custom_10_allow' => 'Custom 10 Allow',
			'custom_12_allow' => 'Custom 12 Allow',
			'custom_12'=>'Custom 12',
			'banner_limit_5' => 'Banner limit 5',
			'banner_limit_2' => 'Banner Limit 2',
			//'banner_limit_3' => 'Banner Limit 3',
			'custom_14' => 'Custom 14',
			'custom_14_allow' => 'Custom 14 Allow',
			'banner_limit_4' => 'Banner Limit 4',
			'search_impressions' => 'Search Impressions',
			'qrcode_allow' => 'Qrcode Allow',
			'share_allow' => 'Share Allow',
			'contact_requests_allow' => 'Contact Requests Allow',
			'description_images_limit' => 'Description Images Limit',
			//'banner_show' => 'Banner Show',
			//'hits' => 'Hits',
			'custom_15' => 'Custom 15',
			'custom_15_allow' => 'Custom 15 Allow',
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
		$criteria->compare('primary_category_id',$this->primary_category_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('priority',$this->priority,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('friendly_url',$this->friendly_url,true);
		$criteria->compare('description_short',$this->description_short,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('logo_extension',$this->logo_extension,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('listing_address1',$this->listing_address1,true);
		$criteria->compare('listing_address2',$this->listing_address2,true);
		$criteria->compare('listing_zip',$this->listing_zip,true);
		$criteria->compare('location_text_1',$this->location_text_1,true);
		$criteria->compare('location_text_2',$this->location_text_2,true);
		$criteria->compare('location_text_3',$this->location_text_3,true);
		$criteria->compare('location_search_text',$this->location_search_text,true);
		$criteria->compare('hours',$this->hours,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('coordinates_date_checked',$this->coordinates_date_checked,true);
		$criteria->compare('www',$this->www,true);
		$criteria->compare('www_status',$this->www_status);
		$criteria->compare('www_reciprocal',$this->www_reciprocal);
		$criteria->compare('www_date_checked',$this->www_date_checked,true);
		$criteria->compare('website_clicks',$this->website_clicks,true);
		$criteria->compare('www_screenshot_last_updated',$this->www_screenshot_last_updated,true);
		$criteria->compare('pagerank',$this->pagerank);
		$criteria->compare('pagerank_expiration',$this->pagerank_expiration,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('ip_update',$this->ip_update,true);
		$criteria->compare('impressions',$this->impressions,true);
		$criteria->compare('emails',$this->emails,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('banner_impressions',$this->banner_impressions,true);
		$criteria->compare('banner_clicks',$this->banner_clicks,true);
		$criteria->compare('counterip',$this->counterip,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('claimed',$this->claimed);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('votes',$this->votes,true);
		$criteria->compare('header_template_file',$this->header_template_file,true);
		$criteria->compare('footer_template_file',$this->footer_template_file,true);
		$criteria->compare('wrapper_template_file',$this->wrapper_template_file,true);
		$criteria->compare('template_file',$this->template_file,true);
		$criteria->compare('template_file_results',$this->template_file_results,true);
		$criteria->compare('category_limit',$this->category_limit);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('featured_date',$this->featured_date,true);
		$criteria->compare('friendly_url_allow',$this->friendly_url_allow);
		$criteria->compare('html_editor_allow',$this->html_editor_allow);
		$criteria->compare('phone_allow',$this->phone_allow);
		$criteria->compare('fax_allow',$this->fax_allow);
		$criteria->compare('address_allow',$this->address_allow);
		$criteria->compare('zip_allow',$this->zip_allow);
		$criteria->compare('hours_allow',$this->hours_allow);
		$criteria->compare('email_allow',$this->email_allow);
		$criteria->compare('email_friend_allow',$this->email_friend_allow);
		$criteria->compare('www_allow',$this->www_allow);
		$criteria->compare('www_screenshot_allow',$this->www_screenshot_allow);
		$criteria->compare('require_reciprocal',$this->require_reciprocal);
		$criteria->compare('map_allow',$this->map_allow);
		$criteria->compare('logo_allow',$this->logo_allow);
		$criteria->compare('reviews_allow',$this->reviews_allow);
		$criteria->compare('ratings_allow',$this->ratings_allow);
		$criteria->compare('suggestion_allow',$this->suggestion_allow);
		$criteria->compare('claim_allow',$this->claim_allow);
		$criteria->compare('pdf_allow',$this->pdf_allow);
		$criteria->compare('vcard_allow',$this->vcard_allow);
		$criteria->compare('addtofavorites_allow',$this->addtofavorites_allow);
		$criteria->compare('print_allow',$this->print_allow);
		$criteria->compare('coordinates_allow',$this->coordinates_allow);
		$criteria->compare('classifieds_images_allow',$this->classifieds_images_allow);
		$criteria->compare('classifieds_limit',$this->classifieds_limit);
		$criteria->compare('images_limit',$this->images_limit);
		$criteria->compare('documents_limit',$this->documents_limit);
		$criteria->compare('title_size',$this->title_size);
		$criteria->compare('short_description_size',$this->short_description_size);
		$criteria->compare('description_size',$this->description_size);
		$criteria->compare('meta_title_size',$this->meta_title_size);
		$criteria->compare('meta_description_size',$this->meta_description_size);
		$criteria->compare('meta_keywords_limit',$this->meta_keywords_limit);
		$criteria->compare('keywords_limit',$this->keywords_limit);
		$criteria->compare('custom_2',$this->custom_2,true);
		$criteria->compare('custom_2_allow',$this->custom_2_allow);
		$criteria->compare('custom_3',$this->custom_3,true);
		$criteria->compare('custom_3_allow',$this->custom_3_allow);
		$criteria->compare('custom_4',$this->custom_4,true);
		$criteria->compare('custom_4_allow',$this->custom_4_allow);
		$criteria->compare('custom_5',$this->custom_5,true);
		$criteria->compare('custom_5_allow',$this->custom_5_allow);
		$criteria->compare('custom_6',$this->custom_6,true);
		$criteria->compare('custom_6_allow',$this->custom_6_allow);
		$criteria->compare('banner_limit_1',$this->banner_limit_1);
		$criteria->compare('email_counter',$this->email_counter,true);
		$criteria->compare('custom_7_allow',$this->custom_7_allow);
		$criteria->compare('custom_9_allow',$this->custom_9_allow);
		$criteria->compare('custom_10_allow',$this->custom_10_allow);
		$criteria->compare('custom_12',$this->custom_12);
		$criteria->compare('custom_12_allow',$this->custom_12_allow);		
		$criteria->compare('banner_limit_5',$this->banner_limit_5);
		$criteria->compare('banner_limit_2',$this->banner_limit_2);
		//$criteria->compare('banner_limit_3',$this->banner_limit_3);
		$criteria->compare('custom_14',$this->custom_14,true);
		$criteria->compare('custom_14_allow',$this->custom_14_allow);
		$criteria->compare('banner_limit_4',$this->banner_limit_4);
		$criteria->compare('search_impressions',$this->search_impressions,true);
		$criteria->compare('qrcode_allow',$this->qrcode_allow);
		$criteria->compare('share_allow',$this->share_allow);
		$criteria->compare('contact_requests_allow',$this->contact_requests_allow);
		$criteria->compare('description_images_limit',$this->description_images_limit);
		//$criteria->compare('banner_show',$this->banner_show);
		//$criteria->compare('hits',$this->hits);
		$criteria->compare('custom_15',$this->custom_15,true);
		$criteria->compare('custom_15_allow',$this->custom_15_allow);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Listings the static model class
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
			$criteria->addSearchCondition( 't.keywords', $valor, true, 'OR' );}
		}
		$criteria->addSearchCondition( 't.title', $keyword, true, 'OR' );
		$criteria->addSearchCondition( 't.description', $keyword, true, 'OR' );
		$criteria->addSearchCondition( 't.status', 'active', true, 'AND' );
		$criteria->order="IF(template_file='','Z',template_file) ASC";
		/***Filtro por ciudad****/
		if(!empty($location)){
		$criteria->addSearchCondition( 'tlo.friendly_url_path', $location, true, 'AND' );
		$criteria->join='join pmd_locations as tlo on tlo.id=t.location_id';
		}
		/***Fin Filtro por ciudad****/
			
		return $criteria;
	}

	public function searchAdvance_sql2($keyword,$location){
		$keyword_url = preg_replace("/\s/", "-", $keyword);
		$sql="(SELECT * FROM pmd_listings
			WHERE
				status = 'active'
		        AND template_file != ''
		        AND (title LIKE '%{$keyword}%'
		    		OR friendly_url LIKE '%{$keyword_url}%'))
			UNION
			(SELECT * FROM pmd_listings
			WHERE
				status = 'active'
		        AND template_file != ''
		        AND (".$this->add_like_conditions('title',$keyword)."
		        	OR ".$this->add_like_conditions('friendly_url',$keyword)."))
			UNION
			(SELECT * FROM pmd_listings
			WHERE
			    status = 'active'
			    AND template_file != ''
				AND (".$this->add_like_conditions('description',$keyword)."
			        OR ".$this->add_like_conditions('keywords',$keyword)."))
			UNION
			(SELECT * FROM pmd_listings
			WHERE
			    status = 'active'
			    AND template_file = ''
				AND (".$this->add_like_conditions('description',$keyword)."
			        OR ".$this->add_like_conditions('keywords',$keyword).")
			)";

		$count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM (' . $sql . ') as count_alias')->queryScalar();
			
		return new CSqlDataProvider($sql, array(
			'id'=>'Listings',
			'totalItemCount' => $count,
		    'pagination'=>array(
		    	'pageVar' => 'Listings_page',
		        'pageSize'=>12,
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
}
