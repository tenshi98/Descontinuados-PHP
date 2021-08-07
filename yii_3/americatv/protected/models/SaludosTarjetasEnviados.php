<?php

/**
 * This is the model class for table "saludos_tarjetas_enviados".
 *
 * The followings are the available columns in table 'saludos_tarjetas_enviados':
 * @property string $idTarjetas
 * @property string $id_usuario
 * @property string $fecha_video
 * @property string $codigo
 * @property string $tarjeta
 * @property string $idMusica
 * @property string $VideoSaludo
 * @property string $correo1
 * @property string $correo2
 * @property string $correo3
 * @property string $correo4
 * @property string $correo5
 * @property string $asunto
 * @property string $mensaje
 */
class SaludosTarjetasEnviados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'saludos_tarjetas_enviados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, fecha_video, codigo, tarjeta, idMusica, VideoSaludo, correo1, correo2, correo3, correo4, correo5, asunto, mensaje', 'required'),
			array('id_usuario, codigo, tarjeta, idMusica', 'length', 'max'=>11),
			array('VideoSaludo, correo1, correo2, correo3, correo5', 'length', 'max'=>120),
			array('correo4', 'length', 'max'=>50),
			array('asunto', 'length', 'max'=>75),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTarjetas, id_usuario, fecha_video, codigo, tarjeta, idMusica, VideoSaludo, correo1, correo2, correo3, correo4, correo5, asunto, mensaje', 'safe', 'on'=>'search'),
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
			'idTarjetas' => 'Id Tarjetas',
			'id_usuario' => 'Id Usuario',
			'fecha_video' => 'Fecha Video',
			'codigo' => 'Codigo',
			'tarjeta' => 'Tarjeta',
			'idMusica' => 'Id Musica',
			'VideoSaludo' => 'Video Saludo',
			'correo1' => 'Correo1',
			'correo2' => 'Correo2',
			'correo3' => 'Correo3',
			'correo4' => 'Correo4',
			'correo5' => 'Correo5',
			'asunto' => 'Asunto',
			'mensaje' => 'Mensaje',
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

		$criteria->compare('idTarjetas',$this->idTarjetas,true);
		$criteria->compare('id_usuario',$this->id_usuario,true);
		$criteria->compare('fecha_video',$this->fecha_video,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('tarjeta',$this->tarjeta,true);
		$criteria->compare('idMusica',$this->idMusica,true);
		$criteria->compare('VideoSaludo',$this->VideoSaludo,true);
		$criteria->compare('correo1',$this->correo1,true);
		$criteria->compare('correo2',$this->correo2,true);
		$criteria->compare('correo3',$this->correo3,true);
		$criteria->compare('correo4',$this->correo4,true);
		$criteria->compare('correo5',$this->correo5,true);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('mensaje',$this->mensaje,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SaludosTarjetasEnviados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
