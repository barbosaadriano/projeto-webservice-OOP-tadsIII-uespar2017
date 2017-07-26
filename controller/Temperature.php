<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class Temperature implements ControllerInterface {

    public function create(RequestInterface $req) {
        $r = new DefaultResponse();
        return $r;
    }

    public function delete(RequestInterface $req) {
        $r = new DefaultResponse();
        return $r;
    }

    public function listar(RequestInterface $req) {
        $res = $req->getParam();
        if (isset($res['value'])) {
            $dp = new DaoProduto();
            $p = new ModelProduto();
            $p->setNome($res['value']);
            $dp->salvar($p);
        }
        return new DefaultResponse();
    }

    public function update(RequestInterface $req) {
        $r = new DefaultResponse();
        return $r;
    }

}
