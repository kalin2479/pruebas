<?php
$post = json_decode(file_get_contents('php://input'), true);
$ruta = "https://ruc.com.pe/api/beta/ruc";
$token = "97519d81-1901-4c3a-a125-2f06fe3ab382-59b2a265-a63f-4595-b2d0-3d8afe1cd43a";

$rucaconsultar = $post['ruc']; //'10178520739';

$data = array(
    "token"	=> $token,
    "ruc"   => $rucaconsultar
);

$data_json = json_encode($data);

// Invocamos el servicio a ruc.com.pe
// Ejemplo para JSON
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
	$ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	)
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta  = curl_exec($ch);
curl_close($ch);

$leer_respuesta = json_decode($respuesta, true);
if (isset($leer_respuesta['errors'])) {
	//Mostramos los errores si los hay
    echo json_encode($leer_respuesta['errors']);
} else {
	//Mostramos la respuesta
	//echo "Respuesta de la API:<br>";
	echo json_encode($leer_respuesta);
}
