<?php
class Usuario {
	
	private $id_usr; 
	private $nombre;
	private $email;
	private $pass; 
	

	function __construct($id_usr,$nombre,$email,$pass) {
		$this->id_usr=$id_usr;
		$this->nombre=$nombre;
		$this->email=$email;
		$this->pass=$pass;
	}
	
	public function guardarUsuario(){
		$msg="";
		$sql = "insert into usuarios values(null,'$this->nombre','$this->email','$this->pass')";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Usuario $this->email guardado correctamente";
		else{
			$msg="Error al guardar usuario en la  BD". $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}

	public function modificaUsuario(){
		$msg="";
		$sql = "update usuarios set nombre='$this->nombre', pass='$this->pass' where  email='$this->email'";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Usuario $this->email modificado correctamente";
		else{
			$msg="Error al modificar usuario en la  BD". $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}
	
	public function buscarUsuario(){
		//busca un usuario a partir de su email, si lo encuentra devuelve un array con los datos del usuario, sino false
		$sql="select * from usuarios where email='$this->email'";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$linea=$res->fetch_assoc();
		else
			$linea=false;
		$res->free();
		Conexion::desconectarBD($conexion);

		return $linea;
	}
	
	public function buscarUsuarioPass(){
		//busca un usuario a partir de su email y password, si lo encuentra devuelve un array con los datos del usuario, sino false
		$sql="select * from usuarios where email='$this->email' and pass='$this->pass'";
		//echo $sql;
		$linea=NULL;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$linea=$res->fetch_assoc();
		$res->free();
		Conexion::desconectarBD($conexion);

		return $linea;
	}

}
?>
