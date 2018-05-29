<?php

/**
 * Description of DaoProduto
 *
 * @author Administrador
 */
class DaoLancamento {

    public function listar($id = false) {

        $sql = "select * from tbl_lancamentos ";
        if ($id) {
            $sql .= " where id = :id ";
        }
        $sth = Connection::getInstance()->getPdo()->prepare($sql);
        if ($id) {
            $sth->bindValue("id", $id);
        }
        $sth->execute();
        $res = $sth->fetchAll();
        $out = array();
        foreach ($res as $ln) {
            $p = new ModelLancamento(
                    $ln['id'], $ln['data'], $ln['descricao'], $ln['own'], $ln['valor'], $ln['planoc_id']
            );
            $out[] = (array) $p;
        }
        return $out;
    }

    public function salvar(ModelLancamento $p) {
        $sql = "";
        $id = null;
        $desc = $p->getDescricao();
        $data = $p->getData();
        $own = $p->getOwn();
        $valor = $p->getValor();
        $pcid = $p->getPlanoId();
        if (!$p->getId()) {
            $sql = "insert into tbl_lancamentos "
                    . " ( id , data, descricao, own, valor, planoc_id ) values "
                    . " ( :id, :data, :descricao, :own, :valor, :pcid )";
        } else {
            $sql = "update produto set data = :data, descricao = :descricao, "
                    . " own = :own, valor = :valor, planoc_id = :pcid"
                    . " where id = :id ";
            $id = $p->getId();
        }
        Connection::getInstance()->getPdo()->beginTransaction();
        $sth = Connection::getInstance()->getPdo()->prepare($sql);
        $sth->bindValue("id", $id);
        $sth->bindValue("descricao", $desc);
        $sth->bindValue("data", $data);
        $sth->bindValue("own", $own);
        $sth->bindValue("valor", $valor);
        $sth->bindValue("pcid", $pcid);
        try {
            $sth->execute();
            Connection::getInstance()->getPdo()->commit();
            $sth = Connection::getInstance()->getPdo()->prepare("select id from tbl_lancamentos order by id desc limit 1");
            $sth->execute();
            $res = $sth->fetch();
            return (int) $res['id'];
        } catch (Exception $exc) {
            Connection::getInstance()->getPdo()->rollBack();
            throw $exc;
        }
    }

    public function remover(ModelLancamento $p) {

        $sql = "delete from tbl_lancamentos where id = :id";

        Connection::getInstance()->getPdo()->beginTransaction();
        $sth = Connection::getInstance()->getPdo()->prepare($sql);
        $id = $p->getId();
        $sth->bindValue("id", $id);
        try {
            $sth->execute();
            Connection::getInstance()->getPdo()->commit();
        } catch (Exception $exc) {
            Connection::getInstance()->getPdo()->rollBack();
            throw $exc;
        }
    }

}
