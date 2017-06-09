<?php

/**
 * Description of App
 *
 * @author Administrador
 */
class App {

    public static function executar() {

        $controller = "Home";
        $metodo = "default";

        $requestUrl = isset($_REQUEST['url']) ? $_REQUEST['url'] : "";
        if ($requestUrl !== "") {
            $res = explode("/", $requestUrl);
            $controller = str_replace(" ", "", ucwords(str_replace("-", " ", strtolower($res[0]))));
        }

        $reqMode = isset($_SERVER['REQUEST_METHOD']) ?
                $_SERVER['REQUEST_METHOD'] : 'NONE';

        if (class_exists($controller)) {
            try {
                $obj = new $controller();
                if ($obj instanceof ControllerInterface) {
                    switch ($reqMode) {
                        case "POST":
                            $obj->create();
                            break;
                        case "PUT":
                            $obj->update();
                            break;
                        case "GET":
                            $obj->listar();
                            break;
                        case "DELETE":
                            $obj->delete();
                            break;
                        default:
                            throw new Exception("Requisição inválida!");
                    }
                } else {
                    throw new Exception("A classe {$controller} "
                    . "não é um controller!");
                }
            } catch (Exception $exc) {
                throw $exc;
            }
        } else {
            throw new Exception("A classe {$controller} "
            . "não existe!");
        }
    }

}
