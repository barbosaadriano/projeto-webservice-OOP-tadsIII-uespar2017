<?php

/**
 * Description of DefaultResponse
 *
 * @author Administrador
 */
class DefaultResponse implements ResponseJsonInterface {

    private $dados;
    private $errorMessage;
    private $status;

    public function response() {
        echo preg_replace("/\\\u0000/", "", json_encode(array(
            'status' => $this->status,
            'messageError' => $this->errorMessage,
            'data' => $this->dados
        )));
    }

    public function setData($dados = array()) {
        $this->dados = $dados;
    }

    public function setMessageError($mensagem = null) {
        $this->errorMessage = $mensagem;
    }

    public function setStatus($status = ResponseJsonInterface::STATUS_SUCCESS) {
        $this->status = $status;
    }

    public function __construct($data = array(), $status = ResponseJsonInterface::STATUS_SUCCESS) {
        $this->dados = $data;
        $this->status = $status;
    }

}
