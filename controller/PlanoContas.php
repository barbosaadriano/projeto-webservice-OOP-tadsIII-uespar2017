<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class PlanoContas implements ControllerInterface {

    public function create(RequestInterface $req) {
        $pars = $req->getParam();
        if (!isset($pars['grupo'])) {
            throw new Exception("o parametro grupo é obrigatorio!");
        }
        if (!isset($pars['despesa'])) {
            throw new Exception("o parametro despesa é obrigatorio!");
        }
        if (!isset($pars['orcado'])) {
            throw new Exception("o parametro orcado é obrigatorio!");
        }
        $p = new ModelPlanoContas(null,$pars['grupo'],$pars['despesa'],$pars['orcado']);
        $dp = new DaoPlanoContas();
        $id = $dp->salvar($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro salvo com sucesso!",'id'=>$id));
        return $r;
    }

    public function delete(RequestInterface $req) {
        $pars = $req->getParam();
        if (!isset($pars['id'])) {
            throw new Exception("o parametro id é obrigatorio!");
        }
        $p = new ModelPlanoContas($pars['id']);
        $dp = new DaoPlanoContas();
        $dp->remover($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro excluído com sucesso!"));
        return $r;
    }

    public function listar(RequestInterface $req) {
        $params = $req->getParam();
        $dp = new DaoPlanoContas();
        if (isset($params['id'])) {
            $planos = $dp->listar($params['id']);
        } else {
            $planos = $dp->listar();
        }
        return new DefaultResponse($planos);
    }

    public function update(RequestInterface $req) {
        $pars = $req->getParam();
        if (
                (!isset($pars['grupo']) ) ||
                (!isset($pars['despesa']) ) ||
                (!isset($pars['orcado']) ) ||
                (!isset($pars['id']) )
        ) {
            throw new Exception("o parametro grupo, despesas, orçado e"
            . " o parametro id são obrigatorios!");
        }
        $p = new ModelPlanoContas($pars['id'], $pars['grupo'],$pars['despesa'],$pars['orcado']);
        $dp = new DaoPlanoContas();
        $dp->salvar($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro salvo com sucesso!"));
        return $r;
    }

}
