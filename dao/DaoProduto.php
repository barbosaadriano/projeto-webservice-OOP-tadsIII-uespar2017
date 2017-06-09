<?php

/**
 * Description of DaoProduto
 *
 * @author Administrador
 */
class DaoProduto {

    public function listarTodos() {
        
        return array(
            new ModelProduto(1, "teste 1"),
            new ModelProduto(2, "teste 2"),
            new ModelProduto(3, "teste 3"),
            array(4,"teste 5"),
        );
        
    }

}
