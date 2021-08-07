<?php

/**
 * This is the model class for table "postulante".
 *
 * The followings are the available columns in table 'postulante':
 * @property integer $id_usuario
 * @property string $user_atv
 * @property integer $PostCod
 * @property integer $PostRut
 * @property string $PostDV
 * @property string $PostNombres
 * @property string $PostApellPapa
 * @property string $PostApellMama
 * @property string $PostFecNac
 * @property string $donderecibo
 * @property string $PostFonoFijo
 * @property string $PostFonoCel
 * @property string $idPais
 * @property string $idDepartamento
 * @property string $idProvincia
 * @property string $idDistrito
 * @property string $PostDireccion
 * @property string $PostEmail
 * @property string $clave
 * @property string $PostFoto1
 * @property string $PostFoto2
 * @property string $PostFoto3
 * @property integer $estadovideo1
 * @property integer $estadovideo2
 * @property integer $estadovideo3
 * @property string $PostProfesion1
 * @property string $PostProfesion2
 * @property string $PostProfesion3
 * @property string $PostProduccion1
 * @property string $PostProduccion2
 * @property string $PostProduccion3
 * @property string $PostWeb
 * @property string $PostDispon
 * @property string $PostPrefUbicacion
 * @property string $PostActivo
 * @property string $PostFecIngreso
 * @property string $PostFecModifica
 * @property string $PostEducacion
 * @property string $PostTituloObt
 * @property string $PostFonoAlter
 * @property string $PostSexo
 * @property integer $PostreciboNoticias
 * @property string $PostIngles
 * @property string $PostComent
 * @property string $PostObjetivo
 * @property string $PostBrochure
 * @property string $alias
 * @property string $url_img
 * @property integer $rol
 * @property string $vid_prof1
 * @property string $vid_prof2
 * @property string $vid_prof3
 */
