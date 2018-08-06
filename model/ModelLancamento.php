<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lancamento
 *
 * @author drink
 */
class ModelLancamento {

    private $id;
    private $data;
    private $descricao;
    private $own;
    private $valor;
    private $tpDoc;
    private $planoId;

    function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getOwn() {
        return $this->own;
    }

    function getValor() {
        return $this->valor;
    }

    function getPlanoId() {
        return $this->planoId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setOwn($own) {
        $this->own = $own;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setPlanoId($planoId) {
        $this->planoId = $planoId;
    }

    function getTpDoc() {
        return $this->tpDoc;
    }

    function setTpDoc($tpDoc) {
        $this->tpDoc = $tpDoc;
    }

        function __construct($id, $data=null, $descricao=null, $own=null, $valor=null,$tpDoc=null, $planoId=null) {
        $this->id = $id;
        $this->data = $data;
        $this->descricao = $descricao;
        $this->own = $own;
        $this->valor = $valor;
        $this->tpDoc = $tpDoc;
        $this->planoId = $planoId;
    }

}
