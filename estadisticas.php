<?php
    include_once('obtener_datos.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estadisticas</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="leaflet.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="leaflet.ie.css" /><![endif]-->
    <script src="jquery-1.10.2.min.js"></script>
    <script src="leaflet.js"></script>
    <script src="Chart.js"></script>
    <script src="flot/jquery.js" type="text/javascript"></script>
    <script src="flot/jquery.flot.js" type="text/javascript"></script>
    <script src="flot/jquery.flot.pie.js" type="text/javascript"></script>
    <style type="text/css">
        @font-face {
            font-family: 'digi';
            src: url('http://cssdeck.com/uploads/resources/fonts/digii/DS-DIGII.TTF');
        }
        .digi{
            font-family: 'digi';
            font-size: 28px;
            font-weight: bold;
        }
    </style>
    <script type="text/javascript">
    $(document).ready(function(){
        var datos = {
            km_recorridos: [15,10,0,20,30,0,0,],
            km_recorridos_amigos: [15,1,30,20,10,5,0,],
            calles_mas_recorridas: [
                { nombre_calle: 'san adolfo', kms_totales: 5 },
                { nombre_calle: 'vicuna mackenna', kms_totales: 20 },
                { nombre_calle: 'alameda', kms_totales: 30 },
            ],
        }
        var colores = ["#F38630","#E0E4CC","#69D2E7","#1dd2af","#2ecc71","#3498db","#9b59b6","#34495e","#f1c40f","#e67e22","#e74c3c","#95a5a6"];
        
        function mostrarVelocidades(){
            var data = {
                labels : <?php obtenerMostrarVelocidadesLabels($velocidades, $periodo); ?>,
                datasets: [
                    {
                        fillColor : "rgba(151,187,205,0.5)",
                        strokeColor : "rgba(151,187,205,1)",
                        data: <?php obtenerMostrarVelocidadesData($velocidades); ?>
                    }
                ]
            }
            var ctx = document.getElementById("velocidades").getContext("2d");
            var myNewChart = new Chart(ctx).Line(data,{scaleFontSize : 14});
        }

        function mostrarKmRecorridos(mostrarAmigos){
            var data = {
                labels : ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"],
                datasets : [
                    {
                        fillColor : "rgba(220,220,220,0.5)",
                        strokeColor : "rgba(220,220,220,1)",
                        data : datos.km_recorridos
                    },
                    {
                        fillColor : "rgba(151,187,205,0.5)",
                        strokeColor : "rgba(151,187,205,1)",
                        data : datos.km_recorridos_amigos
                    }
                ]
            }
            var ctx = document.getElementById("km_recorridos").getContext("2d");
            var myNewChart = new Chart(ctx).Line(data,{scaleFontSize : 14});
        }
        function mostrarCallesMasRecorridas(){
            $.plot($("#calles_mas_recorridas_canvas"), [ [[0, 0], [1, 1]] ], { yaxis: { max: 1 } });
            $('#calles_mas_recorridas').text('');
            var calles_mas_recorridas = Array();
            <?php for($i = 0 ; $i < 10 ; $i++): ?>
                <?
                    $resultados["ruta"][$i]["latitud"] = -33.5828406;
                    $resultados["ruta"][$i]["longitud"] = -70.56518849999999;
                ?>
                <?php $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$resultados["ruta"][$i]["latitud"].','.$resultados["ruta"][$i]["longitud"].'&sensor=true';?>
                $.ajaxSetup({'async': false});
                $.getJSON('<?php echo $url;?>', function( data ) {
                    if(data.status == "OK"){
                        var calle = data.results[0].address_components[1].long_name;
                        var esta = false;
                        for(var j = 0 ; j < calles_mas_recorridas.length ; j++){
                            if(calles_mas_recorridas[j].label == calle){
                                calles_mas_recorridas[j].data++;
                                esta = true;
                                break;
                            }
                        }
                        if(!esta){
                            mi_calle = Object();
                            mi_calle.label = calle;
                            //falta ditancia.....
                            mi_calle.data = 1;
                            
                            calles_mas_recorridas.push(mi_calle);
                        }
                    }
                });
            <?php endfor; ?>
            $('#calles_mas_recorridas').text('');
            console.log("Calles: "+calles_mas_recorridas);
            for(var i = 0 ; i < calles_mas_recorridas.length && i < 10 ; i++){
                $('#calles_mas_recorridas').append(calles_mas_recorridas[i].nombre_calle + "( "+calles_mas_recorridas[i].count+" )<br>");
                console.log(calles_mas_recorridas[i].nombre_calle + "( "+calles_mas_recorridas[i].count+" )<br>");
            }
            console.log(calles_mas_recorridas);
            $.plot('#calles_mas_recorridas_canvas', calles_mas_recorridas, {
                series: {
                    pie: {
                        show: true
                    }
                }
            });
        }

        function mostrarHuellaDeCarbono(){
            var km_promedio = 20;
            var rendimiento_promedio = 14;
            var huella_de_carbono_auto = 9.739 * km_promedio / rendimiento_promedio * 10;
            var huella_de_carbono_metro = 1.158 * 10;
            var huella_de_carbono_bicicleta = 1;
            var data = [
                    {
                        value: huella_de_carbono_bicicleta,
                        color:"#2ecc71"
                    },
                    {
                        value : huella_de_carbono_auto,
                        color : "#34495e"
                    },
                    {
                        value : huella_de_carbono_metro,
                        color : "#e74c3c"
                    }
                ]
            var ctx = document.getElementById("huella_de_carbono").getContext("2d");
            var myNewChart = new Chart(ctx).Pie(data);
        }

        mostrarKmRecorridos(true);
        mostrarCallesMasRecorridas();
        mostrarVelocidades();
        mostrarHuellaDeCarbono();
    });
    </script>
</head>
<body>
    <div id="calorias_quemadas">Calorias Quemadas: <?php echo caloriasQuemadas($distancia_total); ?></div>
    <div id="co2">Con tu recorrido le evitaste al planeta <?php echo kgCO2EmitidosAuto($distancia_total); ?></div>
    Velocidad Promedio
    <div id="velocidad_promedio" class="digi"><?php echo $velocidad_promedio; ?> km/h</div>
    Velocidad Maxima
    <div id="velocidad_maxima" class="digi"><?php echo $velocidad_maxima; ?> km/h</div>
    <div id="calles"></div>
    <table border="0">
        <tr id="estadisticas_kms"><td>Km Recorridos: </td><td></td></tr>
    </table>
    Calles mas recorridas:<br>
    <div id="calles_mas_recorridas"></div>
    <div id="calles_mas_recorridas_canvas" style="width:600px;height:300px"></div>
    Velocidades:<br>
    <canvas id="velocidades" width="400" height="400"></canvas>
    Distancia recorrida (vs amigos):<br>
    <canvas id="km_recorridos" width="400" height="400"></canvas>
    Huella de Carbono:<br>
    <canvas id="huella_de_carbono" width="400" height="400"></canvas>
    <script>
        var datos;

        function getAddress(overlay, latlng) {
          if (latlng != null) {
            address = latlng;
            geocoder.getLocations(latlng, showAddress);
          }
        }

        function showAddress(response) {
          //map.clearOverlays();
            //place = response.Placemark[0];
            //point = new GLatLng(place.Point.coordinates[1],place.Point.coordinates[0]);
            point = new GLatLng(10,10);
            marker = new GMarker(point);
            map.addOverlay(marker);
            marker.openInfoWindowHtml(
                '<b>orig latlng:</b>' + response.name + '<br/>' + 
                '<b>latlng:</b>' + place.Point.coordinates[1] + "," + place.Point.coordinates[0] + '<br>' +
                '<b>Status Code:</b>' + response.Status.code + '<br>' +
                '<b>Status Request:</b>' + response.Status.request + '<br>' +
                '<b>Address:</b>' + place.address + '<br>' +
                '<b>Accuracy:</b>' + place.AddressDetails.Accuracy + '<br>' +
                '<b>Country code:</b> ' + place.AddressDetails.Country.CountryNameCode);
            //alert(response.name);
        }
        var calles = Array();
        var hora_inicio = 13;
        var minuto_inicio = 30;
        var segundo_inicio = 00;
        var periodo = 1;

        //calles.push({ direccion: 'san adolfo 2915', tiempo_total });
        calles.push({ direccion: 'san adolfo 2915' });
        calles.push({ direccion: 'san adolfo 2915' });
        //console.log(calles);

        function mostrarCalles(cantidad){
            if(cantidad == null)
                cantidad = 10;
            $('#calles').text('');
            for(var i = 0 ; i < cantidad && i < calles.length ; i++){
                var texto = calles[i].direccion + ", tiempo: " ;
                $('#calles').html($('#calles').text() + texto);
            }
        }

        mostrarCalles(1);

        var comunas = Array();

        function obtenerDireccionExito(resultado){
            if(resultado.status == "OK"){
                nombre_calle = resultado.results[0].address_components[3].long_name;
                nombre_ciudad = resultado.results[0].address_components[2].long_name;
                var comuna = new Object();
                var calle = new Object();

                calle.direccion = nombre_calle;

                var indice = -1;
                for(var i=0;i<calles.length;i++){
                    if(calles[i].direccion == calle.direccion){
                        indice = i;
                        break;
                    }
                }
                if(indice == -1){
                    calle.cantidad = 1;
                    calles.push(calle);
                }else{
                    calles[indice].cantidad++;
                }
            }
        }

        function obtenerDireccion(latitud, longitud){
            /*latitud  = -33.5828427;
            longitud = -70.565176;//*/
            url = "http://maps.googleapis.com/maps/api/geocode/json?latlng="+latitud+","+longitud+"&sensor=true";
            $.ajax({
              url: url,
              success: obtenerDireccionExito,
            });
        }

        function obtenerDatos(funcion2){
            data = {
                Hola: 'c'
            }
            $.ajax({
              url: "obtener_datos.php",
              data: data,
              success: obtenerDatosExito,
            });
        }

        function obtenerDatosExito(resultado){
            //console.log(resultado);
            var datos = $.parseJSON(resultado);
            var distancia_total = 0;
            var rutas = datos['ruta'];
            for(i = 0;i<rutas.length - 1;i++){
                //console.log(datos[i]);
                var point = new L.Point(parseInt(rutas[i]['latitud']), parseInt(rutas[i]['longitud']));
                //console.log(parseInt(datos['latitud']),parseInt(datos['longitud']));
                var distancia = point.distanceTo(new L.point(parseInt(rutas[i+1]['latitud']), parseInt(rutas[i+1]['longitud'])));
                obtenerDireccion(parseInt(rutas[i]['latitud']),parseInt(rutas[i]['longitud']));
                distancia_total += distancia;
                /*if(i == rutas.length-1)
                    console.log(calles);//*/
            }
            $('#estadisticas_kms td:nth-child(2)').text(distancia_total.toFixed(2) + " kms");
        }
    </script>
</body>
</html>