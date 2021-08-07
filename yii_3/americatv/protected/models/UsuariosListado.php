<?php

/**
 * This is the model class for table "usuarios_listado".
 *
 * The followings are the available columns in table 'usuarios_listado':
 * @property string $idUsuario
 * @property string $usuario
 * @property string $password
 * @property string $tipo
 * @property integer $Estado
 * @property string $email
 * @property string $Nombre
 * @property string $Rut
 * @property string $fNacimiento
 * @property string $Fono
 * @property integer $videochat
 * @property string $idvideochat
 * @property string $idchat
 * @property integer $Estado_chat
 * @property string $Direccion_img
 * @property string $Ultimo_acceso
 * @property integer $mode
 */
class UsuariosListado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios_listado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, password, tipo, Estado, email, Nombre, Rut, fNacimiento, Fono, videochat, idvideochat, idchat, Estado_chat, Direccion_img, Ultimo_acceso, mode', 'required'),
			array('Estado, videochat, Estado_chat, mode', 'numerical', 'integerOnly'=>true),
			array('usuario', 'length', 'max'=>20),
			array('password', 'length', 'max'=>32),
			array('tipo, Rut', 'length', 'max'=>13),
			array('email, Nombre', 'length', 'max'=>60),
			array('Fono', 'length', 'max'=>15),
			array('idvideochat, idchat', 'length', 'max'=>50),
			array('Direccion_img', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, usuario, password, tipo, Estado, email, Nombre, Rut, fNacimiento, Fono, videochat, idvideochat, idchat, Estado_chat, Direccion_img, Ultimo_acceso, mode', 'safe', 'on'=>'search'),
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
			'idUsuario' => 'Id Usuario',
			'usuario' => 'Usuario',
			'password' => 'Password',
			'tipo' => 'Tipo',
			'Estado' => 'Estado',
			'email' => 'Email',
			'Nombre' => 'Nombre',
			'Rut' => 'Rut',
			'fNacimiento' => 'F Nacimiento',
			'Fono' => 'Fono',
			'videochat' => 'Videochat',
			'idvideochat' => 'Idvideochat',
			'idchat' => 'Idchat',
			'Estado_chat' => 'Estado Chat',
			'Direccion_img' => 'Direccion Img',
			'Ultimo_acceso' => 'Ultimo Acceso',
			'mode' => 'Mode',
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

		$criteria->compare('idUsuario',$this->idUsuario,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('Estado',$this->Estado);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Rut',$this->Rut,true);
		$criteria->compare('fNacimiento',$this->fNacimiento,true);
		$criteria->compare('Fono',$this->Fono,true);
		$criteria->compare('videochat',$this->videochat);
		$criteria->compare('idvideochat',$this->idvideochat,true);
		$criteria->compare('idchat',$this->idchat,true);
		$criteria->compare('Estado_chat',$this->Estado_chat);
		$criteria->compare('Direccion_img',$this->Direccion_img,true);
		$criteria->compare('Ultimo_acceso',$this->Ultimo_acceso,true);
		$criteria->compare('mode',$this->mode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsuariosListado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
