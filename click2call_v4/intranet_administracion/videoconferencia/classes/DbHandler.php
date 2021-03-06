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
		$query = "select * from `usuarios_listado`";
		return $this->mysqli->query($query);
	}
	
	function authAdmin($data){
		$query = "select * from `usuarios_listado` where `usuario` = '".$this->mysqli->real_escape_string($data['username'])."' and `password` = '".$this->mysqli->real_escape_string($data['password'])."' and `tipo` = 'Administrador'";
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
			$query = "select * from `usuarios_listado` where `usuario` = '".$this->mysqli->real_escape_string($data['username'])."' and `password` = '".$this->mysqli->real_escape_string($data['password'])."'";
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
			`Nombre` = '".$this->mysqli->real_escape_string($data['name'])."',
			`usuario` = '".$this->mysqli->real_escape_string($data['username'])."',
			`password` = '".$this->mysqli->real_escape_string($data['password'])."' ";
		$this->mysqli->query($query);
	}
	
	function checkUsername($data){
		$query = "select * from `usuarios_listado` where `usuario` = '".$this->mysqli->real_escape_string($data['username'])."' and `idUsuario` != ".$data['exclude'];
		$result = $this->mysqli->query($query);
		if($result->num_rows == 0){
			return true;
		}
		else{	
			return false;
		}
	}
	
	function getUser($id){
		$query = "select * from `usuarios_listado` where `idUsuario` = '".$id."'";
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
			`Nombre` = '".$this->mysqli->real_escape_string($data['name'])."',
			`usuario` = '".$this->mysqli->real_escape_string($data['username'])."',
			`password` = '".$this->mysqli->real_escape_string($data['password'])."'
			where `idUsuario` = '".$data['id']."'";
		$this->mysqli->query($query);
	}
	
	function deleteUser($id){
		$query = "delete from `usuarios_listado` where `idUsuario` = '".$id."'";
		$this->mysqli->query($query);
	}
}
?>