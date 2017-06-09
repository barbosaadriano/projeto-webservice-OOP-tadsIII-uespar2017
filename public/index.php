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
    $resp = new DefaultResponse();
    $resp->setStatus(ResponseJsonInterface::STATUS_FAIL);
    $resp->setMessageError($ex->getMessage());
    $resp->setData((array) $ex);
    $resp->response();
}