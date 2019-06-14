<?php
	include ("cabecera.php");
?>
	<form action="login.php" method="post">
	
		e-mail:<br>
		<input type="text" name="email" value=""><br>
		pass:<br>
		<input type="password" name="pass" value=""><br>
	
		<input type="submit" value="LOGIN" name="login">
	</form>
<?php
	include ("pie.php");
?>