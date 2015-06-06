<?php
require 'Slim/Slim.php';

define('BD_SERVIDOR', 'localhost');
define('BD_NOMBRE', 'hotel');
define('BD_USUARIO', 'root');
define('BD_PASSWORD', 'macoy123');

// El framework Slim tiene definido un namespace llamado Slim
// Por eso aparece \Slim\ antes del nombre de la clase.
// Funcion que realiza la función con la base de datos.
function getConnection() {
    $dbh = new PDO('mysql:host=' . BD_SERVIDOR . ';dbname=' . BD_NOMBRE . ';charset=utf8', BD_USUARIO, BD_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec("set names utf8");
    return $dbh;
};

\Slim\Slim::registerAutoloader();
 
// Creamos la aplicación.
$app = new \Slim\Slim();

 
$app->contentType('text/html; charset=utf-8');

$app->get('/', function(){
	$app = \Slim\Slim::getInstance();
    $app->response->setStatus(200);
    echo "API creada para el proyecto CEIIE2015 de SIBW";
});

//Indicamos que si nos llega un parámetro /hotel por GET, realice esta funcion, que devuelve todos los hoteles de la BD.
$app->get('/hotel', function(){
	$app = \Slim\Slim::getInstance();

	try 
    {
        
        $db = getConnection();
        $sql = "SELECT * FROM hotel.hotel";
 
        $resultadoHoteles = $db->query($sql);
  
        $rowhoteles = $resultadoHoteles->fetchAll();
 
        if($rowhoteles) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($rowhoteles);
            $db = null;
        } else {
            throw new PDOException('No records found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

//Indicamos que si nos llega un parámetro /img/:codigoHotel por GET, nos consulte todas las imagenes disponibles de ese hotel
//La consulta sería http://localhost/ejemplo/img?codigoHotel=0 
$app->get('/img/:codigoHotel',function($codigoHotel){
    
    $app = \Slim\Slim::getInstance();

	try 
    {
        $db = getConnection();
 
        $sth = $db->prepare("SELECT * FROM hotel.Imagen WHERE hotel.Imagen.Hotel_codigoHotel=:codigoHotel");
 		
 		$sth->bindParam(':codigoHotel', $codigoHotel, PDO::PARAM_INT);

        $sth->execute();
 
        $img = $sth->fetchAll();
 
        if($img) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($img);
            $db = null;
        } else {
            throw new PDOException('No records found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

//Indicamos que si nos llega un parámetro /hotel/:nombreHotel por GET, nos devuelva todos los datos de ese hotel
//La consulta sería http://localhost/ejemplo/hotel?nombreHotel=Senator Granada Spa (Se pueden incluir espacios) 
$app->get('/hotel/:nombreHotel',function($nombreHotel){
   	
   	$app = \Slim\Slim::getInstance();

	try 
    {
        $db = getConnection();
 
        $sth = $db->prepare("SELECT * FROM hotel.Hotel WHERE Hotel.nombreHotel=:nombreHotel");
 		
 		$sth->bindParam(':nombreHotel', $nombreHotel, PDO::PARAM_INT);

        $sth->execute();
 
        $hotel = $sth->fetch(PDO::FETCH_OBJ);
 
        if($hotel) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($hotel);
            $db = null;
        } else {
            throw new PDOException('No records found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

//Indicamos que si nos llega un parámetro /habitacion/:codigoHotel por GET, nos consulte todas las habitaciones de ese hotel
//OJO: por defecto he puesto todas las habitaciones con estado = true (libre). Habría que comprobar que la habitacion tiene
//estado = true y una vez se reserve hay que poner este parámetro a false.
//La consulta sería http://localhost/ejemplo/habitacion?codigoHotel=0 

$app->get('/habitacion/:codigoHotel',function($codigoHotel){

    $app = \Slim\Slim::getInstance();

	try 
    {
        $db = getConnection();
 
        $sth = $db->prepare("SELECT * FROM hotel.Habitacion WHERE hotel.habitacion.Hotel_codigoHotel=:codigoHotel");
 		
 		$sth->bindParam(':codigoHotel', $codigoHotel, PDO::PARAM_INT);

        $sth->execute();
 
        $habitacion = $sth->fetchAll();
 
        if($habitacion) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($habitacion);
            $db = null;
        } else {
            throw new PDOException('No records found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

$app->get('/habitacion/precio/:codigoHabitacion',function($codigoHabitacion){

    $app = \Slim\Slim::getInstance();

    try
    {
        $db = getConnection();

        $sth = $db->prepare("SELECT precioHabitacion FROM hotel.Habitacion WHERE hotel.habitacion.numHabitacion=:codigoHabitacion");

        $sth->bindParam(':codigoHabitacion', $codigoHabitacion, PDO::PARAM_INT);

        $sth->execute();

        $habitacion = $sth->fetchAll();

        if($habitacion) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($habitacion);
            $db = null;
        } else {
            throw new PDOException('No records found.');
        }

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

$app->get('/habitacion/:codigoHotel/:llegada/:salida',function($codigoHotel,$llegada,$salida){

    $app = \Slim\Slim::getInstance();

    try
    {
        $db = getConnection();



        $sth = $db->prepare("SELECT * FROM hotel.Habitacion WHERE hotel.habitacion.Hotel_codigoHotel=:codigoHotel AND numHabitacion NOT IN (SELECT numHabitacion FROM hotel.reserva WHERE (:llegada>hotel.reserva.Fecha_llegada AND :llegada<hotel.reserva.Fecha_salida) OR (:salida>hotel.reserva.Fecha_llegada AND :salida<hotel.reserva.Fecha_salida))");

        $sth->bindParam(':codigoHotel', $codigoHotel, PDO::PARAM_INT);
        $sth->bindParam(':llegada',$llegada);
        $sth->bindParam(':salida',$salida);

        $sth->execute();

        $habitacion = $sth->fetchAll();

        if($habitacion) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($habitacion);
            $db = null;
        } else {
            throw new PDOException('No records found.');
        }

    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

$app->get('/reserva/:codigoReserva',function($codigoReserva){

    $app = \Slim\Slim::getInstance();

    try 
    {
        $db = getConnection();
 
        $sth = $db->prepare("SELECT * FROM hotel.Reserva WHERE hotel.Reserva.codigoReserva=:codigoReserva");
        
        $sth->bindParam(':codigoReserva', $codigoReserva, PDO::PARAM_INT);

        $sth->execute();
 
        $habitacion = $sth->fetchAll();
 
        if($habitacion) {
            $app->response->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            echo json_encode($habitacion);
            $db = null;
        } else {
            throw new PDOException('No records found.');
        }
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});


$app->post('/reserva',function(){

    $app = \Slim\Slim::getInstance();
    //$codigoReserva = $app->request->post('codigoReserva');    
    $codigoHotel = $app->request->post('codigoHotel');
    $numHabitacion = $app->request->post('numHabitacion');
    $horaLlegada = $app->request->post('fechaEntrada');
    $horaSalida  = $app->request->post('fechaSalida');    
    

    try 
    {
        $db = getConnection();
 
        $sth = $db->prepare("INSERT INTO hotel.Reserva(Hotel_codigoHotel,Fecha_llegada,Fecha_salida,numHabitacion) 
                    VALUES (:codigoHotel,:horaLlegada,:horaSalida,:numHabitacion)");
    
        $sth->bindParam(':codigoHotel', $codigoHotel);
        $sth->bindParam(':horaLlegada', $horaLlegada);
        $sth->bindParam(':horaSalida', $horaSalida);
        $sth->bindParam(':numHabitacion', $numHabitacion);        

        $sth->execute();
        
        $app->response->setStatus(200);
        $app->response()->headers->set('Content-Type', 'application/json');
        echo json_encode(array("status" => "success", "code" => 1));
        $db = null;
 
    } catch(PDOException $e) {
        $app->response()->setStatus(404);
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
});

$app->run();
?>
 