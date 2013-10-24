<?php
	function segundosATiempo($tiempo_total){
		$horas = floor($tiempo_total / 3600);
		$minutos = floor(($tiempo_total / 60) % 60);
		$segundos = $tiempo_total % 60;
		return array(
			'horas' => $horas,
			'minutos' => $minutos,
			'segundos' => $segundos,
		);
	}
	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);
	  if($unit == "M")
	  	return ($miles * 1.609344) / 1000;
	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}
	$periodo = 5;
	$datos['mostrarCallesMasRecorridas']['ruta'] = array(
		// Coordenadas de AUTOPISTA CENTRAL - ULA
		array( 'latitud' => -33.45407558405542, 'longitud' => -70.69049835205078),
		array( 'latitud' => -33.453914459285514, 'longitud' => -70.69009065628052),
		array( 'latitud' => -33.45373543141228, 'longitud' => -70.68991899490356),
		array( 'latitud' => -33.45369962579327, 'longitud' => -70.6895112991333),
		array( 'latitud' => -33.4535205974765, 'longitud' => -70.68914651870728),
		array( 'latitud' => -33.453466888909404, 'longitud' => -70.68878173828125),
		array( 'latitud' => -33.45343108317951, 'longitud' => -70.6883955001831),
		array( 'latitud' => -33.45339527743484, 'longitud' => -70.6880521774292),
		array( 'latitud' => -33.453287860112134, 'longitud' => -70.6877088546753),
		array( 'latitud' => -33.453180442656375, 'longitud' => -70.68736553192139),
		array( 'latitud' => -33.453180442656375, 'longitud' => -70.68736553192139),
		array( 'latitud' => -33.45303721917504, 'longitud' => -70.68665742874146),
		array( 'latitud' => -33.453001413267735, 'longitud' => -70.68627119064331),
		array( 'latitud' => -33.45298351030854, 'longitud' => -70.68590641021729),
		array( 'latitud' => -33.45284028650196, 'longitud' => -70.68554162979126),
		array( 'latitud' => -33.45269706245884, 'longitud' => -70.68521976470947),
		array( 'latitud' => -33.452643353381674, 'longitud' => -70.68483352661133),
		array( 'latitud' => -33.452625450348556, 'longitud' => -70.68453311920166),
		array( 'latitud' => -33.45248222595062, 'longitud' => -70.68416833877563),
		array( 'latitud' => -33.45241061366294, 'longitud' => -70.68384647369385),
		array( 'latitud' => -33.45232109822018, 'longitud' => -70.6834602355957),
		array( 'latitud' => -33.45221367956691, 'longitud' => -70.68315982818604),
		array( 'latitud' => -33.45214206705747, 'longitud' => -70.68279504776001),
		array( 'latitud' => -33.45203464818244, 'longitud' => -70.6824517250061),
		array( 'latitud' => -33.45199884186119, 'longitud' => -70.68208694458008),
		array( 'latitud' => -33.4519093259934, 'longitud' => -70.68159341812134),
		array( 'latitud' => -33.451837713232635, 'longitud' => -70.68125009536743),
		array( 'latitud' => -33.451640777835614, 'longitud' => -70.68075656890869),
		array( 'latitud' => -33.451587068104274, 'longitud' => -70.68041324615479),
		array( 'latitud' => -33.45142593871065, 'longitud' => -70.68011283874512),
		array( 'latitud' => -33.45124690569995, 'longitud' => -70.67983388900757),
		array( 'latitud' => -33.451121582372565, 'longitud' => -70.67951202392578),
		array( 'latitud' => -33.45101416223352, 'longitud' => -70.679190158844),
		array( 'latitud' => -33.45088883856979, 'longitud' => -70.67884683609009),
		array( 'latitud' => -33.45090674196141, 'longitud' => -70.67854642868042),
		array( 'latitud' => -33.45088883856979, 'longitud' => -70.67820310592651),
		array( 'latitud' => -33.45081722496635, 'longitud' => -70.6779670715332),
		array( 'latitud' => -33.45074561130378, 'longitud' => -70.67770957946777),
		array( 'latitud' => -33.4506560941424, 'longitud' => -70.67747354507446),
		array( 'latitud' => -33.45058448034679, 'longitud' => -70.67708730697632),
		array( 'latitud' => -33.450530769961254, 'longitud' => -70.67674398422241),
		array( 'latitud' => -33.45035173510261, 'longitud' => -70.67648649215698),
		array( 'latitud' => -33.450315928086525, 'longitud' => -70.67618608474731),
		array( 'latitud' => -33.45020850694958, 'longitud' => -70.67586421966553),
		array( 'latitud' => -33.45010108567959, 'longitud' => -70.67552089691162),
		array( 'latitud' => -33.45002947142567, 'longitud' => -70.67524194717407),
		array( 'latitud' => -33.449957857112615, 'longitud' => -70.6749415397644),
		array( 'latitud' => -33.44985043553218, 'longitud' => -70.67466259002686),
		array( 'latitud' => -33.44974301381867, 'longitud' => -70.67440509796143),
		array( 'latitud' => -33.44968930291202, 'longitud' => -70.67406177520752),
		array( 'latitud' => -33.449617688318106, 'longitud' => -70.67376136779785),
		array( 'latitud' => -33.44959978466037, 'longitud' => -70.6734824180603),
		array( 'latitud' => -33.44943865157455, 'longitud' => -70.67322492599487),
	);
	$distancia_total = 0;
	$tiempo_total = segundosATiempo(count($datos['mostrarCallesMasRecorridas']['ruta'])*$periodo); // En segundos
	$horas = $tiempo_total['horas'];
	$minutos = $tiempo_total['minutos'];
	$segundos = $tiempo_total['segundos'];
	$velocidades = Array();
	$velocidad_promedio_km_h = 0;
	$velocidad_maxima_km_h = 0;
	$velocidad_maxima = 0;
	$distancias = Array();
	$rutas = $datos['mostrarCallesMasRecorridas']['ruta'];
	$count_ruta = count($rutas);
	for ($i=1; $i < $count_ruta; $i++) { 
		$ruta = $rutas[$i];
		$ruta_anterior = $rutas[$i - 1];
		$distancia = distance($ruta['latitud'], $ruta['longitud'],$ruta_anterior['latitud'], $ruta_anterior['longitud'],'K');
		$distancia_total += $distancia;
		//$distancia = 100 / 1000;
		/*
			             $distancia (km)      3600 (s)
			$velocidad = --------------- * ---------------
			              $tiempo (s)         1 (h)

			$tiempo = $periodo;
		*/
		$velocidad = $distancia / $periodo * 3600;
		if($velocidad > $velocidad_maxima)
			$velocidad_maxima = $velocidad;
		$velocidad_promedio_km_h += $velocidad;
		array_push($distancias, $distancia);
		array_push($velocidades, $velocidad);
	}
	$velocidad_maxima_km_h = $velocidad_maxima;
	$distancia_total_km = $distancia_total;

	$velocidad_promedio_m_s = $velocidad_promedio_km_h * 3.6;
	if(count($velocidades) > 0){
		$velocidad_promedio_m_s /= count($velocidades);
		$velocidad_promedio_km_h /= count($velocidades);
	}
	$velocidad_promedio_m_s = round($velocidad_promedio_m_s, 2);
	$velocidad_promedio_km_h = round($velocidad_promedio_km_h, 2);

	$velocidad_maxima_m_s = $velocidad_maxima_km_h * 3.6;
	$velocidad_maxima_m_s   = round($velocidad_maxima_m_s, 2);
	$velocidad_maxima_km_h   = round($velocidad_maxima_km_h, 2);

	// Velocidades Labels
	for($i=0;$i<count($velocidades);$i++){
        if(($i * $periodo)%30 == 0 || $i == count($velocidades) - 1){
            $tiempo = segundosATiempo($i*$periodo);
            if($i * $periodo >= 60)
            	$datos['mostrarVelocidades']['labels'][$i] = round((($i * $periodo)/60),1).'m';
            else
            	$datos['mostrarVelocidades']['labels'][$i] = ($i * $periodo).'s';
        }
        else
        	$datos['mostrarVelocidades']['labels'][$i] = ',';
    }

    // Velocidades Data
    $i = 0;
    foreach ($velocidades as $key => $velocidad) {
    	$datos['mostrarVelocidades']['datos'][$i] = $velocidad;
    	$i++;
    }
    $datos['distancias'] = $distancias;
    $datos['periodo'] = $periodo;
    $datos['calorias_quemadas'] = round(49 * $distancia_total_km, 2);
    $datos['distancia_total'] = $distancia_total;
    // Velocidad promedio en km / s
    $datos['velocidad_promedio_m_s'] = $velocidad_promedio_m_s;
    $datos['velocidad_promedio_km_h'] = $velocidad_promedio_km_h;
    $datos['velocidad_maxima_m_s'] = $velocidad_maxima_m_s;
    $datos['velocidad_maxima_km_h'] = $velocidad_maxima_km_h;
    $datos['co2'] = round(0.133 * $distancia_total_km,2);
    $datos['tiempo_total'] = $tiempo_total;
	print_r(json_encode($datos));
?>