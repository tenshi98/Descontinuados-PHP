<?php

/**
 * This is the model class for table "core_datos".
 *
 * The followings are the available columns in table 'core_datos':
 * @property string $id_Datos
 * @property string $email_principal
 * @property string $Nombre
 * @property string $Nombre_slogan
 * @property string $Nombre_sist
 * @property string $Nombre_sist_slogan
 * @property string $Rut
 * @property string $Direccion
 * @property string $Fono
 * @property string $Fono_anexo
 * @property string $Fono_password
 * @property integer $Estado_chat
 * @property string $Ciudad
 * @property string $Comuna
 * @property integer $idTheme
 * @property integer $idTheme2
 */
class CoreDatos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'core_datos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_principal, Nombre, Nombre_slogan, Nombre_sist, Nombre_sist_slogan, Rut, Direccion, Fono, Fono_anexo, Fono_password, Estado_chat, Ciudad, Comuna, idTheme, idTheme2', 'required'),
			array('Estado_chat, idTheme, idTheme2', 'numerical', 'integerOnly'=>true),
			array('email_principal, Nombre, Nombre_slogan, Nombre_sist, Direccion, Ciudad, Comuna', 'length', 'max'=>60),
			array('Nombre_sist_slogan', 'length', 'max'=>255),
			array('Rut', 'length', 'max'=>13),
			array('Fono', 'length', 'max'=>15),
			array('Fono_anexo, Fono_password', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_Datos, email_principal, Nombre, Nombre_slogan, Nombre_sist, Nombre_sist_slogan, Rut, Direccion, Fono, Fono_anexo, Fono_password, Estado_chat, Ciudad, Comuna, idTheme, idTheme2', 'safe', 'on'=>'search'),
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
			'id_Datos' => 'Id Datos',
			'email_principal' => 'Email Principal',
			'Nombre' => 'Nombre',
			'Nombre_slogan' => 'Nombre Slogan',
			'Nombre_sist' => 'Nombre Sist',
			'Nombre_sist_slogan' => 'Nombre Sist Slogan',
			'Rut' => 'Rut',
			'Direccion' => 'Direccion',
			'Fono' => 'Fono',
			'Fono_anexo' => 'Fono Anexo',
			'Fono_password' => 'Fono Password',
			'Estado_chat' => 'Estado Chat',
			'Ciudad' => 'Ciudad',
			'Comuna' => 'Comuna',
			'idTheme' => 'Id Theme',
			'idTheme2' => 'Id Theme2',
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

		$criteria->compare('id_Datos',$this->id_Datos,true);
		$criteria->compare('email_principal',$this->email_principal,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Nombre_slogan',$this->Nombre_slogan,true);
		$criteria->compare('Nombre_sist',$this->Nombre_sist,true);
		$criteria->compare('Nombre_sist_slogan',$this->Nombre_sist_slogan,true);
		$criteria->compare('Rut',$this->Rut,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('Fono',$this->Fono,true);
		$criteria->compare('Fono_anexo',$this->Fono_anexo,true);
		$criteria->compare('Fono_password',$this->Fono_password,true);
		$criteria->compare('Estado_chat',$this->Estado_chat);
		$criteria->compare('Ciudad',$this->Ciudad,true);
		$criteria->compare('Comuna',$this->Comuna,true);
		$criteria->compare('idTheme',$this->idTheme);
		$criteria->compare('idTheme2',$this->idTheme2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CoreDatos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
