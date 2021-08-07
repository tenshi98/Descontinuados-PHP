<?php

/**
 * This is the model class for table "core_permisos".
 *
 * The followings are the available columns in table 'core_permisos':
 * @property string $idAdmpm
 * @property string $id_pmcat
 * @property string $Direccionweb
 * @property string $Direccionbase
 * @property string $Nombre
 * @property integer $mode
 */
class CorePermisos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'core_permisos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pmcat, Direccionweb, Direccionbase, Nombre, mode', 'required'),
			array('mode', 'numerical', 'integerOnly'=>true),
			array('id_pmcat', 'length', 'max'=>11),
			array('Direccionweb, Direccionbase, Nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idAdmpm, id_pmcat, Direccionweb, Direccionbase, Nombre, mode', 'safe', 'on'=>'search'),
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
			'idAdmpm' => 'Id Admpm',
			'id_pmcat' => 'Id Pmcat',
			'Direccionweb' => 'Direccionweb',
			'Direccionbase' => 'Direccionbase',
			'Nombre' => 'Nombre',
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

		$criteria->compare('idAdmpm',$this->idAdmpm,true);
		$criteria->compare('id_pmcat',$this->id_pmcat,true);
		$criteria->compare('Direccionweb',$this->Direccionweb,true);
		$criteria->compare('Direccionbase',$this->Direccionbase,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('mode',$this->mode);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CorePermisos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
