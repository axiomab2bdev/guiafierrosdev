<?php

/**
 * This is the model class for table "pmd_users".
 *
 * The followings are the available columns in table 'pmd_users':
 * @property string $id
 * @property string $login
 * @property string $pass
 * @property string $password_hash
 * @property string $password_salt
 * @property string $cookie_salt
 * @property string $user_email
 * @property string $logged_last
 * @property string $logged_ip
 * @property string $logged_host
 * @property string $created
 * @property string $timezone
 * @property string $password_verify
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_organization
 * @property string $user_address1
 * @property string $user_address2
 * @property string $user_city
 * @property string $user_state
 * @property string $user_country
 * @property string $user_zip
 * @property string $user_phone
 * @property string $user_fax
 * @property string $user_comment
 * @property string $credit
 * @property integer $tax_exempt
 * @property integer $disable_overdue_notices
 * @property integer $import_id
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pmd_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password_hash,user_email', 'required'),
			array('tax_exempt, disable_overdue_notices, import_id', 'numerical', 'integerOnly'=>true),
			array('login, timezone', 'length', 'max'=>50),
			array('pass', 'length', 'max'=>64),
			array('password_hash, credit', 'length', 'max'=>10),
			array('password_salt, cookie_salt', 'length', 'max'=>32),
			array('user_email, logged_host, password_verify, user_organization, user_address1, user_address2, user_city, user_state, user_country', 'length', 'max'=>255),
			array('logged_ip, user_zip, user_phone, user_fax', 'length', 'max'=>15),
			array('user_first_name, user_last_name', 'length', 'max'=>100),
			array('logged_last, created, user_comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, pass, password_hash, password_salt, cookie_salt, user_email, logged_last, logged_ip, logged_host, created, timezone, password_verify, user_first_name, user_last_name, user_organization, user_address1, user_address2, user_city, user_state, user_country, user_zip, user_phone, user_fax, user_comment, credit, tax_exempt, disable_overdue_notices, import_id', 'safe', 'on'=>'search'),
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
			'login' => 'Login',
			'pass' => 'Pass',
			'password_hash' => 'Password Hash',
			'password_salt' => 'Password Salt',
			'cookie_salt' => 'Cookie Salt',
			'user_email' => 'User Email',
			'logged_last' => 'Logged Last',
			'logged_ip' => 'Logged Ip',
			'logged_host' => 'Logged Host',
			'created' => 'Created',
			'timezone' => 'Timezone',
			'password_verify' => 'Password Verify',
			'user_first_name' => 'User First Name',
			'user_last_name' => 'User Last Name',
			'user_organization' => 'User Organization',
			'user_address1' => 'User Address1',
			'user_address2' => 'User Address2',
			'user_city' => 'User City',
			'user_state' => 'User State',
			'user_country' => 'User Country',
			'user_zip' => 'User Zip',
			'user_phone' => 'User Phone',
			'user_fax' => 'User Fax',
			'user_comment' => 'User Comment',
			//'login_id' => 'Login',
			//'login_provider' => 'Login Provider',
			'credit' => 'Credit',
			'tax_exempt' => 'Tax Exempt',
			'disable_overdue_notices' => 'Disable Overdue Notices',
			'import_id' => 'Import',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('password_hash',$this->password_hash,true);
		$criteria->compare('password_salt',$this->password_salt,true);
		$criteria->compare('cookie_salt',$this->cookie_salt,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('logged_last',$this->logged_last,true);
		$criteria->compare('logged_ip',$this->logged_ip,true);
		$criteria->compare('logged_host',$this->logged_host,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('timezone',$this->timezone,true);
		$criteria->compare('password_verify',$this->password_verify,true);
		$criteria->compare('user_first_name',$this->user_first_name,true);
		$criteria->compare('user_last_name',$this->user_last_name,true);
		$criteria->compare('user_organization',$this->user_organization,true);
		$criteria->compare('user_address1',$this->user_address1,true);
		$criteria->compare('user_address2',$this->user_address2,true);
		$criteria->compare('user_city',$this->user_city,true);
		$criteria->compare('user_state',$this->user_state,true);
		$criteria->compare('user_country',$this->user_country,true);
		$criteria->compare('user_zip',$this->user_zip,true);
		$criteria->compare('user_phone',$this->user_phone,true);
		$criteria->compare('user_fax',$this->user_fax,true);
		$criteria->compare('user_comment',$this->user_comment,true);
		//$criteria->compare('login_id',$this->login_id,true);
		//$criteria->compare('login_provider',$this->login_provider,true);
		$criteria->compare('credit',$this->credit,true);
		$criteria->compare('tax_exempt',$this->tax_exempt);
		$criteria->compare('disable_overdue_notices',$this->disable_overdue_notices);
		$criteria->compare('import_id',$this->import_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function validatePassword($password, $password_hash, $password_salt){
		/*
		$model = Users::model()->finbyAttributes(array('user_email'=>$username));
		echo $password_hash = $model->password_hash;
		echo $password_salt = $model->password_salt;*/
		return $this->hashPassword($password,$password_hash,$password_salt)===$this->pass;
	}

	public function hashPassword($password,$password_hash,$password_salt){
		return hash($password_hash,$password.$password_salt);
	}
}
