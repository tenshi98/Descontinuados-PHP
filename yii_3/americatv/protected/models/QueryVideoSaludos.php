<?php

    class QueryVideoSaludos extends CActiveRecord {


		public function miSaludo($id){

			$row = Yii::app()->db->createCommand()
			->select('saludos_videos_enviados.asunto,
					  saludos_videos_enviados.mensaje,			
					  prof1.archivo AS vid01,
					  prof2.archivo AS vid02,
					  prof3.archivo AS vid03,
					  prof4.archivo AS vid04,
					  saludos_videos_enviados.sal01 AS sal01,
					  saludos_videos_enviados.sal02 AS sal02,
					  saludos_videos_enviados.sal03 AS sal03,
					  saludos_videos_enviados.sal04 AS sal04

					  ')
			->from('saludos_videos_enviados')
			->leftJoin('saludos_videos_listado prof1', 'saludos_videos_enviados.sal01 = prof1.idVideoList')
			->leftJoin('saludos_videos_listado prof2', 'saludos_videos_enviados.sal02 = prof2.idVideoList')
			->leftJoin('saludos_videos_listado prof3', 'saludos_videos_enviados.sal03 = prof3.idVideoList')
			->leftJoin('saludos_videos_listado prof4', 'saludos_videos_enviados.sal04 = prof4.idVideoList')
	
			->where('idSaludo = '.$id)
			->queryRow();
			return $row;
	
        }
		
		public function miTarjeta($id){

			$row = Yii::app()->db->createCommand()
			->select('saludos_tarjetas_enviados.asunto,
					  saludos_tarjetas_enviados.mensaje,
					  saludos_tarjetas_enviados.VideoSaludo AS video,
					  saludos_tarjetas_listado.img AS foto,
					  saludos_tarjetas_musica.NombreArchivo AS musica

					  ')
			->from('saludos_tarjetas_enviados')
			->leftJoin('saludos_tarjetas_listado', 'saludos_tarjetas_listado.idTarjetaList = saludos_tarjetas_enviados.tarjeta')
			->leftJoin('saludos_tarjetas_musica', 'saludos_tarjetas_musica.idMusica = saludos_tarjetas_enviados.idMusica')
	
			->where('saludos_tarjetas_enviados.idTarjetas = '.$id)
			->queryRow();
			return $row;
	
        }
		
		public function miVideo($id, $video){
		
			switch ($video) {
				case 1: $columna = 'vid_prof1'; $talento = 'PostProfesion1'; break;
				case 2: $columna = 'vid_prof2'; $talento = 'PostProfesion2'; break;
				case 3: $columna = 'vid_prof3'; $talento = 'PostProfesion3'; break;
			}

			$row = Yii::app()->db->createCommand()
			->select('postulante.'.$columna.' AS video,
					  profesion.ProfDesc AS talento
			')
			->from('saludos_talento')
			->leftJoin('postulante', 'postulante.id_usuario = saludos_talento.id_usuario')
			->leftJoin('profesion', 'profesion.ProfCod = postulante.'.$talento)
			->where('idTalento = '.$id)
			->queryRow();
			return $row;
	
        }
		
		public function update_contador($tabla,$columna,$valor,$identificador,$id){
			$row = Yii::app()->db->createCommand()
			->update($tabla, array(
				$columna=>$valor,
			), $identificador.'=:id', array(':id'=>$id));	
        }
		
		public function musicId($file){
		
			$row = Yii::app()->db->createCommand()
			->select('idMusica')
			->from('saludos_tarjetas_musica')
			->where("NombreArchivo = '".$file."'")
			->queryRow();
			return $row;
	
        }
		
		public function update_saludo($tabla,$columna,$valor,$identificador,$id){
			$row = Yii::app()->db->createCommand()
			->update($tabla, array(
				$columna=>$valor,
			), $identificador.'=:id', array(':id'=>$id));	
        }
		
		public function correosSaludo($id){

			$row = Yii::app()->db->createCommand()
			->select('correo1, correo2, correo3, correo4, correo5')
			->from('saludos_tarjetas_enviados')
			->where('saludos_tarjetas_enviados.idTarjetas = '.$id)
			->queryRow();
			return $row;

        }
		

		public static function model($className=__CLASS__)
		  {
			return parent::model($className);
		  }
    }

