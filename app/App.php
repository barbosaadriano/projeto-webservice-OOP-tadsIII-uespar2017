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
                if (in_array($reqMode, array('PUT', 'DELETE'))) {
                    parse_str(file_get_contents("php://input"), $post_vars);
                    $_REQUEST = $post_vars;
                }
                $obj = new $controller();
                if ($obj instanceof ControllerInterface) {
                    $resp = null;
                    switch ($reqMode) {
                        case "POST":
                            $resp = $obj->create(new DefaultRequest());
                            break;
                        case "PUT":
                            $resp = $obj->update(new DefaultRequest());
                            break;
                        case "GET":
                            $resp = $obj->listar(new DefaultRequest());
                            break;
                        case "DELETE":
                            $resp = $obj->delete(new DefaultRequest());
                            break;
                        default:
                            throw new Exception("Requisição inválida!");
                    }
                    if ($resp instanceof ResponseJsonInterface) {
                        $resp->response();
                    } else {
                        throw new Exception("O retorno não é um response valído!");
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
