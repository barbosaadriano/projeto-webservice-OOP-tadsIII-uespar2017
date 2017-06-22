<?php

/**
 * Description of DefaultResponse
 *
 * @author drink
 */
class DefaultResponse implements ResponseJsonInterface {

    private $dados;
    private $errorMessage;
    private $status;

    public function response() {
        echo preg_replace(
                "/\\\u0000/", "", json_encode(
                        array(
                            'status' => $this->status,
                            'messageError' => $this->errorMessage,
                            'data' => $this->dados
                        )
                )
        );
    }

    public function setData($dados = array()) {
        $this->dados = $dados;
    }

    public function setMessageError($mensagem) {
        $this->errorMessage = $mensagem;
    }

    public function setStatus($status = ResponseJsonInterface::STATUS_SUCCESS) {
        $this->status = $status;
    }

    function __construct($dados = array(), $status = ResponseJsonInterface::STATUS_SUCCESS) {
        $this->dados = $dados;
        $this->status = $status;
    }

}
