<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_name;

	public function authenticate()
	{
		
	/* ***************************************************************************************************************************/
	/*                                               TRABAJO CON LAS COCKIES                                                     */
	/* ***************************************************************************************************************************/
		//Elimino cualquier rastro de cockie
		if(isset($_COOKIE['pid_token'])) {
			unset($_COOKIE['pid_token']);
			unset($_COOKIE['sess_demo']);
			unset($_COOKIE['sess_demo_name']);
			unset($_COOKIE['sess_demo_correo']);
			unset($_COOKIE['sess_demo_apellidos']);
			unset($_COOKIE['sess_demo_avatar']);
			unset($_COOKIE['sess_demo_nickname']);
			unset($_COOKIE['sess_demo_pais']);

			setcookie('pid_token', '', time() - 10200);	
			setcookie('sess_demo', '', time() - 10200); 
			setcookie('sess_demo_name', '', time() - 10200); 
			setcookie('sess_demo_correo', '', time() - 10200); 
			setcookie('sess_demo_apellidos', '', time() - 10200); 
			setcookie('sess_demo_avatar', '', time() - 10200); 
			setcookie('sess_demo_nickname', '', time() - 10200); 
			setcookie('sess_demo_pais', '', time() - 10200); 

		}
		
		
		//Se verifica la existencia de la cockie con los datos del usuario
		if(isset($_COOKIE['pid_token'])){
			
			$url = "http://peruid.pe/index.php/service/auth_rest/token";
			$params = array('key'=>$_COOKIE['pid_token'], 'portal'=>'9702824bf1059d44f8a879e070b5b57c', 'format'=>'json');
				
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
					
			$response = curl_exec($ch);
			curl_close ($ch);

			$result = json_decode($response,true);
			setcookie("pid_token", $result['token'], time() + 7200, '/');
		
		//Si no existe se crea una nueva en peru id
		}else{
		
			$url = "http://peruid.pe/index.php/service/connect_rest/session";
			$usuario = $this->username;
			$password = $this->password;
			$params = array('portal'=>'9702824bf1059d44f8a879e070b5b57c','usuario'=>$usuario,'password'=>$password, 'format'=>'json');
				
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
			$response = curl_exec($ch);
			curl_close ($ch);

			$result = json_decode($response,true);
			
			//Si el usuario existe se guardan los datos en la cockie
			if($result['session'] == 1){
				setcookie("sess_demo", serialize($result['user']), time() + 10200, '/');
				setcookie("sess_demo_name",      $result['user']['nombres'], time() + 7200, '/');
				setcookie("sess_demo_correo",    $result['user']['correo'], time() + 7200, '/');
				setcookie("sess_demo_apellidos", $result['user']['apellidos'], time() + 7200, '/');
				setcookie("sess_demo_avatar",    $result['user']['avatar'], time() + 7200, '/');
				setcookie("sess_demo_nickname",  $result['user']['nickname'], time() + 7200, '/');
				setcookie("sess_demo_pais",      $result['user']['pais'], time() + 7200, '/');
				setcookie("pid_token",           $result['token'], time() + 7200, '/');
			//si este no existe se crea una cockie sin datos
			}else{
				setcookie("sess_demo", '', time() - 10200, '/');
			}
		
		}
	/* ***************************************************************************************************************************/
	/*                                             TRABAJO CON LA BASE DE DATOS                                                  */
	/* ***************************************************************************************************************************/
	
		$record=Postulante::model()->findByAttributes(array('user_atv'=>$this->username));
        if($record===null){
			//si no existe en la base de datos pero si existe en peru id
			if($result['user']['correo']!=''){
			//Se guarda al usuario en la bd
			$postulante = new Postulante_2;
			if(!empty($result['user']['nombres'])&&$result['user']['nombres']!='')     { $postulante->PostNombres    = $result['user']['nombres'];}
			if(!empty($result['user']['apellidos'])&&$result['user']['apellidos']!='') { $postulante->PostApellPapa  = $result['user']['apellidos'];}
			if(!empty($result['user']['correo'])&&$result['user']['correo']!='')       { $postulante->user_atv       = $result['user']['correo'];}
			if(!empty($result['user']['correo'])&&$result['user']['correo']!='')       { $postulante->PostEmail      = $result['user']['correo'];}
			if(!empty($result['user']['avatar'])&&$result['user']['avatar']!='')       { $postulante->url_img        = $result['user']['avatar'];}
			
			if(!empty($result['user']['nickname'])&&$result['user']['nickname']!='')   { 
				$postulante->alias  = $result['user']['nickname'];
			}else{
				$postulante->alias  = 'Anonimo';
			}
			$postulante->rol            = 1;
			$postulante->save(false);
			
			//Vuelvo a buscar al usuario
			$loginusr=Postulante::model()->findByAttributes(array('user_atv'=>$this->username));
			$this->_id=$loginusr->id_usuario;
			$this->_name=$loginusr->PostNombres;
            $this->errorCode=self::ERROR_NONE;
			
			//Si no existe en ninguno de los dos sistemas
			}else{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}

        //}else if(!CPasswordHelper::verifyPassword($this->password,$record->password))
        //   $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }else{
			//Se actualizan los datos desde la sesion de peruid
			$ser = Postulante_2::model()->findByPk($record->id_usuario);
            $ser->url_img = $result['user']['avatar']; 
            $ser->save(false);
			//Se definen variables para la sesion
            $this->_id=$record->id_usuario;
			$this->_name=$record->PostNombres;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;

	}

	public function getId(){
        return $this->_id;
    }
	public function getName(){
        return $this->_name;
    }

		
}