<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelPlano
 *
 * @author drink
 */
class ModelPlanoContas {

    private $id;
    private $grupo;
    private $despesa;
    private $vlOrcado;

    function getId() {
        return $this->id;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function getDespesa() {
        return $this->despesa;
    }

    function getVlOrcado() {
        return $this->vlOrcado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    function setDespesa($despesa) {
        $this->despesa = $despesa;
    }

    function setVlOrcado($vlOrcado) {
        $this->vlOrcado = $vlOrcado;
    }

    function __construct($id, $grupo=null, $despesa=null, $vlOrcado=null) {
        $this->id = $id;
        $this->grupo = $grupo;
        $this->despesa = $despesa;
        $this->vlOrcado = $vlOrcado;
    }

}
