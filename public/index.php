<?php

function __autoload($classe) {
    $ar = array(
        '../app/',
        '../controller/',
        '../model/',
        '../dao/',
        '../services/',
    );
    foreach ($ar as $dir) {
        $file = $dir . $classe . ".php";
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
}

header('Content-Type: Application/json; charset=utf-8');
try {
    App::executar();
} catch (Exception $ex) {
    echo json_encode(array(
        'status' => ResponseJsonInterface::STATUS_FAIL,
        'messageError' => $ex->getMessage(),
        'data' => array()
    ));
}