<?php

/**
 * Description of DefaultRequest
 *
 * @author Administrador
 */
class DefaultRequest implements RequestInterface {

    private $params;

    public function __construct($params = array()) {
        $this->params = $_REQUEST;
        array_merge($this->params, $params);
    }

    public function getParams() {
        return $this->params;
    }

}
