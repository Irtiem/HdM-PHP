<?php
	session_start();
	include ("cabecera.php");
	

	
	if(isset($_COOKIE['PUBLICAR'])) //para evitar publicar seguido, cuando se publica se publica una cookie que desaparece al pasar 10 segundos
		$publicar=false;
	else
		$publicar=true;
	require_once("lib/conexion.php");
	require_once("clases/Usuario.php");
	require("clases/Comentario.php");
	require("lib/fecha.php");
	define("COMENTxPAG", 5);
	define("ESPERA", 10); //TIEMPO A ESPERAR ANTES DE PUBLICAR OTRA VEZ
	$msg="";
	if(isset($_POST['login'])){
		$usr=new Usuario("","",$_POST['email'],$_POST['pass']);
		$res=$usr->buscarUsuarioPass();
		if($res==NULL)
			$msg= "LOGIN INCORRECTO";
		else{
			$_SESSION['email']=$res['email'];
			$_SESSION['nombre']=$res['nombre'];
			$_SESSION['id_usr']=$res['id_usr'];
		}
	}
	
	if(isset($_SESSION['email']))
		$email=$_SESSION['email']; //si no está establecida la variable $email, no hay sesión activa
	if(isset($_SESSION['nombre']))
		$nombre=$_SESSION['nombre'];
	else
		$nombre="";
	if(isset($_SESSION['id_usr']))
		$id_usr=$_SESSION['id_usr'];
	else
		$id_usr="";
	
	if(isset($_GET['a'])){
		$accion=$_GET['a'];
		if($accion=="logout"){
			unset($_SESSION['email']);
			unset($_SESSION['nombre']);
			unset($_SESSION['id_usr']);
			unset($email);
			$nombre="";
			$id_usr="";
		}
	}
	
 //EVITAR REENVIO HACINDO ESPERAR CON UNA COOKIE QUE ESTE EN EL SISTEMA 1 MINUTO
?>
<html>
<head>
  <title>Foro HdM</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>


<?php
////////////////////////////////////

$comienzo=0;
if(isset($_GET['comienzo'])){
  $comienzo= $_GET['comienzo'];
}
if (isset($_POST['publicar'])){
  if($publicar){
	  if (isset($_POST['texto'])) { 
		$texto = $_POST['texto'];
		$texto = stripslashes(nl2br(htmlspecialchars($texto)));
		$fecha = date("Y-m-d:H:i:s");
		$comentario= new Comentario("",$nombre,$texto,$email,$fecha,$id_usr);
		$msg=$comentario->guardarComentario();
		
	   
	  }
	  else
		$msg="Faltan datos";
  }
	else
		$msg="Ahora no puedes publicar espera".ESPERA." segundos ";
}

?>
<h1>Inicia sesión para poder comentar en el foro</h1>
<?php 
	echo $msg."<br>";
	echo "<ul>";
	echo "<li><a href='crearUsuario.php'>CREAR USUARIO<a></li>";
	if(!isset($email)){
		
		echo "<li><a href='hacerLogin.php'>LOGIN</a>";
		echo "</ul>";
	}
	else{
		echo "<li><a href='".$_SERVER['PHP_SELF']."?a=logout'>LOGOUT</a></li>";
		echo "<li><a href='modificarUsuario.php'>MODIFICAR USUARIO<a></li>";
		echo "</ul>";
	
?>
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	Tu comentario:<br>
	<textarea cols="55" rows="4" name="texto"  ></textarea><br>
	Tu nombre:<br>
	<input type="text" name="nombre" size="20" value="<?php echo $nombre ?>" readonly><br>
	Tu e-mail:<br>
	<input type="text" name="email" value="<?php echo $email ?>" readonly>
	<input type="submit" value="Publicar" name="publicar">
	</form>
<h3>Mostrando los comentarios <?php echo $comienzo+1 ." a ". (COMENTxPAG+$comienzo)?> desde los más recientes hacia atrás</h3>
<?php
	}
  $total=Comentario::totalComentarios();
  $comentarios=Comentario::verComentarios(COMENTxPAG,$comienzo);
  $cuantos=count($comentarios);
  //var_dump($comentarios);
  for($cont=0;$cont<$cuantos;$cont++){
      $comentario = $comentarios[$cont]['comentario'];
      $nombre = $comentarios[$cont]['nombre'];
      $email = $comentarios[$cont]['email'];
      $fecha=$comentarios[$cont]['fecha'];
      $email = "<a href=\"mailto:$email\">$email</a>";  
      $entrada="<p><b>$nombre</b> ($email) escribió en <i>$fecha</i>:<br>$comentario</p>\n";  
      echo $entrada;    
  }
  if ($total>5){
    if ($comienzo+COMENTxPAG< $total){
        $comienzo=$comienzo+COMENTxPAG;
        $verAnteriores="<a href='".$_SERVER['PHP_SELF']."?comienzo=$comienzo'>Ver Anteriores </a>";
    }
    else
        $verAnteriores="";
    echo "<br><br> $verAnteriores &nbsp;&nbsp;<a href='{$_SERVER['PHP_SELF']}'>Volver Principio </a>";
  }
?>












<?php
	include ("pie.php");
?>