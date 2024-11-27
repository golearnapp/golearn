<?php

namespace App\Controllers;

use App\Models\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class UsuarioController extends Action {
    public function admin() {
        $usuarioModel = Container::getModel('Usuario');
        $usuario = $usuarioModel->getAll($_SESSION['id'],  $_SESSION['nome'], $_SESSION['email'], $_SESSION['telefone']);
        

        $views = [
            'apphome',
            'arquivos',
            'calendario',
            'perfil',
            'listar_arquivos',
            'upload',
            'videoaula',
            'criar_playlist',
            'visualizar_playlist',
            'listar_videoaulas',
            'book'
        ];
 $this->view->usuario = $usuarios;
            $this->render($view, 'layout2');
        
    }
}