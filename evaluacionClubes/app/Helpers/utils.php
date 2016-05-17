<?php



function jsonResponse($data = null, $msg = 10000, $error = false){
    $response = array(
        'error' => $error,
        'msg' => getErrorMessages($msg),
        'data' => $data
    );
    return json_encode($response);
}

function getErrorMessages($code){
    $error_messages = [
        10000 => 'Mensaje no establecido.',
        10001 => 'Datos guardados exitosamente.',
        10002 => 'Los datos no se han podido guardar, favor intente mas tarde.',
    ];
    return (isset($error_messages[$code]))?$error_messages[$code]:'';
}