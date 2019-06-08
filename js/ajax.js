  $(document).ready(function(){
	
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
	  