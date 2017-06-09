<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class Produto implements ControllerInterface {

    public function create(RequestInterface $req) {
        echo "Criar";
    }

    public function delete(RequestInterface $req) {
        echo "deletar";
    }

    public function listar(RequestInterface $req) {
        $dao = new DaoProduto();
//        echo json_encode($dao->listarTodos());
        return new DefaultResponse($dao->listarTodos());
    }

    public function update(RequestInterface $req) {
        echo "atualizar";
    }

}
