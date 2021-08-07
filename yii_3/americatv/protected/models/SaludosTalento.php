<?php

/**
 * This is the model class for table "saludos_talento".
 *
 * The followings are the available columns in table 'saludos_talento':
 * @property string $idTalento
 * @property string $id_usuario
 * @property string $fecha_video
 * @property integer $video
 * @property string $correo
 * @property string $asunto
 */
class SaludosTalento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'saludos_talento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, fecha_video, video, correo, asunto', 'required'),
			array('video', 'numerical', 'integerOnly'=>true),
			array('id_usuario', 'length', 'max'=>11),
			array('correo, asunto', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTalento, id_usuario, fecha_video, video, correo, asunto', 'safe', 'on'=>'search'),
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
			'idTalento' => 'Id Talento',
			'id_usuario' => 'Id Usuario',
			'fecha_video' => 'Fecha Video',
			'video' => 'Video',
			'correo' => 'Correo',
			'asunto' => 'Asunto',
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

		$criteria->compare('idTalento',$this->idTalento,true);
		$criteria->compare('id_usuario',$this->id_usuario,true);
		$criteria->compare('fecha_video',$this->fecha_video,true);
		$criteria->compare('video',$this->video);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('asunto',$this->asunto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SaludosTalento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
