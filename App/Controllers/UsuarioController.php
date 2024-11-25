<?php

namespace App\Controllers;

use App\Models\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class UsuarioController extends Action {

    public function admin() {
        $usuario = Container::getModel('Usuario');
        $usuarios = $usuario->getAll();
        $this->view->usuarios = $usuarios;
        $this->render('apphome', 'layout2');
        $this->render('arquivos', 'layout2');
        $this->render('calendario', 'layout2');
        $this->render('perfil', 'layout2');
        $this->render('listar_arquivos', 'layout2');
        $this->render('upload', 'layout2');
        $this->render('videoaula', 'layout2');
        $this->render('criar_playlist', 'layout2');
        $this->render('visualizar_playlist', 'layout2');
        $this->render('listar_videoaulas', 'layout2');
        
    }
}