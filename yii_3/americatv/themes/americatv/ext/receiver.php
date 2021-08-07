<?php
$token = $_POST['token'];
token($token);

function token($token = false)
{	
        header('Content-Type: application/javascript');
        
        $return = new stdClass();
        $return->sesion = false;
        $return->usuario = null;

        if($token != 'false')
        {	
                if(!$_COOKIE['sess_demo']) // sesión no iniciada
                {
                        $return = servicio($token);
                }
                else
                {	
                        
                        if($_COOKIE['pid_token']!= $token) // token diferente al de session
                        {
                                $return = servicio($token);
                        }
                        elseif($_COOKIE['version'] != $_POST['version']) // si la versión de usuario es la misma
                        {
                                $return = servicio($token);
                        }
                        else
                        {
                                $return->sesion = true;
                        }
                }
        }
        else // no hay sesión de PerúID
        {	
                if($_COOKIE['sess_demo']){
                    setcookie("sess_demo", '', time() - 7200, '/');
                    setcookie("pid_token", '', time() - 7200, '/');
                }
        }
        echo json_encode($return);
}

function servicio($token)
{		
		$return = new stdClass();
        $return->sesion = false;
        $return->usuario = null;
        $pid_data = json_decode(file_get_contents('http://peruid.pe/index.php/service/usuarios/getusers/format/json/token/'.$token));
		
        if(is_array($pid_data))
        {
                $user = array_shift($pid_data);
$avatar_url = $user->avatar_url;
unset($user->correo, $user->fecha, $user->pais, $user->avatar_url);

                if(is_object($user))
                {
                       $session = array('ecoid'=>$user->ecoid,
                                         'nombre'=>$user->nombres,
                                         'nombres'=>$user->nombres,
                                         'avatar_url'=>$avatar_url,
                                         'token'=>$token);
					   $sess_demo = serialize($session);
                        
                        setcookie("sess_demo", $sess_demo, time() + 7200, '/');
                        $return->sesion = true;
                        $return->usuario = $session;

                        setcookie("pid_token", $token, time() + 7200, '/');

                }
                else
                {
                        setcookie("sess_demo", '', time() - 7200, '/');
                }

        }

        return $return;
}
