<?php
  require("lib/conexion.php");
  require("clases/Usuario.php");
  include ("cabecera.php");
  
  function correoCorrecto($str)
  {
    if (preg_match('/^[(a-z0-9\_\-\.)]+@[(a-z0-9\_\-\.)]+\.[(a-z)]{2,15}$/i',$str))
      return true;
    else
      return false;
  }

		$nombre="";
		$email="";
		$pass="";
		$pass2="";
		$msg="";
		if(isset($_POST['crear'])){
			$nombre=$_POST['nombre'];
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$pass2=$_POST['pass2'];
			if(!empty($nombre) and !empty($email)and !empty($pass)and !empty($pass2)){
				if(correoCorrecto($email)){
					if($pass==$pass2){
						$usr=new Usuario("",$nombre,$email,$pass);
						if(!$usr->buscarUsuario()){
							$msg=$usr->guardarUsuario();
						}
						else
							$msg="No se ha podido crear el usuario, el e-mail $email ya esta en uso";
					}
					else
						$msg="La contraseña no coincide";
				}
				else
					$msg="Correo incorrecto";
			}
			else
				$msg="Algún campo está vacio";
			
		}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	
	Nombre de Usuario:<br>
	<input type="text" name="nombre" size="4" value="<?php echo $nombre ?>"><br>
	e-mail:<br>
	<input type="text" name="email" value="<?php echo $email ?>"><br>
	Contraseña:<br>
	<input type="password" name="pass" value="<?php echo $pass ?>"><br>
	Repite la Contraseña:<br>
	<input type="password" name="pass2" value="<?php echo $pass2 ?>"><br>
	*Debe rellenar todos los campos <a href='login.php'> [ VOLVER AL PROGRAMA PRINCIPAL ] </a><br>
	<input type="submit" value="CREAR" name="crear">
	</form>
	<?php 
		echo $msg;
	?>
<?php
	include ("pie.php");
?>