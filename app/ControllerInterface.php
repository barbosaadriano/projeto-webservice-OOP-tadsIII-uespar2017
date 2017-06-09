<?php

/**
 *
 * @author Administrador
 */
interface ControllerInterface {

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface Description
     */
    public function create(RequestInterface $req);

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface Description
     */
    public function update(RequestInterface $req);

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface Description
     */
    public function listar(RequestInterface $req);

    /**
     * 
     * @param RequestInterface $req
     * @return ResponseJsonInterface Description
     */
    public function delete(RequestInterface $req);
}
