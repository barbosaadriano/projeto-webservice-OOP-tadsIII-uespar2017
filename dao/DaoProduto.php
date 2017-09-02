<?php

/**
 * Description of DaoProduto
 *
 * @author Administrador
 */
class DaoProduto {

    public function listar($id = false) {

        $sql = "select * from produto ";
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
            $p = new ModelProduto($ln['id'], $ln['nome']);
            $out[] = (array) $p;
        }
        return $out;
    }

    public function salvar(ModelProduto $p) {
        $sql = "";
        $id = null;
        $nome = $p->getNome();
        if (!$p->getId()) {
            $sql = "insert into produto "
                    . " ( id , nome ) values "
                    . " ( :id, :nome )";
        } else {
            $sql = "update produto set nome = :nome "
                    . " where id = :id ";
            $id = $p->getId();
        }
        Connection::getInstance()->getPdo()->beginTransaction();
        $sth = Connection::getInstance()->getPdo()->prepare($sql);
        $sth->bindValue("id", $id);
        $sth->bindValue("nome", $nome);
        try {
            $sth->execute();
            Connection::getInstance()->getPdo()->commit();
            return $id;
        } catch (Exception $exc) {
            Connection::getInstance()->getPdo()->rollBack();
            throw $exc;
        }
    }

    public function remover(ModelProduto $p) {

        $sql = "delete from produto where id = :id";

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
