<?php

/**
 *
 * @author Administrador
 */
interface ResponseJsonInterface {

    const STATUS_FAIL = 'fail';
    const STATUS_SUCCESS = 'success';

    public function setStatus($status=  ResponseJsonInterface::STATUS_SUCCESS);
    public function setMessageError($mensagem);
    public function setData($dados=array());
    public function response();
    
}
