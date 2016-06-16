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

function formatear_nombre_archivos($texto){
    $fullname = explode('.',$texto);
    $name = $fullname[0];
    $search     =   ['_'];
    $replace    =   [' '];
    $texto  =   str_replace($search, $replace, $name);
    return ucwords($texto);
}

function formatear_guion_bajo($texto){
    $search     =   [' '];
    $replace    =   ['_'];
    $texto  =   str_replace($search, $replace, $texto);
    return ucwords($texto);
}