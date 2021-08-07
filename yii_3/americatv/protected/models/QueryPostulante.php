<?php

    class QueryPostulante extends CActiveRecord {

        public function fullData($idUsuario){
			$row = Yii::app()->db->createCommand()
			->select('post.url_img, 
					  post.PostNombres,
					  post.PostApellPapa,
					  post.PostApellMama,
					  post.PostEmail,
					  post.PostDireccion,
					  prov.Nombre AS Provincia,
					  dist.Nombre AS Distrito,
					  post.idDistrito,
					  post.PostFonoFijo,
					  post.PostFecNac,
					  dep.Nombre AS Departamento,
					  post.PostFonoCel,
					  prof1.ProfDesc AS profesion1,
					  prof2.ProfDesc AS profesion2,
					  prof3.ProfDesc AS profesion3,
					  prod1.ProdDesc AS produccion1,
					  prod2.ProdDesc AS produccion2,
					  prod3.ProdDesc AS produccion3,
					  post.vid_prof1,
					  post.vid_prof2,
					  post.vid_prof3,
					  post.vid_aprob1,
					  post.vid_aprob2,
					  post.vid_aprob3,
					  post.PostObjetivo
					  
					  ' )
			->from('postulante post')
			->leftJoin('ubicacion_departamento dep', 'post.idDepartamento = dep.idDepartamento')
			->leftJoin('ubicacion_provincia prov', 'post.idProvincia = prov.idProvincia')
			->leftJoin('ubicacion_distrito dist', 'post.idDistrito = dist.idDistrito')
			->leftJoin('profesion prof1', 'post.PostProfesion1 = prof1.ProfCod')
			->leftJoin('profesion prof2', 'post.PostProfesion2 = prof2.ProfCod')
			->leftJoin('profesion prof3', 'post.PostProfesion3 = prof3.ProfCod')
			->leftJoin('producciones prod1', 'post.PostProduccion1 = prod1.idProd')
			->leftJoin('producciones prod2', 'post.PostProduccion2 = prod2.idProd')
			->leftJoin('producciones prod3', 'post.PostProduccion3 = prod3.idProd')
			->where('id_usuario = '.$idUsuario)
			->queryRow();
			return $row;
			
        }
		
		public function update_video($name, $value, $id){
			$row = Yii::app()->db->createCommand()
			->update('postulante', array(
				$name=>$value,
			), 'id_usuario=:id', array(':id'=>$id));	
        }
		
		
		public static function model($className=__CLASS__)
		  {
			return parent::model($className);
		  }
    }

