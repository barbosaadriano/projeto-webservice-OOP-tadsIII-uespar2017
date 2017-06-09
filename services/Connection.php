<?php

/**
 * Description of Connection
 *
 * @author Administrador
 */
class Connection {

    /**
     *
     * @var PDO 
     */
    private $pdo;
    private static $instance;

    private function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost; port=3306; dbname=test", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    function getPdo() {
        return $this->pdo;
    }

}
