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

    $response = new DefaultResponse();
    $response->setStatus(ResponseJsonInterface::STATUS_FAIL);
    $response->setMessageError($ex->getMessage());

    $response->response();
}