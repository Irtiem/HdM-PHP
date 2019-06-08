<?php
	include ("cabecera.php");
	
	$pagina="jugar";
	if(isset($_GET['p']))
		$pagina= $_GET['p'];	
?>



		<!--================ Código Ajax =================-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!--================ Código Ajax =================-->		
<script>
  $(document).ready(function(){
	$("#parrafo").fadeOut(3000);
	$("#parrafo").slideDown("slow");
	$("#parrafo").fadeIn(3000);
	
  /*----------------------------------------Ubicación y temperatura----------------------------------------*/
	navigator.geolocation.getCurrentPosition(Ubicacion, error);
	
		function Ubicacion(posicion) {
			var Latitud = posicion.coords.latitude;
			var Longitud = posicion.coords.longitude;
			

			
			$.ajax({
				type: 'GET',
				url: 'http://api.openweathermap.org/data/2.5/weather?lat='+ Latitud +'&lon=' + Longitud + "&units=metric&appid=9f50a805aa0089a1edd1829a5db029f0",
				dataType: 'jsonp'
			})
	
			.done(function(data){
			
			console.log(data);
			var ciudad = data.name;
			var tiempo = data.main.temp;
			var hume = data.main.humidity;
			$("#parrafo").html("En " + ciudad + " hace " + tiempo + " grados y su humedad es " + hume + ".");
			})
	  
			.fail(function(){
				alert("Fallo al conectar con el servidor");
			})			
			
		
		}
	  
		function error() {
			alert("No se puedo encontrar su ubicación");
			}
			
		});	
		
  /*----------------------------------------Ubicación y temperatura----------------------------------------*/	  
	  
</script>	
	
	
	
	
	
	

        
        <!--================Services Area =================-->
        <section class="services_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Historias de Mazmorra</h2>
					<p>Que Ofrecemos</p>
        		</div>
        		<div class="row services_inner">
        			<div class="col-lg-4">
        				<div class="services_item">
        					<img src="img/icon/pdf.jpg" alt="">
        					<a href="#"><h4>PDF de Aventuras</h4></a>
        					<p>Aventuras de todo tipo de roles y ambientaciones.</p>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="services_item">
        					<img src="img/icon/gema.jpg" alt="">
        					<a href="#"><h4>Totalmente Gratis</h4></a>
        					<p>Contenido totalmente gratuito y fácil de conseguir.</p>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="services_item">
        					<img src="img/icon/grim.jpg" alt="">
        					<a href="#"><h4>Lore y mucho más</h4></a>
        					<p>Noticias, modulos e historias del mundo del rol.</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Services Area =================-->
        
        <section class="builder_area">
        	<div class="main_title">
        		<h2>Últimos modulos añadidos</h2>
        	</div>
			<div class="row m0 builder_inner">
				<div class="builder_item">
					<img src="img/news/kult.jpg" alt="Kult: Divinidad Perdida">
				</div>				
				<div class="builder_item">
					<img src="img/news/kult_banner02.jpg" alt="Kult: Divinidad Perdida">

				</div>					
				<div class="builder_item">
					<img src="img/news/kult_02.jpg" alt="Kult: Divinidad Perdida">

				</div>					
			</div>
        </section>
        <!--================End Builder Image Area =================-->
        

        

        
        <!--================Feature Area =================-->
        <section class="feature_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Kult: Divinidad Perdida</h2>
        			<p>
En KULT: Divinidad Perdida, los protagonistas son personas que se involucran en eventos relacionados con su pasado, o de una u otra forma son arrastrados a ellos. Los pecados cometidos les dan caza, exigiendo redención. Los temores de la infancia afloran manifestándose en forma física.
Estos terrores toman su forma en base a lo que se esconde dentro de nosotros, así que no podemos percibir todo lo que existe ahí fuera sin ver esos horrores reflejados en nosotros mismos. Todo ser humano tiene sus propios demonios, su propio purgatorio.

En las historias que contaremos en KULT: Divinidad Perdida, los protagonistas se ven obligados a transitar en el abismo, tal vez incluso a través del umbral de la muerte misma, solo para descubrir que no hay destino final. La muerte es solo el principio.

Los oráculos y profetas buscan nuestra atención con sus graffiti con significados ocultos, a través de sus divagaciones en blogs dedicados a las conspiraciones, y parandonos por la calle y gritando la Verdad en nuestros rostros con estruendosos monólogos. Sin embargo, inmediatamente volvemos nuestra mirada hacia la luz reconfortante de las pantallas de nuestros dispositivos móviles y seguimos caminando como si nada hubiera pasado.

En las historias que contaremos en KULT: Divinidad Perdida, los personajes principales despiertan de su letargo y se dan cuenta de que todo lo que creían saber es una mentira, al igual que toda su vida anterior.

					</p>
        		</div>
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
        <!--================End Feature Area =================-->
        
<?php
	include ("pie.php");
?>
