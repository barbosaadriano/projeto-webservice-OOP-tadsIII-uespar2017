<?php

/**
 * Description of DaoProduto
 *
 * @author Administrador
 */
class DaoPlanoContas {

    public function listar($id = false) {

        $sql = "select * from tbl_planoc ";
        if ($id) {
            $sql.=" where id = :id ";
        }
        $sth = Connection::getInstance()->getPdo()->prepare($sql);
        if ($id) {
            $sth->bindValue("id", $id);
        }
        $sth->execute();
        $res = $sth->fetchAll();
        $out = array();
        foreach ($res as $ln) {
            $p = new ModelPlanoContas($ln['id'], $ln['grupo'],$ln['despesa'],$ln['orcado']);
            $out[] = (array) $p;
        }
        return $out;
    }

    public function salvar(ModelPlanoContas $p) {
        $sql = "";
        $id = null;
        $grupo = $p->getGrupo();
        $desp = $p->getDespesa();
        $orc = $p->getVlOrcado();
        if (!$p->getId()) {
            $sql = "insert into tbl_planoc "
                    . " ( id , grupo, despesa, orcado ) values "
                    . " ( :id, :grupo, :despesa, :orcado )";
        } else {
            $sql = "update produto set grupo = :grupo, despesa =:despesa, orcado =:orcado"
                    . " where id = :id ";
            $id = $p->getId();
        }
        Connection::getInstance()->getPdo()->beginTransaction();
        $sth = Connection::getInstance()->getPdo()->prepare($sql);
        $sth->bindValue("id", $id);
        $sth->bindValue("grupo", $grupo);
        $sth->bindValue("despesa", $desp);
        $sth->bindValue("orcado", $orc);
        try {
            $sth->execute();
            Connection::getInstance()->getPdo()->commit();
            $sth = Connection::getInstance()->getPdo()->prepare("select id from tbl_planoc order by id desc limit 1");
            $sth->execute(); 
            $res = $sth->fetch();
            return (int) $res['id'];
        } catch (Exception $exc) {
            Connection::getInstance()->getPdo()->rollBack();
            throw $exc;
        }
    }

    public function remover(ModelPlanoContas $p) {

        $sql = "delete from tbl_planoc where id = :id";

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
