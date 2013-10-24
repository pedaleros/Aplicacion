<?php
	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);
	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}

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

	/*
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db_name = 'pedaleros';

	$db=mysql_connect($host, $username, $password) or die('Could not connect');
	mysql_select_db($db_name, $db) or die('');

	$result = mysql_query("SELECT * from posiciones") or die('Could not query');
	$resultados = array();
	*/
	$hora_inicio = 13;
	$minuto_inicio = 30;
	$segundo_inicio = 00;
	$periodo = 5;
	$resultados = array(
		'hora_inicio' => $hora_inicio,
		'minuto_inicio' => $minuto_inicio,
		'segundo_inicio' => $segundo_inicio,
		'periodo' => $periodo, // $periodo segundos por cada muestra
		'ruta' => array(
		array('latitud' => 33.5363, 'longitud'=>-117.044, 'count'=> 1),
		array('latitud' => 33.5608, 'longitud'=>-117.24, 'count'=> 1),
		array('latitud' => 38, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 38.9358, 'longitud'=>-77.1621, 'count'=> 1),
		array('latitud' => 38, 'longitud'=> 5.3247,'count'=> 2),
		array('latitud' => 54, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 51.5167, 'longitud'=>-0.7, 'count'=> 2),
		array('latitud' => 51.5167, 'longitud'=>-0.7, 'count'=> 6),
		array('latitud' => 60.3911, 'longitud'=>5.3247, 'count'=> 1),
		array('latitud' => 50.8333, 'longitud'=>12.9167, 'count'=> 9),
		array('latitud' => 50.8333, 'longitud'=>12.9167, 'count'=> 1),
		array('latitud' => 52.0833, 'longitud'=>4.3, 'count'=> 3),
		array('latitud' => 52.0833, 'longitud'=>4.3, 'count'=> 1),
		array('latitud' => 51.8, 'longitud'=>4.4667, 'count'=> 16),
		array('latitud' => 51.8, 'longitud'=>4.4667, 'count'=> 9),
		array('latitud' => 51.8, 'longitud'=>4.4667, 'count'=> 2),
		array('latitud' => 51.1, 'longitud'=>6.95, 'count'=> 1),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 1),
		array('latitud' => 18.975, 'longitud'=>72.8258, 'count'=> 1),
		array('latitud' => 2.5, 'longitud'=>112.5, 'count'=> 2),
		array('latitud' => 25.0389, 'longitud'=>102.718, 'count'=> 1),
		array('latitud' => 33.7, 'longitud'=>73.1667, 'count'=> 1),
		array('latitud' => 33.7, 'longitud'=>73.1667, 'count'=> 2),
		array('latitud' => 22.3333, 'longitud'=>114.2, 'count'=> 1),
		array('latitud' => 37.4382, 'longitud'=>-84.051, 'count'=> 1),
		array('latitud' => 34.6667, 'longitud'=>135.5, 'count'=> 1),
		array('latitud' => 37.9167, 'longitud'=>139.05, 'count'=> 1),
		array('latitud' => 36.3214, 'longitud'=>127.42, 'count'=> 1),
		array('latitud' => -37.7333, 'longitud'=>145.267, 'count'=> 1),
		array('latitud' => -34.95, 'longitud'=>138.6, 'count'=> 1),
		array('latitud' => -27.5, 'longitud'=>153.017, 'count'=> 1),
		array('latitud' => -27.5833, 'longitud'=>152.867, 'count'=> 3),
		array('latitud' => -35.2833, 'longitud'=>138.55, 'count'=> 1),
		array('latitud' => 13.4443, 'longitud'=>144.786, 'count'=> 2),
		array('latitud' => -37.8833, 'longitud'=>145.167, 'count'=> 1),
		array('latitud' => -37.86, 'longitud'=>144.972, 'count'=> 1),
		array('latitud' => -27.5, 'longitud'=>153.05, 'count'=> 1),
		array('latitud' => 35.685, 'longitud'=>139.751, 'count'=> 2),
		array('latitud' => -34.4333,'longitud'=>150.883, 'count'=> 2),
		array('latitud' => 14.0167, 'longitud'=>100.733, 'count'=> 2),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 5),
		array('latitud' => -31.9333, 'longitud'=>115.833, 'count'=> 1),
		array('latitud' => -33.8167, 'longitud'=>151.167, 'count'=> 1),
		array('latitud' => -37.9667, 'longitud'=>145.117, 'count'=> 1),
		array('latitud' => -37.8333, 'longitud'=>145.033, 'count'=> 1),
		array('latitud' => -37.6417, 'longitud'=>176.186, 'count'=> 2),
		array('latitud' => -37.6861, 'longitud'=>176.167, 'count'=> 1),
		array('latitud' => -41.2167, 'longitud'=>174.917, 'count'=> 1),
		array('latitud' => 39.0521, 'longitud'=>-77.015, 'count'=> 3),
		array('latitud' => 24.8667, 'longitud'=>67.05, 'count'=> 1),
		array('latitud' => 24.9869, 'longitud'=>121.306, 'count'=> 1),
		array('latitud' => 53.2, 'longitud'=>-105.75, 'count'=> 4),
		array('latitud' => 44.65, 'longitud'=>-63.6, 'count'=> 1),
		array('latitud' => 53.9667, 'longitud'=>-1.0833, 'count'=> 1),
		array('latitud' => 40.7, 'longitud'=>14.9833, 'count'=> 1),
		array('latitud' => 37.5331, 'longitud'=>-122.247, 'count'=> 1),
		array('latitud' => 39.6597, 'longitud'=>-86.8663, 'count'=> 2),
		array('latitud' => 33.0247, 'longitud'=>-83.2296, 'count'=> 1),
		array('latitud' => 34.2038, 'longitud'=>-80.9955, 'count'=> 1),
		array('latitud' => 28.0087, 'longitud'=>-82.7454, 'count'=> 1),
		array('latitud' => 44.6741, 'longitud'=>-93.4103, 'count'=> 1),
		array('latitud' => 31.4507, 'longitud'=>-97.1909, 'count'=> 1),
		array('latitud' => 45.61, 'longitud'=>-73.84, 'count'=> 1),
		array('latitud' => 49.25, 'longitud'=>-122.95, 'count'=> 1),
		array('latitud' => 49.9, 'longitud'=>-119.483, 'count'=> 2),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 6),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 7),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 4),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 41),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 11),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 3),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 10),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 5),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 14),
		array('latitud' => 41.4201, 'longitud'=>-75.6485, 'count'=> 4),
		array('latitud' => 31.1999, 'longitud'=>-92.3508, 'count'=> 1),
		array('latitud' => 41.9874, 'longitud'=>-91.6838, 'count'=> 1),
		array('latitud' => 30.1955, 'longitud'=>-85.6377, 'count'=> 1),
		array('latitud' => 42.4266, 'longitud'=>-92.358, 'count'=> 1),
		array('latitud' => 41.6559, 'longitud'=>-91.5228, 'count'=> 1),
		array('latitud' => 33.9269, 'longitud'=>-117.861, 'count'=> 3),
		array('latitud' => 41.8825, 'longitud'=>-87.6441, 'count'=> 6),
		array('latitud' => 42.3998, 'longitud'=>-88.8271, 'count'=> 1),
		array('latitud' => 33.1464, 'longitud'=>-97.0902, 'count'=> 1),
		array('latitud' => 47.2432, 'longitud'=>-93.5119, 'count'=> 1),
		array('latitud' => 41.6472, 'longitud'=>-93.46, 'count'=> 1),
		array('latitud' => 36.1213, 'longitud'=>-76.6414, 'count'=> 1),
		array('latitud' => 41.649, 'longitud'=>-93.6275, 'count'=> 1),
		array('latitud' => 44.8547, 'longitud'=>-93.7854, 'count'=> 1),
		array('latitud' => 43.6833, 'longitud'=>-79.7667, 'count'=> 1),
		array('latitud' => 40.6955, 'longitud'=>-89.4293, 'count'=> 1),
		array('latitud' => 37.6211, 'longitud'=>-77.6515, 'count'=> 1),
		array('latitud' => 37.6273, 'longitud'=>-77.5437, 'count'=> 3),
		array('latitud' => 33.9457, 'longitud'=>-118.039, 'count'=> 1),
		array('latitud' => 33.8408, 'longitud'=>-118.079, 'count'=> 1),
		array('latitud' => 40.3933, 'longitud'=>-74.7855, 'count'=> 1),
		array('latitud' => 40.9233, 'longitud'=>-73.9984, 'count'=> 1),
		array('latitud' => 39.0735, 'longitud'=>-76.5654, 'count'=> 1),
		array('latitud' => 40.5966, 'longitud'=>-74.0775, 'count'=> 1),
		array('latitud' => 40.2944, 'longitud'=>-73.9932, 'count'=> 2),
		array('latitud' => 38.9827, 'longitud'=>-77.004, 'count'=> 1),
		array('latitud' => 38.3633, 'longitud'=>-81.8089, 'count'=> 1),
		array('latitud' => 36.0755, 'longitud'=>-79.0741, 'count'=> 1),
		array('latitud' => 51.0833, 'longitud'=>-114.083, 'count'=> 2),
		array('latitud' => 49.1364, 'longitud'=>-122.821, 'count'=> 1),
		array('latitud' => 39.425, 'longitud'=>-84.4982, 'count'=> 3),
		array('latitud' => 38.7915, 'longitud'=>-82.9217, 'count'=> 1),
		array('latitud' => 39.0131, 'longitud'=>-84.2049, 'count'=> 1),
		array('latitud' => 29.7523, 'longitud'=>-95.367, 'count'=> 7),
		array('latitud' => 29.7523, 'longitud'=>-95.367, 'count'=> 4),
		array('latitud' => 41.5171, 'longitud'=>-71.2789, 'count'=> 1),
		array('latitud' => 29.7523, 'longitud'=>-95.367, 'count'=> 2),
		array('latitud' => 32.8148, 'longitud'=>-96.8705, 'count'=> 1),
		array('latitud' => 45.5, 'longitud'=>-73.5833, 'count'=> 1),
		array('latitud' => 40.7529, 'longitud'=>-73.9761, 'count'=> 6),
		array('latitud' => 33.6534, 'longitud'=>-112.246, 'count'=> 1),
		array('latitud' => 40.7421, 'longitud'=>-74.0018, 'count'=> 1),
		array('latitud' => 38.3928, 'longitud'=>-121.368, 'count'=> 1),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 1),
		array('latitud' => 39.7968, 'longitud'=>-76.993, 'count'=> 2),
		array('latitud' => 40.5607, 'longitud'=>-111.724, 'count'=> 1),
		array('latitud' => 41.2863, 'longitud'=>-75.8953, 'count'=> 1),
		array('latitud' => 26.3484, 'longitud'=>-80.2187, 'count'=> 1),
		array('latitud' => 32.711, 'longitud'=>-117.053, 'count'=> 2),
		array('latitud' => 32.5814, 'longitud'=>-83.6286, 'count'=> 3),
		array('latitud' => 35.0508, 'longitud'=>-80.8186, 'count'=> 3),
		array('latitud' => 35.0508, 'longitud'=>-80.8186, 'count'=> 1),
		array('latitud' => -22.2667,'longitud'=>166.45, 'count'=> 5),
		array('latitud' => 50.1167, 'longitud'=>8.6833, 'count'=> 1),
		array('latitud' => 51.9167, 'longitud'=>4.5, 'count'=> 2),
		array('latitud' => 54, 'longitud'=> 5.3247,'count'=> 6),
		array('latitud' => 52.25, 'longitud'=>21, 'count'=> 1),
		array('latitud' => 49.1, 'longitud'=>10.75, 'count'=> 3),
		array('latitud' => 51.65, 'longitud'=>6.1833, 'count'=> 1),
		array('latitud' => 1.3667, 'longitud'=>103.8, 'count'=> 1),
		array('latitud' => 29.4889, 'longitud'=>-98.3987, 'count'=> 11),
		array('latitud' => 29.3884, 'longitud'=>-98.5311, 'count'=> 1),
		array('latitud' => 41.8825, 'longitud'=>-87.6441, 'count'=> 2),
		array('latitud' => 41.8825, 'longitud'=>-87.6441, 'count'=> 1),
		array('latitud' => 33.9203, 'longitud'=>-84.618, 'count'=> 4),
		array('latitud' => 40.1242, 'longitud'=>-82.3828, 'count'=> 1),
		array('latitud' => 40.1241, 'longitud'=>-82.3828, 'count'=> 1),
		array('latitud' => 43.0434, 'longitud'=>-87.8945, 'count'=> 1),
		array('latitud' => 43.7371, 'longitud'=>-74.3419, 'count'=> 1),
		array('latitud' => 42.3626, 'longitud'=>-71.0843, 'count'=> 1),
		array('latitud' => 4.6, 'longitud'=>-74.0833, 'count'=> 1),
		array('latitud' => 19.7, 'longitud'=>-101.117, 'count'=> 1),
		array('latitud' => 25.6667, 'longitud'=>-100.317, 'count'=> 1),
		array('latitud' => 53.8167, 'longitud'=>10.3833, 'count'=> 1),
		array('latitud' => 50.8667, 'longitud'=>6.8667, 'count'=> 3),
		array('latitud' => 55.7167, 'longitud'=>12.45, 'count'=> 2),
		array('latitud' => 44.4333, 'longitud'=>26.1, 'count'=> 4),
		array('latitud' => 50.1167, 'longitud'=>8.6833, 'count'=> 2),
		array('latitud' => 52.5, 'longitud'=>5.75, 'count'=> 4),
		array('latitud' => 48.8833, 'longitud'=>8.7, 'count'=> 1),
		array('latitud' => 17.05, 'longitud'=>-96.7167, 'count'=> 3),
		array('latitud' => 23, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 20.6167, 'longitud'=>-105.25, 'count'=> 1),
		array('latitud' => 23, 'longitud'=> 5.3247,'count'=> 2),
		array('latitud' => 20.6667, 'longitud'=>-103.333, 'count'=> 1),
		array('latitud' => 21.1167, 'longitud'=>-101.667, 'count'=> 1),
		array('latitud' => 17.9833, 'longitud'=>-92.9167, 'count'=> 1),
		array('latitud' => 20.9667, 'longitud'=>-89.6167, 'count'=> 2),
		array('latitud' => 21.1667, 'longitud'=>-86.8333, 'count'=> 1),
		array('latitud' => 17.9833, 'longitud'=>-94.5167, 'count'=> 1),
		array('latitud' => 18.6, 'longitud'=>-98.85, 'count'=> 1),
		array('latitud' => 16.75, 'longitud'=>-93.1167, 'count'=> 1),
		array('latitud' => 19.4342, 'longitud'=>-99.1386, 'count'=> 1),
		array('latitud' => -10, 'longitud'=>5, 'count'=> 1),
		array('latitud' => -22.9,'longitud'=>43.2333, 'count'=> 1),
		array('latitud' => 15.7833, 'longitud'=>-86.8, 'count'=> 1),
		array('latitud' => 10.4667, 'longitud'=>-64.1667, 'count'=> 1),
		array('latitud' => 7.1297, 'longitud'=>-73.1258, 'count'=> 1),
		array('latitud' => 4, 'longitud'=> 5.3247,'count'=> 2),
		array('latitud' => 4, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 6.8, 'longitud'=>-58.1667, 'count'=> 1),
		array('latitud' => 0, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 48.15, 'longitud'=>11.5833, 'count'=> 2),
		array('latitud' => 45.8, 'longitud'=>16, 'count'=> 15),
		array('latitud' => 59.9167, 'longitud'=>10.75, 'count'=> 1),
		array('latitud' => 51.5002, 'longitud'=>-0.1262, 'count'=> 1),
		array('latitud' => 55, 'longitud'=>4, 'count'=> 1),
		array('latitud' => 52.5, 'longitud'=>5.75, 'count'=> 1),
		array('latitud' => 52.2, 'longitud'=>0.1167, 'count'=> 1),
		array('latitud' => 48.8833, 'longitud'=>8.3333, 'count'=> 1),
		array('latitud' => -33.9167,'longitud'=>18.4167, 'count'=> 1),
		array('latitud' => 40.9157, 'longitud'=>-81.133, 'count'=> 2),
		array('latitud' => 43.8667, 'longitud'=>-79.4333, 'count'=> 1),
		array('latitud' => 54, 'longitud'=> 5.3247,'count'=> 2),
		array('latitud' => 39, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 54, 'longitud'=> 5.3247,'count'=> 11),
		array('latitud' => 54, 'longitud'=> 5.3247,'count'=> 4),
		array('latitud' => 54, 'longitud'=> 5.3247,'count'=> 3),
		array('latitud' => 9.0833, 'longitud'=>-79.3833, 'count'=> 2),
		array('latitud' => 21.5, 'longitud'=>-104.9, 'count'=> 1),
		array('latitud' => 19.5333, 'longitud'=>-96.9167, 'count'=> 1),
		array('latitud' => 32.5333, 'longitud'=>-117.017, 'count'=> 1),
		array('latitud' => 19.4342, 'longitud'=>-99.1386, 'count'=> 3),
		array('latitud' => 18.15, 'longitud'=>-94.4167, 'count'=> 1),
		array('latitud' => 20.7167, 'longitud'=>-103.4, 'count'=> 1),
		array('latitud' => 23.2167, 'longitud'=>-106.417, 'count'=> 2),
		array('latitud' => 10.9639, 'longitud'=>-74.7964, 'count'=> 1),
		array('latitud' => 24.8667, 'longitud'=>67.05, 'count'=> 2),
		/*array('latitud' => 1.2931, 'longitud'=>103.856, 'count'=> 1),
		array('latitud' => -41, 'longitud'=>74, 'count'=> 1),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 2),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 46),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 9),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 8),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 7),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 16),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 4),
		array('latitud' => 13.75, 'longitud'=>100.517, 'count'=> 6),
		array('latitud' => 55.75, 'longitud'=>-97.8667, 'count'=> 5),
		array('latitud' => 34.0438, 'longitud'=>-118.251, 'count'=> 2),
		array('latitud' => 44.2997, 'longitud'=>-70.3698, 'count'=> 1),
		array('latitud' => 46.9402, 'longitud'=>-113.85, 'count'=> 14),
		array('latitud' => 45.6167, 'longitud'=>-61.9667, 'count'=> 1),
		array('latitud' => 45.3833, 'longitud'=>-66, 'count'=> 2),
		array('latitud' => 54.9167, 'longitud'=>-98.6333, 'count'=> 1),
		array('latitud' => 40.8393, 'longitud'=>-73.2797, 'count'=> 1),
		array('latitud' => 41.6929, 'longitud'=>-111.815, 'count'=> 1),
		array('latitud' => 49.8833, 'longitud'=>-97.1667, 'count'=> 1),
		array('latitud' => 32.5576, 'longitud'=>-81.9395, 'count'=> 1),
		array('latitud' => 49.9667, 'longitud'=>-98.3, 'count'=> 2),
		array('latitud' => 40.0842, 'longitud'=>-82.9378, 'count'=> 2),
		array('latitud' => 49.25, 'longitud'=>-123.133, 'count'=> 5),
		array('latitud' => 35.2268, 'longitud'=>-78.9561, 'count'=> 1),
		array('latitud' => 43.9817, 'longitud'=>-121.272, 'count'=> 1),
		array('latitud' => 43.9647, 'longitud'=>-121.341, 'count'=> 1),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 13),
		array('latitud' => 33.4357, 'longitud'=>-111.917, 'count'=> 2),
		array('latitud' => 36.0707, 'longitud'=>-97.9077, 'count'=> 1),
		array('latitud' => 32.7791, 'longitud'=>-96.8028, 'count'=> 1),
		array('latitud' => 34.053, 'longitud'=>-118.264, 'count'=> 1),
		array('latitud' => 30.726, 'longitud'=>-95.55, 'count'=> 1),
		array('latitud' => 45.4508, 'longitud'=>-93.5855, 'count'=> 1),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 8),
		array('latitud' => 36.8463, 'longitud'=>-76.0979, 'count'=> 3),
		array('latitud' => 36.8463, 'longitud'=>-76.0979, 'count'=> 1),
		array('latitud' => 34.0533, 'longitud'=>-118.255, 'count'=> 1),
		array('latitud' => 35.7217, 'longitud'=>-81.3603, 'count'=> 1),
		array('latitud' => 40.6888, 'longitud'=>-74.0203, 'count'=> 4),
		array('latitud' => 47.5036, 'longitud'=>-94.685, 'count'=> 2),
		array('latitud' => 32.3304, 'longitud'=>-81.6011, 'count'=> 1),
		array('latitud' => 39.0165, 'longitud'=>-77.5062, 'count'=> 2),
		array('latitud' => 38.6312, 'longitud'=>-90.1922, 'count'=> 1),
		array('latitud' => 32.445, 'longitud'=>-81.7758, 'count'=> 1),
		array('latitud' => -37.9667,'longitud'=>145.15, 'count'=> 1),
		array('latitud' => -33.9833,'longitud'=>151.117, 'count'=> 1),
		array('latitud' => 49.6769, 'longitud'=>6.1239, 'count'=> 2),
		array('latitud' => 53.8167, 'longitud'=>-1.2167, 'count'=> 1),
		array('latitud' => 52.4667, 'longitud'=>-1.9167, 'count'=> 3),
		array('latitud' => 52.5, 'longitud'=>5.75, 'count'=> 2),
		array('latitud' => 33.5717, 'longitud'=>-117.729, 'count'=> 4),
		array('latitud' => 31.5551, 'longitud'=>-97.1604, 'count'=> 1),
		array('latitud' => 42.2865, 'longitud'=>-71.7147, 'count'=> 1),
		array('latitud' => 48.4, 'longitud'=>-89.2333, 'count'=> 1),
		array('latitud' => 42.9864, 'longitud'=>-78.7279, 'count'=> 1),
		array('latitud' => 41.8471, 'longitud'=>-87.6248, 'count'=> 1),
		array('latitud' => 34.5139, 'longitud'=>-114.293, 'count'=> 1),
		array('latitud' => 51.9167, 'longitud'=>4.4, 'count'=> 1),
		array('latitud' => 51.9167, 'longitud'=>4.4, 'count'=> 4),
		array('latitud' => 51.55, 'longitud'=>5.1167, 'count'=> 38),
		array('latitud' => 51.8, 'longitud'=>4.4667, 'count'=> 8),
		array('latitud' => 54.5, 'longitud'=>-3.6167, 'count'=> 1),
		array('latitud' => -34.9333,'longitud'=>138.6, 'count'=> 1),
		array('latitud' => -33.95,'longitud'=>151.133, 'count'=> 1),
		array('latitud' => 15, 'longitud'=> 5.3247,'count'=> 4),
		array('latitud' => 15, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 15, 'longitud'=> 5.3247,'count'=> 3),
		array('latitud' => 15, 'longitud'=> 5.3247,'count'=> 2),
		array('latitud' => 41.5381, 'longitud'=>-87.6842, 'count'=> 1),
		array('latitud' => 40.9588, 'longitud'=>-75.3006, 'count'=> 1),
		array('latitud' => 46.7921, 'longitud'=>-96.8827, 'count'=> 1),
		array('latitud' => 41.9474, 'longitud'=>-87.7037, 'count'=> 1),
		array('latitud' => 41.6162, 'longitud'=>-87.0489, 'count'=> 1),
		array('latitud' => 37.5023, 'longitud'=>-77.5693, 'count'=> 1),
		array('latitud' => 38.4336, 'longitud'=>-77.3887, 'count'=> 1),
		array('latitud' => 41.759, 'longitud'=>-88.2615, 'count'=> 1),
		array('latitud' => 42.0158, 'longitud'=>-87.8423, 'count'=> 1),
		array('latitud' => 46.5833, 'longitud'=>-81.2, 'count'=> 1),
		array('latitud' => 45.3667, 'longitud'=>-63.3, 'count'=> 1),
		array('latitud' => 18.0239, 'longitud'=>-66.6366, 'count'=> 2),
		array('latitud' => 43.2667, 'longitud'=>-79.9333, 'count'=> 1),
		array('latitud' => 45.0667, 'longitud'=>-64.5, 'count'=> 1),
		array('latitud' => 39.6351, 'longitud'=>-78.7665, 'count'=> 1),
		array('latitud' => 33.4483, 'longitud'=>-81.6921, 'count'=> 2),
		array('latitud' => 41.5583, 'longitud'=>-87.6612, 'count'=> 1),
		array('latitud' => 30.5315, 'longitud'=>-90.4628, 'count'=> 1),
		array('latitud' => 34.7664, 'longitud'=>-82.2202, 'count'=> 2),
		array('latitud' => 47.6779, 'longitud'=>-117.379, 'count'=> 2),
		array('latitud' => 47.6201, 'longitud'=>-122.141, 'count'=> 1),
		array('latitud' => 45.0901, 'longitud'=>-87.7101, 'count'=> 1),
		array('latitud' => 38.3119, 'longitud'=>-90.1535, 'count'=> 3),
		array('latitud' => 34.7681, 'longitud'=>-84.9569, 'count'=> 4),
		array('latitud' => 47.4061, 'longitud'=>-121.995, 'count'=> 1),
		array('latitud' => 40.6009, 'longitud'=>-73.9397, 'count'=> 1),
		array('latitud' => 40.6278, 'longitud'=>-73.365, 'count'=> 1),
		array('latitud' => 40.61, 'longitud'=>-73.9108, 'count'=> 1),
		array('latitud' => 34.3776, 'longitud'=>-83.7605, 'count'=> 2),
		array('latitud' => 38.7031, 'longitud'=>-94.4737, 'count'=> 1),
		array('latitud' => 39.3031, 'longitud'=>-82.0828, 'count'=> 1),
		array('latitud' => 42.5746, 'longitud'=>-88.3946, 'count'=> 1),
		array('latitud' => 45.4804, 'longitud'=>-122.836, 'count'=> 1),
		array('latitud' => 44.5577, 'longitud'=>-123.298, 'count'=> 1),
		array('latitud' => 40.1574, 'longitud'=>-76.7978, 'count'=> 1),
		array('latitud' => 34.8983, 'longitud'=>-120.382, 'count'=> 1),
		array('latitud' => 40.018, 'longitud'=>-89.8623, 'count'=> 1),
		array('latitud' => 37.3637, 'longitud'=>-79.9549, 'count'=> 1),
		array('latitud' => 37.2141, 'longitud'=>-80.0625, 'count'=> 1),
		array('latitud' => 37.2655, 'longitud'=>-79.923, 'count'=> 1),
		array('latitud' => 39.0613, 'longitud'=>-95.7293, 'count'=> 1),
		array('latitud' => 41.2314, 'longitud'=>-80.7567, 'count'=> 1),
		array('latitud' => 40.3377, 'longitud'=>-79.8428, 'count'=> 1),
		array('latitud' => 42.0796, 'longitud'=>-71.0382, 'count'=> 1),
		array('latitud' => 43.25, 'longitud'=>-79.8333, 'count'=> 1),
		array('latitud' => 40.7948, 'longitud'=>-72.8797, 'count'=> 2),
		array('latitud' => 40.6766, 'longitud'=>-73.7038, 'count'=> 4),
		array('latitud' => 37.979, 'longitud'=>-121.788, 'count'=> 1),
		array('latitud' => 43.1669, 'longitud'=>-76.0558, 'count'=> 1),
		array('latitud' => 37.5353, 'longitud'=>-121.979, 'count'=> 1),
		array('latitud' => 43.2345, 'longitud'=>-71.5227, 'count'=> 1),
		array('latitud' => 42.6179, 'longitud'=>-70.7154, 'count'=> 3),
		array('latitud' => 42.0765, 'longitud'=>-71.472, 'count'=> 2),
		array('latitud' => 35.2298, 'longitud'=>-81.2428, 'count'=> 1),
		array('latitud' => 39.961, 'longitud'=>-104.817, 'count'=> 1),
		array('latitud' => 44.6667, 'longitud'=>-63.5667, 'count'=> 1),
		array('latitud' => 38.4473, 'longitud'=>-104.632, 'count'=> 3),
		array('latitud' => 40.7148, 'longitud'=>-73.7939, 'count'=> 1),
		array('latitud' => 40.6763, 'longitud'=>-73.7752, 'count'=> 1),
		array('latitud' => 41.3846, 'longitud'=>-73.0943, 'count'=> 2),
		array('latitud' => 43.1871, 'longitud'=>-70.91, 'count'=> 1),
		array('latitud' => 33.3758, 'longitud'=>-84.4657, 'count'=> 1),
		array('latitud' => 15, 'longitud'=> 5.3247,'count'=> 12),
		array('latitud' => 36.8924, 'longitud'=>-80.076, 'count'=> 2),
		array('latitud' => 25, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 27, 'longitud'=> 5.3247,'count'=> 1),
		array('latitud' => 49.1, 'longitud'=>10.75, 'count'=> 2),
		array('latitud' => 49.1, 'longitud'=>10.75, 'count'=> 4),
		array('latitud' => 47.6727, 'longitud'=>-122.187, 'count'=> 1),
		array('latitud' => -27.6167,'longitud'=>152.767, 'count'=> 1),
		array('latitud' => -33.8833,'longitud'=>151.217, 'count'=> 1),
		array('latitud' => 31.5497, 'longitud'=>74.3436, 'count'=> 4),
		array('latitud' => 13.65, 'longitud'=>100.267, 'count'=> 2),
		array('latitud' => -37.8167,'longitud'=>144.967, 'count'=> 1),
		array('latitud' => 47.85, 'longitud'=>12.1333, 'count'=> 3),
		array('latitud' => 47, 'longitud'=> 5.3247,'count'=> 3),
		array('latitud' => 52.1667, 'longitud'=>10.55, 'count'=> 1),
		array('latitud' => 50.8667, 'longitud'=>6.8667, 'count'=> 2),
		array('latitud' => 40.8333, 'longitud'=>14.25, 'count'=> 2),
		array('latitud' => 47.5304, 'longitud'=>-122.008, 'count'=> 1),
		array('latitud' => 47.5304, 'longitud'=>-122.008, 'count'=> 3),
		array('latitud' => 34.0119, 'longitud'=>-118.468, 'count'=> 1),
		array('latitud' => 38.9734, 'longitud'=>-119.908, 'count'=> 1),
		array('latitud' => 52.1333, 'longitud'=>-106.667, 'count'=> 1),
		array('latitud' => 41.4201, 'longitud'=>-75.6485, 'count'=> 3),
		array('latitud' => 45.6393, 'longitud'=>-94.2237, 'count'=> 1),
		array('latitud' => 33.7516, 'longitud'=>-84.3915, 'count'=> 1),
		array('latitud' => 26.0098, 'longitud'=>-80.2592, 'count'=> 1),
		array('latitud' => 34.5714, 'longitud'=>-78.7566, 'count'=> 1),
		array('latitud' => 40.7235, 'longitud'=>-73.8612, 'count'=> 1),
		array('latitud' => 39.1637, 'longitud'=>-94.5215, 'count'=> 5),
		array('latitud' => 28.0573, 'longitud'=>-81.5687, 'count'=> 2),
		array('latitud' => 26.8498, 'longitud'=>-80.14, 'count'=> 1),
		array('latitud' => 47.6027, 'longitud'=>-122.156, 'count'=> 11),
		array('latitud' => 47.6027, 'longitud'=>-122.156, 'count'=> 1),
		array('latitud' => 25.7541, 'longitud'=>-80.271, 'count'=> 1),
		array('latitud' => 32.7597, 'longitud'=>-97.147, 'count'=> 1),
		array('latitud' => 40.9083, 'longitud'=>-73.8346, 'count'=> 2),
		array('latitud' => 47.6573, 'longitud'=>-111.381, 'count'=> 1),
		array('latitud' => 32.3729, 'longitud'=>-81.8443, 'count'=> 1),
		array('latitud' => 32.7825, 'longitud'=>-96.8207, 'count'=> 2),
		array('latitud' => 41.5074, 'longitud'=>-81.6053, 'count'=> 1),
		array('latitud' => 32.4954, 'longitud'=>-86.5, 'count'=> 1),
		array('latitud' => 30.3043, 'longitud'=>-81.7306, 'count'=> 1),
		array('latitud' => 45.9667, 'longitud'=>-81.9333, 'count'=> 1),
		array('latitud' => 42.2903, 'longitud'=>-72.6404, 'count'=> 5),
		array('latitud' => 40.7553, 'longitud'=>-73.9924, 'count'=> 1),
		array('latitud' => 55.1667, 'longitud'=>-118.8, 'count'=> 1),
		array('latitud' => 37.8113, 'longitud'=>-122.301, 'count'=> 1),
		array('latitud' => 40.2968, 'longitud'=>-111.676, 'count'=> 1),
		array('latitud' => 42.0643, 'longitud'=>-87.9921, 'count'=> 1),
		array('latitud' => 42.3908, 'longitud'=>-71.0925, 'count'=> 1),
		array('latitud' => 44.2935, 'longitud'=>-94.7601, 'count'=> 1),
		array('latitud' => 40.4619, 'longitud'=>-74.3561, 'count'=> 2),
		array('latitud' => 32.738, 'longitud'=>-96.4463, 'count'=> 1),
		array('latitud' => 35.7821, 'longitud'=>-78.8177, 'count'=> 1),
		array('latitud' => 40.7449, 'longitud'=>-73.9782, 'count'=> 1),
		array('latitud' => 40.7449, 'longitud'=>-73.9782, 'count'=> 2),
		array('latitud' => 28.5445, 'longitud'=>-81.3706, 'count'=> 1),
		array('latitud' => 41.4201, 'longitud'=>-75.6485, 'count'=> 1),
		array('latitud' => 38.6075, 'longitud'=>-83.7928, 'count'=> 1),
		array('latitud' => 42.2061, 'longitud'=>-83.206, 'count'=> 1),
		array('latitud' => 42.3222, 'longitud'=>-88.4671, 'count'=> 1),
		array('latitud' => 42.3222, 'longitud'=>-88.4671, 'count'=> 3),
		array('latitud' => 37.7035, 'longitud'=>-122.148, 'count'=> 1),
		array('latitud' => 37.5147, 'longitud'=>-122.042, 'count'=> 1),
		array('latitud' => 40.6053, 'longitud'=>-111.988, 'count'=> 1),
		array('latitud' => 38.5145, 'longitud'=>-81.7814, 'count'=> 1),
		array('latitud' => 42.1287, 'longitud'=>-88.2654, 'count'=> 1),
		array('latitud' => 36.9127, 'longitud'=>-120.196, 'count'=> 1),
		array('latitud' => 36.3769, 'longitud'=>-119.184, 'count'=> 1),
		array('latitud' => 36.84, 'longitud'=>-119.828, 'count'=> 1),
		array('latitud' => 48.0585, 'longitud'=>-122.148, 'count'=> 1),
		array('latitud' => 42.1197, 'longitud'=>-87.8445, 'count'=> 1),
		array('latitud' => 40.7002, 'longitud'=>-111.943, 'count'=> 2),
		array('latitud' => 37.5488, 'longitud'=>-122.312, 'count'=> 1),
		array('latitud' => 41.3807, 'longitud'=>-73.3915, 'count'=> 1),
		array('latitud' => 45.5, 'longitud'=>-73.5833, 'count'=> 3),
		array('latitud' => 34.0115, 'longitud'=>-117.854, 'count'=> 3),
		array('latitud' => 43.0738, 'longitud'=>-83.8608, 'count'=> 11),
		array('latitud' => 33.9944, 'longitud'=>-118.464, 'count'=> 3),*/
		),
	);
	$resultados['ruta'] = array(
		array( 'latitud'=>8.312563, 'longitud'=>61.636416 ),
		array( 'latitud'=>8.312630, 'longitud'=>61.636405 ),
		array( 'latitud'=>8.312649, 'longitud'=>61.636399 ),
		array( 'latitud'=>8.312658, 'longitud'=>61.636365 ),
		array( 'latitud'=>8.312712, 'longitud'=>61.636342 ),
		array( 'latitud'=>8.312766, 'longitud'=>61.636343 ),
		array( 'latitud'=>8.312816, 'longitud'=>61.636319 ),
		array( 'latitud'=>8.312825, 'longitud'=>61.636314 ),
		array( 'latitud'=>8.312875, 'longitud'=>61.636259 ),
		array( 'latitud'=>8.312944, 'longitud'=>61.636223 ),
		array( 'latitud'=>8.313037, 'longitud'=>61.636146 ),
		array( 'latitud'=>8.313048, 'longitud'=>61.636134 ),
		array( 'latitud'=>8.313033, 'longitud'=>61.636135 ),
		array( 'latitud'=>8.313029, 'longitud'=>61.636138 ),
		array( 'latitud'=>8.313041, 'longitud'=>61.636126 ),
		array( 'latitud'=>8.313022, 'longitud'=>61.636100 ),
		array( 'latitud'=>8.313022, 'longitud'=>61.636081 ),
		array( 'latitud'=>8.313039, 'longitud'=>61.636063 ),
		array( 'latitud'=>8.313060, 'longitud'=>61.635921 ),
		array( 'latitud'=>8.313067, 'longitud'=>61.635910 ),
		array( 'latitud'=>8.313111, 'longitud'=>61.635832 ),
		array( 'latitud'=>8.313122, 'longitud'=>61.635819 ),
	);
	$distancia_total = 0;
	$tiempo_total = segundosATiempo(count($resultados['ruta'])*$periodo); // En segundos
	$horas = $tiempo_total['horas'];
	$minutos = $tiempo_total['minutos'];
	$segundos = $tiempo_total['segundos'];
	$velocidades = Array();
	$velocidad_promedio = 0;
	$velocidad_maxima = 0;
	echo "Tiempo total: $horas : $minutos : $segundos <br>";
	// Calculo de velocidades...
	for ($i=1; $i < count($resultados['ruta']); $i++) { 
		$ruta = $resultados['ruta'][$i];
		$ruta_anterior = $resultados['ruta'][$i - 1];
		$distancia = distance($ruta['latitud'], $ruta['longitud'],$ruta_anterior['latitud'], $ruta_anterior['longitud'],'K');
		$distancia_total += $distancia;
		$velocidad = $distancia / $periodo * 1000; // *1000, para dejarlo en m/s
		if($velocidad > $velocidad_maxima)
			$velocidad_maxima = $velocidad;
		$velocidad_promedio += $velocidad;
		array_push($velocidades, $velocidad);
	}
	if(count($velocidades) > 0)
		$velocidad_promedio /= count($velocidades);
	$velocidad_promedio = round($velocidad_promedio, 2);
	$velocidad_maxima   = round($velocidad_maxima, 2);
	echo "Distancia total: ".round($distancia_total*1000,2)." m<br>";
	/*if(mysql_num_rows($result)){
	    while($row=mysql_fetch_assoc($result)){
			$resultados[] = $row;
	    }
	}*/
	//print json_encode($resultados);
	//mysql_close($db);

	/* Genera las velocidades a partir de un arreglo de la forma:
		0.12, 0.134, 0.1, 0, 1, ... (son velocidades, las calculo mas arriba)
	*/
	function obtenerMostrarVelocidadesLabels($velocidades, $periodo){
		echo '[';
		for($i=0;$i<count($velocidades);$i++){
            if(($i * $periodo)%30 == 0 || $i == count($velocidades) - 1){
                $tiempo = segundosATiempo($i*$periodo);
                if($i * $periodo >= 60)
	                echo '"'.round((($i * $periodo)/60),1).'m",';
	            else
	                echo '"'.($i * $periodo).'s",';
            }
            else
                echo '"",';
        }
		echo ']';
	}

	function obtenerMostrarVelocidadesData($velocidades){
		echo '[';
		foreach ($velocidades as $key => $velocidad) {
            echo ($velocidad).', ';
        }
		echo ']';
    }

    function kgCO2EmitidosAuto($km){
    	return 0.133 * $km;
    }

    function caloriasQuemadas($km){
    	return 49 * $km;
    }
?>