class Postulante_2 extends CActiveRecord
{
	//IMPORTANTE
	public $vid_prof1;
	public $vid_prof2;
	public $vid_prof3;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'postulante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('PostCod, PostRut, estadovideo1, estadovideo2, estadovideo3, PostreciboNoticias, rol', 'numerical', 'integerOnly'=>true),
			array('user_atv', 'length', 'max'=>75),
			array('PostDV, donderecibo, PostActivo, PostSexo', 'length', 'max'=>1),
			array('PostNombres, PostFonoFijo, PostFonoCel, PostDireccion, PostDispon, PostPrefUbicacion, PostTituloObt, PostIngles', 'length', 'max'=>50),
			array('PostApellPapa, PostEmail', 'length', 'max'=>70),
			array('PostApellMama, clave, PostEducacion, PostFonoAlter', 'length', 'max'=>25),
			array('idPais, idDepartamento, idProvincia, idDistrito, PostProfesion1, PostProfesion2, PostProfesion3, PostProduccion1, PostProduccion2, PostProduccion3', 'length', 'max'=>11),
			array('PostFoto1', 'length', 'max'=>60),
			array('PostFoto2, PostFoto3, alias, vid_prof1, vid_prof2, vid_prof3', 'length', 'max'=>120),
			array('PostWeb', 'length', 'max'=>100),
			array('PostFecIngreso, PostFecModifica', 'length', 'max'=>8),
			array('PostComent', 'length', 'max'=>254),
			array('url_img', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, user_atv, PostCod, PostRut, PostDV, PostNombres, PostApellPapa, PostApellMama, PostFecNac, donderecibo, PostFonoFijo, PostFonoCel, idPais, idDepartamento, idProvincia, idDistrito, PostDireccion, PostEmail, clave, PostFoto1, PostFoto2, PostFoto3, estadovideo1, estadovideo2, estadovideo3, PostProfesion1, PostProfesion2, PostProfesion3, PostProduccion1, PostProduccion2, PostProduccion3, PostWeb, PostDispon, PostPrefUbicacion, PostActivo, PostFecIngreso, PostFecModifica, PostEducacion, PostTituloObt, PostFonoAlter, PostSexo, PostreciboNoticias, PostIngles, PostComent, PostObjetivo, PostBrochure, alias, url_img, rol, vid_prof1, vid_prof2, vid_prof3, vid_aprob1, vid_aprob2, vid_aprob3', 'safe', 'on'=>'search'),
			//IMPORTANTE

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
			'id_usuario' => 'Id Usuario',
			'user_atv' => 'User Atv',
			'PostCod' => 'Post Cod',
			'PostRut' => 'Post Rut',
			'PostDV' => 'Post Dv',
			'PostNombres' => 'Nombres',
			'PostApellPapa' => 'Apellido Paterno',
			'PostApellMama' => 'Apellido Materno',
			'PostFecNac' => 'Fecha de Nacimiento',
			'donderecibo' => 'Donderecibo',
			'PostFonoFijo' => 'Telefono Fijo',
			'PostFonoCel' => 'Telefono Movil',
			'idPais' => 'Pais',
			'idDepartamento' => 'Departamento',
			'idProvincia' => 'Provincia',
			'idDistrito' => 'Distrito',
			'PostDireccion' => 'Direccion',
			'PostEmail' => 'Email',
			'clave' => 'Clave',
			'PostFoto1' => 'Foto1',
			'PostFoto2' => 'Foto2',
			'PostFoto3' => 'Foto3',
			'estadovideo1' => 'Estadovideo1',
			'estadovideo2' => 'Estadovideo2',
			'estadovideo3' => 'Estadovideo3',
			'PostProfesion1' => 'Profesion1',
			'PostProfesion2' => 'Profesion2',
			'PostProfesion3' => 'Profesion3',
			'PostProduccion1' => 'Produccion1',
			'PostProduccion2' => 'Produccion2',
			'PostProduccion3' => 'Produccion3',
			'PostWeb' => 'Post Web',
			'PostDispon' => 'Post Dispon',
			'PostPrefUbicacion' => 'Post Pref Ubicacion',
			'PostActivo' => 'Post Activo',
			'PostFecIngreso' => 'Post Fec Ingreso',
			'PostFecModifica' => 'Post Fec Modifica',
			'PostEducacion' => 'Post Educacion',
			'PostTituloObt' => 'Post Titulo Obt',
			'PostFonoAlter' => 'Post Fono Alter',
			'PostSexo' => 'Post Sexo',
			'PostreciboNoticias' => 'Postrecibo Noticias',
			'PostIngles' => 'Post Ingles',
			'PostComent' => 'Post Coment',
			'PostObjetivo' => 'Descripción de tu perfil',
			'PostBrochure' => 'Post Brochure',
			'alias' => 'Alias',
			'url_img' => 'Url Img',
			'rol' => 'Rol',
			'vid_prof1' => 'Video Talento 1',
			'vid_prof2' => 'Video Talento 2',
			'vid_prof3' => 'Video Talento 3',
			'vid_aprob1' => 'Aprobacion Video Talento 1',
			'vid_aprob2' => 'Aprobacion Video Talento 2',
			'vid_aprob3' => 'Aprobacion Video Talento 3',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('user_atv',$this->user_atv,true);
		$criteria->compare('PostCod',$this->PostCod);
		$criteria->compare('PostRut',$this->PostRut);
		$criteria->compare('PostDV',$this->PostDV,true);
		$criteria->compare('PostNombres',$this->PostNombres,true);
		$criteria->compare('PostApellPapa',$this->PostApellPapa,true);
		$criteria->compare('PostApellMama',$this->PostApellMama,true);
		$criteria->compare('PostFecNac',$this->PostFecNac,true);
		$criteria->compare('donderecibo',$this->donderecibo,true);
		$criteria->compare('PostFonoFijo',$this->PostFonoFijo,true);
		$criteria->compare('PostFonoCel',$this->PostFonoCel,true);
		$criteria->compare('idPais',$this->idPais,true);
		$criteria->compare('idDepartamento',$this->idDepartamento,true);
		$criteria->compare('idProvincia',$this->idProvincia,true);
		$criteria->compare('idDistrito',$this->idDistrito,true);
		$criteria->compare('PostDireccion',$this->PostDireccion,true);
		$criteria->compare('PostEmail',$this->PostEmail,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('PostFoto1',$this->PostFoto1,true);
		$criteria->compare('PostFoto2',$this->PostFoto2,true);
		$criteria->compare('PostFoto3',$this->PostFoto3,true);
		$criteria->compare('estadovideo1',$this->estadovideo1);
		$criteria->compare('estadovideo2',$this->estadovideo2);
		$criteria->compare('estadovideo3',$this->estadovideo3);
		$criteria->compare('PostProfesion1',$this->PostProfesion1,true);
		$criteria->compare('PostProfesion2',$this->PostProfesion2,true);
		$criteria->compare('PostProfesion3',$this->PostProfesion3,true);
		$criteria->compare('PostProduccion1',$this->PostProduccion1,true);
		$criteria->compare('PostProduccion2',$this->PostProduccion2,true);
		$criteria->compare('PostProduccion3',$this->PostProduccion3,true);
		$criteria->compare('PostWeb',$this->PostWeb,true);
		$criteria->compare('PostDispon',$this->PostDispon,true);
		$criteria->compare('PostPrefUbicacion',$this->PostPrefUbicacion,true);
		$criteria->compare('PostActivo',$this->PostActivo,true);
		$criteria->compare('PostFecIngreso',$this->PostFecIngreso,true);
		$criteria->compare('PostFecModifica',$this->PostFecModifica,true);
		$criteria->compare('PostEducacion',$this->PostEducacion,true);
		$criteria->compare('PostTituloObt',$this->PostTituloObt,true);
		$criteria->compare('PostFonoAlter',$this->PostFonoAlter,true);
		$criteria->compare('PostSexo',$this->PostSexo,true);
		$criteria->compare('PostreciboNoticias',$this->PostreciboNoticias);
		$criteria->compare('PostIngles',$this->PostIngles,true);
		$criteria->compare('PostComent',$this->PostComent,true);
		$criteria->compare('PostObjetivo',$this->PostObjetivo,true);
		$criteria->compare('PostBrochure',$this->PostBrochure,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('url_img',$this->url_img,true);
		$criteria->compare('rol',$this->rol);
		$criteria->compare('vid_prof1',$this->vid_prof1,true);
		$criteria->compare('vid_prof2',$this->vid_prof2,true);
		$criteria->compare('vid_prof3',$this->vid_prof3,true);
		$criteria->compare('vid_aprob1',$this->vid_aprob1,true);
		$criteria->compare('vid_aprob2',$this->vid_aprob2,true);
		$criteria->compare('vid_aprob3',$this->vid_aprob3,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Postulante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//IMPORTANTE
	public function getMenuDepartamento(){
		$departamento = UbicacionDepartamento::model()->findAll(array());
		return CHtml::listData($departamento, 'idDepartamento', 'Nombre');
	}
	
	public function getMenuProvincia($defaultDepto){
		$provincia = UbicacionProvincia::model()->findAll('idDepartamento=?',array($defaultDepto));
		return CHtml::listData($provincia, 'idProvincia', 'Nombre');
	}
	
	public function getMenuDistrito($defaultDist){
		$distrito = UbicacionDistrito::model()->findAll('idProvincia=?',array($defaultDist));
		return CHtml::listData($distrito, 'idDistrito', 'Nombre');
	}
	
	
	
}
