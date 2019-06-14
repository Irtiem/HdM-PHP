<?php
	include ("cabecera2.php");	
?>

        <!--================ Inicio Area de Servicios =================-->
        <section class="services_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Historias de Mazmorras</h2>				
        		</div>
		<!--================ Slider =================-->		
		<div class="flexslider">
			<ul class="slides">
				<li>
					<img src="img/slider/1.jpg" alt="Aquelarre" height="30%">
				</li>
				<li>
					<img src="img/slider/2.jpg" alt="Cthulhu" height="30%">
				</li>
				<li>
					<img src="img/slider/3.jpg" alt="Warhammer Fantasy" height="30%">
				</li>			
				<li>
					<img src="img/slider/4.jpg" alt="D&D" height="30%">
				</li>		
			</ul>
		</div>												
		<!--================ Slider =================-->

		<!--================ Formulario =================-->
	<form method="get"  name="formu" id="formu" method="post" >

		<p id="extra" style="color:#1E5C57"> </p>
		<!--================ Inicio Código Requisito =================-->
		<script>
			var d = new Date();
	
			date2 = d.toString();
			document.getElementById("extra").innerHTML = d;
	
			var nodoPadre = document.getElementById("extra");
			var nodoHijo = document.createTextNode("@info");
			nodoPadre.appendChild(nodoHijo);
			document.body.appendChild(nodoPadre);	
		</script>
		<!--================ Fin Código Requisito =================-->

<div id="datos">
</br>Nombre</br>
<input type="text" size="30" name="nombre" id="namae" onkeypress="return mayus(event,this)" >

</br>
</br>Contraseña</br>
<input type="password" size="40" id="contra1" name="pass" onchange="ComContra()" >

</br>
</br>Confirma tu Contraseña</br>
<input type="password" size="40" id="contra2" name="pass2"  onchange="ComContra()">
<p id="pp" style="display:none" > La contraseña no coincide o es menor de ocho caracteres</p>

</br>
</br>Fecha de Nacimiento</br>
<input type="day" name="dia" id="dia" min="1" max="31"onchange="tempo()"/>

	<select name="mes">
	    <option value="Enero" selected="selected"> Enero </option>
		<option value="Febrero">Febrero</option>
		<option value="Marzo">Marzo</option>
		<option value="Abril"> Abril </option>
		<option value="Mayo">Mayo </option>
		<option value="Junio">Junio</option>
		<option value="Julio">Julio</option>
		<option value="Agosto">Agosto</option>
		<option value="Septiembre">Septiembre</option>
		<option value="Octubre">Octubre</option>
		<option value="Noviembre">Noviembre</option>
		<option value="Diciembre">Diciembre</option>
	</select>
	
<input type="year" name="año" id="año" min="1900" max="2018" onchange="tempo()">
<p id="pdate" style="display:none" > Fecha no valida </p>
<br/>
<br/>


<div id="sex">
Sexo<br/>
<input type="radio" name="Sexo" value="Hombre" />Hombre
<input type="radio" name="Sexo" value="Mujer" />Mujer
<input type="radio" name="Sexo" value="Otros" />Otro

</div>

</br>
</br>Teléfono</br>
<input type="text" size="40" name="tele" id="tele" onchange="checktelef()">
<p id="ctlfn" style="display:none" > El teléfono introducido no es valido</p>

</br>
</br>Correo Electronico</br>
<input type="text" size="40" name="correo" id="correo" onchange="checkmail()">
<p id="cmail" style="display:none" > El correo no es valido </p>
</br>
</br>

<input type="checkbox" name="obli"  id="obli"  onchange="hola(this)" required/>
Acepto las condiciones del servicio y la política </br> de privacidad.<br/>
<p id="pd" style="display:none" > Debe marcar este campo </p>


</div>

<div id="pie">

<input type="submit" name="Enviar" value="Enviar Datos" onclick='check()'/>

<input type="reset" id="res" name="Borrar Datos" value="Borrar Datos" /><br/>

</div>



</form>
		<!--================ Fin Formulario =================-->

        		<div class="row feature_inner">
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-user"></i>Mucha Variedad</h4>
        					<p>Encontrarás partidas de muchos roles distintos que quizás no conozcas.</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-license"></i>Calidad</h4>
        					<p>Todas las aventuras y modulos han sido revisados para asegurar su contenido.</p>
        				</div>
        			</div>
        			<div class="col-lg-4 col-md-6">
        				<div class="feature_item">
        					<h4><i class="lnr lnr-phone"></i>Gran Comunidad</h4>
        					<p>Esperamos disponer de una gran comunidad para crear partidas increibles.</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================ Fin Area de Servicios =================-->
<?php
	include ("pie2.php");
?>