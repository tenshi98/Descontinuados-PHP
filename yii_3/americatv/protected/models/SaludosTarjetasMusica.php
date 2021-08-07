<?php

/**
 * This is the model class for table "saludos_tarjetas_musica".
 *
 * The followings are the available columns in table 'saludos_tarjetas_musica':
 * @property string $idMusica
 * @property string $Nombre
 * @property string $NombreArchivo
 */
class SaludosTarjetasMusica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'saludos_tarjetas_musica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, NombreArchivo', 'required'),
			array('Nombre, NombreArchivo', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMusica, Nombre, NombreArchivo', 'safe', 'on'=>'search'),
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
			'idMusica' => 'Id Musica',
			'Nombre' => 'Nombre',
			'NombreArchivo' => 'Nombre Archivo',
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

		$criteria->compare('idMusica',$this->idMusica,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('NombreArchivo',$this->NombreArchivo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SaludosTarjetasMusica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
