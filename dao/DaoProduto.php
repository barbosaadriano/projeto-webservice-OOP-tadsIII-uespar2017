<?php

/**
 * Description of DaoProduto
 *
 * @author Administrador
 */
class DaoProduto {

    public function listarTodos() {

        return array(
            (Array) new ModelProduto(1, "teste 1"),
            (array) new ModelProduto(2, "teste 2"),
            (array) new ModelProduto(3, "teste 3"),
        );
    }

}
