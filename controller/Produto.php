<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class Produto implements ControllerInterface {

    public function create() {
        echo "Criar";
    }

    public function delete() {
        echo "deletar";
    }

    public function listar() {
        $dao =new DaoProduto();
        echo json_encode($dao->listarTodos());
    }

    public function update() {
        echo "atualizar";
    }

}
