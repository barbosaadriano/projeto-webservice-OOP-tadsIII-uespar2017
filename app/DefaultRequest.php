<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefaultRequest
 *
 * @author drink
 */
class DefaultRequest implements RequestInterface {

    private $params;

    function __construct($params = array()) {
        $this->params = $_REQUEST;
        array_merge($this->params, $params);
    }

    public function getParam() {
        return $this->params;
    }

}
