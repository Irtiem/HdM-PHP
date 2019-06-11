<?php
class Comentario {
	
	private $id; 
	private $autor;
	private $texto; 
	private $email;
	private $fecha;
	private $id_usr;
		
	

	function __construct($id,$autor,$texto,$email,$fecha,$id_usr) {
		$this->id=$id;
		$this->autor=$autor;
		$this->texto=$texto;
		$this->email=$email;
		$this->fecha=$fecha;
		$this->id_usr=$id_usr;
	}
	
	public function guardarComentario(){
		$msg="";
		$sql = "insert into comentarios values(null,'$this->texto','$this->fecha','$this->id_usr')";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Comentario guardado correctamente";
		else{
			$msg="Error al guardar el comentario";
			$msg.= $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}

	public static function verComentarios($cuantos,$comienzo){
		$comentarios=[];
		$sql="select * from comentarios,usuarios where comentarios.id_usr=usuarios.id_usr order by id desc limit $comienzo, $cuantos ";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$comentarios[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $comentarios;
	}

	public static function totalComentarios(){
		$total=0;
		$sql="select count('id') as 'total' from comentarios";
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$fila=$res->fetch_assoc();
			$total=$fila['total'];
		$res->free();
		Conexion::desconectarBD($conexion);
		return $total;
	}
}
?>
