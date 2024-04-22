<?php
$_metodo = $_SERVER['REQUEST_METHOD']; // get, post, patch, put, delete
$_ubicacion = $_SERVER['HTTP_HOST']; // localhost
$_path = $_SERVER['REQUEST_URI']; // todo despues del server
$_partes = explode('/', $_path);
$_version = $_partes[2];
$_mantenedor = $_partes[3];
$_parametros = [];
$_parametros = $_partes[4];

if (strlen($_parametros) > 0){
    $_parametros = explode('?', $_parametros)[1];
    $_parametros = explode('&', $_parametros);
} else {
    $_parametros = [];
}

//header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE");
header("Content-Type: application/json; charset=UTF-8");

//Authorization
$_header = null;
try {
    $_header = isset(getallheaders()['Authorization']) ? getallheaders()['Authorization'] : null;
    if ($_header === null){
        throw new Exception("No tiene autorizacion");
    }

    // Parsear el token de autorización
    $token = $_header;
    $valid_token = null;

    // Verificar el token según la ruta
    if ($_metodo === 'GET' && $_mantenedor === 'services') {
        // Token esperado para GET SERVICIOS
        $valid_token = 'Bearer ciisa';
    } elseif ($_metodo === 'GET' && $_mantenedor === 'about-us') {
        // Token esperado para GET NOSOTROS
        $valid_token = 'Bearer ciisa';
    }

    // Comparar el token recibido con el token esperado
    if ($token !== $valid_token) {
        throw new Exception("Token inválido o no proporcionado");
    }
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['Error' => $e->getMessage()]);
    exit; // Detener la ejecución del script después de enviar la respuesta de error
}


if ($_metodo === 'GET' && $_mantenedor === 'services') {
    // Lógica para manejar la solicitud GET a /v1/services/
    // Puedes realizar una solicitud HTTP a https://ciisa.coningenio.cl/v1/services/ aquí
} elseif ($_metodo === 'GET' && $_mantenedor === 'about-us') {
    // Lógica para manejar la solicitud GET a /v1/about-us/
    // Puedes realizar una solicitud HTTP a https://ciisa.coningenio.cl/v1/about-us/ aquí
} else {
    // Si llega aquí, la ruta o el método no están implementados o no son válidos
    http_response_code(404);
    echo json_encode(['Error' => 'Ruta no encontrada']);
}


