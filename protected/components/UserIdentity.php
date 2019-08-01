<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	private $_id;
	public function authenticate()
	{
		$username=strtolower($this->username);
		$user=Users::model()->find('LOWER(user_email)=?',array($username));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
				else if(!$user->validatePassword($this->password, $user->password_hash, $user->password_salt)){
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
				else{
					$this->_id=$user->id;
					$this->username=$user->user_email;
					$this->errorCode=self::ERROR_NONE;
			 
			/*Consultamos los datos del usuario por el username ($user->username) */
			$info_usuario = Users::model()->find('LOWER(user_email)=?', array($user->user_email));
			
			//var_dump($info_usuario);
			/*En las vistas tendremos disponibles last_login y perfil pueden setear las que requieran */
			$password_hash = $info_usuario->password_hash;
			$password_salt = $info_usuario->password_salt;

				return $this->errorCode==self::ERROR_NONE;
			}
	/*	$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/
		
	}
	
	
	public function getId(){
		return $this->_id;
	}
	
	 
	 
	/*public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/
}