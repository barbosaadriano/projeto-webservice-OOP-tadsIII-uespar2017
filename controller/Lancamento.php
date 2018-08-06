<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class Lancamento implements ControllerInterface {
    
    private static $owns = [
        '89550440000071606954' => 'ADRIANO',
        '89550640439004333807' => 'FERNANDA',
    ];

    public function create(RequestInterface $req) {
        $pars = $req->getParam();
        if (!isset($pars['data'])) {
            throw new Exception("o parametro data é obrigatorio!");
        }
        if (!isset($pars['descricao'])) {
            throw new Exception("o parametro descricao é obrigatorio!");
        }
        if (!isset($pars['own'])) {
            throw new Exception("o parametro own é obrigatorio!");
        }
        if (!isset($pars['valor'])) {
            throw new Exception("o parametro valor é obrigatorio!");
        }
        if (!isset($pars['tp_doc'])) {
            throw new Exception("o parametro tipo de documento é obrigatorio!");
        }
        if (!isset($pars['planoc_id'])) {
            throw new Exception("o parametro planoc_id é obrigatorio!");
        }
        $p = new ModelLancamento(null, $pars['data'], $pars['descricao'], self::$owns[$pars['own']], $pars['valor'],$pars['tp_doc'], $pars['planoc_id']
        );
        $dp = new DaoLancamento();
        $id = $dp->salvar($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro salvo com sucesso!", 'id' => $id));
        return $r;
    }

    public function delete(RequestInterface $req) {
        $pars = $req->getParam();
        if (!isset($pars['id'])) {
            throw new Exception("o parametro id é obrigatorio!");
        }
        $p = new ModelLancamento($pars['id']);
        $dp = new DaoLancamento();
        $dp->remover($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro excluído com sucesso!"));
        return $r;
    }

    public function listar(RequestInterface $req) {
        $params = $req->getParam();
        $dp = new DaoLancamento();
        if (isset($params['id'])) {
            $lancamentos = $dp->listar($params['id']);
        } else {
            $lancamentos = $dp->listar();
        }
        return new DefaultResponse($lancamentos);
    }

    public function update(RequestInterface $req) {
        $pars = $req->getParam();
        if (
                (!isset($pars['data']) ) ||
                (!isset($pars['descricao']) ) ||
                (!isset($pars['own']) ) ||
                (!isset($pars['valor']) ) ||
                (!isset($pars['planoc_id']) ) ||
                (!isset($pars['id']) )
        ) {
            throw new Exception("o parametro data, descricao, own, valor, planoc_id e"
            . " o parametro id são obrigatorios!");
        }
        $p = new ModelLancamento(
                $pars['id'], $pars['data'], $pars['descricao'], $pars['own'], $pars['valor'], $pars['planoc_id']
        );
        $dp = new DaoLancamento();
        $dp->salvar($p);
        $r = new DefaultResponse();
        $r->setData(array('mensagem' =>
            "registro salvo com sucesso!"));
        return $r;
    }

}
