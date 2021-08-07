<?php
class DbHandler{
	private $mysqli;
	
	function connect($pre = ''){
		$r = fopen($pre.'conf.json', 'r');
		$contents = fread($r, filesize($pre.'conf.json'));
		$conf = json_decode($contents);	
		$mysqli = new mysqli($conf->host, $conf->username, $conf->password, 'click2call_v2');
		if (mysqli_connect_error()){
			return false;
		}
		else{
			$this->mysqli = $mysqli;
			return true;	
		}
	}
	
	function getUsers(){
		//tomo todos los usuarios que sean ejecutivos y que tengan el chat activo
		$query = "select * from `usuarios_listado` WHERE tipo='Normal' AND videochat='1'";
		return $this->mysqli->query($query);
	}
	
	function authAdmin($data){
		$query = "select * from `usuarios_listado` where `usuario` = '".$this->mysqli->real_escape_string($data['usuario'])."' and `password` = '".$this->mysqli->real_escape_string($data['password'])."' and `tipo` = 'Administrador'";
		$result = $this->mysqli->query($query);
		if($result->num_rows == 0){
			$_SESSION['authed'] = 0;
			$_SESSION['plainuserauth'] = 0;
			return false;
		}
		else{
			$_SESSION['authed'] = 1;
			$_SESSION['plainuserauth'] = 1;
			$therow = $result->fetch_array(MYSQLI_ASSOC);
			$_SESSION['user'] = $therow;
			return true;
		}	
	}
	
	function authUser($data){
		if($this->authAdmin($data)){
			return true;	
		}
		else{
			$query = "select * from `usuarios_listado` where `usuario` = '".$this->mysqli->real_escape_string($data['usuario'])."' and `password` = '".$this->mysqli->real_escape_string($data['password'])."' ";
			$result = $this->mysqli->query($query);
			if($result->num_rows == 0){
				$_SESSION['plainuserauth'] = 0;
				return false;
			}
			else{
				$_SESSION['plainuserauth'] = 1;
				$therow = $result->fetch_array(MYSQLI_ASSOC);
				$_SESSION['user'] = $therow;
				return true;
			}
		}
	}
	
	function addUser($data){
		$query = "insert into `usuarios_listado` set 
			`Nombre` = '".$this->mysqli->real_escape_string($data['Nombre'])."',
			`usuario` = '".$this->mysqli->real_escape_string($data['usuario'])."',
			`password` = '".$this->mysqli->real_escape_string($data['password'])."' ";
		$this->mysqli->query($query);
	}
	
	function checkUsername($data){
		$query = "select * from `usuarios_listado` where `usuario` = '".$this->mysqli->real_escape_string($data['usuario'])."' and `idUsuario` != ".$data['exclude'];
		$result = $this->mysqli->query($query);
		if($result->num_rows == 0){
			return true;
		}
		else{	
			return false;
		}
	}
	
	function getUser($idUsuario){
		$query = "select * from `usuarios_listado` where `idUsuario` = '".$idUsuario."'";
		$result = $this->mysqli->query($query);
		if($result->num_rows == 0){
			return false;	
		}
		else{
			return mysqli_fetch_array($result, MYSQLI_ASSOC);	
		}
	}
	
	function saveUser($data){
		$query = "update `usuarios_listado` set 
			`Nombre` = '".$this->mysqli->real_escape_string($data['Nombre'])."',
			`usuario` = '".$this->mysqli->real_escape_string($data['usuario'])."',
			`password` = '".$this->mysqli->real_escape_string($data['password'])."'
			where `idUsuario` = '".$data['idUsuario']."'";
		$this->mysqli->query($query);
	}
	
	function deleteUser($idUsuario){
		$query = "delete from `usuarios_listado` where `idUsuario` = '".$idUsuario."'";
		$this->mysqli->query($query);
	}
}
?>