<?php

/**
 *
 * @author Administrador
 */
interface ControllerInterface {

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface retorna uma Response interface
     */
    public function create(RequestInterface $req);

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface retorna uma Response interface
     */
    public function update(RequestInterface $req);

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface retorna uma Response interface
     */
    public function listar(RequestInterface $req);

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface retorna uma Response interface
     */
    public function delete(RequestInterface $req);
}
