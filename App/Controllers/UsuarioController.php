<?php

namespace App\Controllers;


use MF\Controller\Action;
use MF\Model\Container;

class UsuarioController extends Action {

    public function usuarios() {
        $usuario = Container::getModel('Usuario');
        $this->view->usuarios = $usuario->getAll();
        
    }
}