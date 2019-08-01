<?php

class ContactEmblue extends CFormModel
{
	
	public $grupo="";
	public $email;
	public $nombre;
	public $apellido;
	public $tipo_empresa;
	public $empresa;
	public $cargo;
	public $ciudad;
	public $telefono_1;
	public $telefono_2;	
	public $emailId;
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grupo, emailId', 'numerical', 'integerOnly'=>true),
			array('email, nombre, apellido, tipo_empresa, cargo, ciudad, telefono_1, telefono_2', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('', 'safe', 'on'=>'search'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contact the model class
	 */
	public function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function serializeData(){
		$str="";
/*		$str.= "nombre:|:".$this->nombre.":|:1|||";
		$str.= "apellido:|:".$this->apellido.":|:1|||";
*/		$str.= "Tipo+de+Empresa:|:".$this->tipo_empresa.":|:1|||";
/*		$str.= "empresa:|:".$this->empresa.":|:1|||";
*/		$str.= "cargo:|:".$this->cargo.":|:1|||";
/*		$str.= "ciudad:|:".$this->ciudad.":|:1|||";
		$str.= "telefono_1:|:".$this->telefono_1.":|:1|||";
		$str.= "telefono_2:|:".$this->telefono_2.":|:1|||";*/
/*		$str.= "portal:|:".$this->grupo.":|:1|||";
*/		$str= substr($str,0,count($str)-4);
		return $str;
	}
}
?>