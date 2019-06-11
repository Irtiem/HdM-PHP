<?php
	session_start();
	include ("cabecera.php");
	if(isset($_SESSION['email'])){
		$email=$_SESSION['email'];
	}
	else{
		$email="";
	}
  require_once("lib/conexion.php");
  require_once("clases/Usuario.php");
 ?>

	<?php
		$nombre="";
		$pass="";
		$pass2="";
		$msg="";
		if(isset($_POST['modif'])){
			$nombre=$_POST['nombre'];
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$pass2=$_POST['pass2'];
			if(!empty($nombre) and !empty($email)and !empty($pass)and !empty($pass2)){
				if($pass==$pass2){
					$usr=new Usuario("",$nombre,$email,$pass);
					$msg=$usr->modificaUsuario();
				}
				else
					$msg="Los password no coinciden";
			}
			else
				$msg="Algún campo está vacio";
			
		}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	
	e-mail:<br>
	<input type="text" name="email" value="<?php echo $email ?>" ><br>
	nombre:<br>
	<input type="text" name="nombre" size="4" value="<?php echo $nombre ?>"><br>
	pass:<br>
	<input type="password" name="pass" value="<?php echo $pass ?>"><br>
	repite pass:<br>
	<input type="password" name="pass2" value="<?php echo $pass2 ?>"><br>
	*Es obligatorio completar todos los campos <a href='login.php'> [ VOLVER AL PROGRAMA PRINCIPAL ] </a><br>
	<input type="submit" value="MODIFICAR" name="modif">
	</form>
	<?php 
		echo $msg;
	?>
	<?php
	include ("pie.php");
?>
