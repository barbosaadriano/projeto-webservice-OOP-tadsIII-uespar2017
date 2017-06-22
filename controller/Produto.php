<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class Produto implements ControllerInterface {

    public function create(RequestInterface $req) {
        
    }

    public function delete(RequestInterface $req) {
        
    }

    public function listar(RequestInterface $req) {
        $param = $req->getParam();
        return new DefaultResponse($param);
    }

    public function update(RequestInterface $req) {
        
    }

}
