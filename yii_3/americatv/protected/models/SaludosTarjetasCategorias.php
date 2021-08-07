<?php

/**
 * This is the model class for table "saludos_tarjetas_categorias".
 *
 * The followings are the available columns in table 'saludos_tarjetas_categorias':
 * @property string $idTarjetaCat
 * @property string $Nombre
 * @property string $img
 * @property string $n_enviados
 */
class SaludosTarjetasCategorias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'saludos_tarjetas_categorias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, img, n_enviados', 'required'),
			array('Nombre, img', 'length', 'max'=>120),
			array('n_enviados', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTarjetaCat, Nombre, img, n_enviados', 'safe', 'on'=>'search'),
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
			'idTarjetaCat' => 'Id Tarjeta Cat',
			'Nombre' => 'Nombre',
			'img' => 'Img',
			'n_enviados' => 'N Enviados',
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

		$criteria->compare('idTarjetaCat',$this->idTarjetaCat,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('n_enviados',$this->n_enviados,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SaludosTarjetasCategorias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
