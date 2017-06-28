<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class Produto implements ControllerInterface {

    public function create(RequestInterface $req) {
        $pars = $req->getParam();
        if (!isset($pars['nome'])) {
            throw new Exception("o parametro nome é obrigatorio!");
        }
        $p = new ModelProduto(null, addslashes(strip_tags($pars['nome'])));
        $dp = new DaoProduto();
        $dp->salvar($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro salvo com sucesso!"));
        return $r;
    }

    public function delete(RequestInterface $req) {
        $pars = $req->getParam();
        if (!isset($pars['id'])) {
            throw new Exception("o parametro id é obrigatorio!");
        }
        $p = new ModelProduto($pars['id']);
        $dp = new DaoProduto();
        $dp->remover($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro excluído com sucesso!"));
        return $r;
    }

    public function listar(RequestInterface $req) {
        $params = $req->getParam();
        $dp = new DaoProduto();
        if (isset($params['id'])) {
            $produtos = $dp->listar($params['id']);
        } else {
            $produtos = $dp->listar();
        }
        return new DefaultResponse($produtos);
    }

    public function update(RequestInterface $req) {
        $pars = $req->getParam();
        if (
                (!isset($pars['nome']) ) ||
                (!isset($pars['id']) )
        ) {
            throw new Exception("o parametro nome e"
            . " o parametro id são obrigatorios!");
        }
        $p = new ModelProduto($pars['id'], addslashes(strip_tags($pars['nome'])));
        $dp = new DaoProduto();
        $dp->salvar($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro salvo com sucesso!"));
        return $r;
    }

}
