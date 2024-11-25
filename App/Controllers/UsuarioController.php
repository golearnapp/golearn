<?php

namespace App\Controllers;

use App\Models\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class UsuarioController extends Action {
    public function admin() {
        $usuarioModel = Container::getModel('Usuario');
        $usuario = $usuarioModel->getUsuarioPorId($_SESSION['id']);
        $this->view->usuario = $usuario;

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
            'listar_videoaulas'
        ];

        foreach ($views as $view) {
            $this->render($view, 'layout2');
        }
    }
}