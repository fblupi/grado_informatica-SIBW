<?php
function getHoteles(){
	$url = 'http://localhost/proyectoHoteles/hotel';
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$curl_response = curl_exec($curl);

	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}

	curl_close($curl);

	$result = json_decode($curl_response, true);
	$hoteles = $result;
        
	if (isset($result->response->status) && $result->response->status == 'ERROR') {
	    die('error occured: ' . $result->response->errormessage);
	}

	//Esto nos devuelve un array, no un string, con lo cual no podemos mostrarlo con un echo
	//Hay que recorrer el array para mostrar todos los hoteles
	//print_r($hoteles); -> Esto lo imprime por pantalla, para comprobar que funciona nuestra API
	return $result;
}

function getHabitaciones($codHotel,$llegada,$salida){
    $url = 'http://localhost/proyectoHoteles/habitacion/'.$codHotel.'/'.$llegada.'/'.$salida;
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $curl_response = curl_exec($curl);

    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }

    curl_close($curl);

    $result = json_decode($curl_response, true);
    $habitaciones = $result;

    if (isset($result->response->status) && $result->response->status == 'ERROR') {
        die('error occured: ' . $result->response->errormessage);
    }


    return $result;
}

function getInfoHotel($codigoHotel){
    $url = 'http://localhost/proyectoHoteles/hotel/'.$codigoHotel;
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $curl_response = curl_exec($curl);

    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }

    curl_close($curl);

    $result = json_decode($curl_response, true);
    $habitaciones = $result;

    if (isset($result->response->status) && $result->response->status == 'ERROR') {
        die('error occured: ' . $result->response->errormessage);
    }


    return $result;
}

function getPrecio($codHabitacion){
    $url = 'http://localhost/proyectoHoteles/habitacion/precio/'.$codHabitacion;
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $curl_response = curl_exec($curl);

    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }

    curl_close($curl);

    $result = json_decode($curl_response, true);
    $habitaciones = $result;

    if (isset($result->response->status) && $result->response->status == 'ERROR') {
        die('error occured: ' . $result->response->errormessage);
    }


    return $result;
}

function getImagenes($codigoHotel){
	$url = 'http://localhost/proyectoHoteles/img?codigoHotel='.$codigoHotel;
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$curl_response = curl_exec($curl);

	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}

	curl_close($curl);

	$result = json_decode($curl_response, true);
	$hoteles = (array)$result;

	if (isset($result->response->status) && $result->response->status == 'ERROR') {
	    die('error occured: ' . $result->response->errormessage);
	}

	//Esto nos devuelve un array, no un string, con lo cual no podemos mostrarlo con un echo
	//Hay que recorrer el array para mostrar todos los hoteles
	//print_r($hoteles); -> Esto lo imprime por pantalla, para comprobar que funciona nuestra API
	return $result;
}

function setReserva($codigoHotel, $numHabitacion, $fechaEntrada, $fechaSalida){
        $url = 'http://localhost/proyectoHoteles/reserva';
        $curl = curl_init($url);
        $data = array('codigoHotel' => urlencode($codigoHotel), 'numHabitacion' => urlencode($numHabitacion), 'fechaEntrada' => urlencode($fechaEntrada), 'fechaSalida' => urlencode($fechaSalida));
        $fields_string = '';

        foreach ($data as $key => $value) {
                $fields_string .= $key.'='.$value.'&';
        }

        rtrim($fields_string, '&');

        curl_setopt($curl, CURLOPT_POST, count($data));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);

        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }

        curl_close($curl);

        $result = json_decode($curl_response, true);

        if (isset($result->response->status) && $result->response->status == 'ERROR') {
            die('error occured: ' . $result->response->errormessage);
        }


        return $result;
}

function imprime($codigo){
    echo $codigo;
}


?>
