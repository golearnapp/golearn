<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Middleware\AuthMiddleware;
use MF\Controller\Action;
use MF\Model\Container;

class AdminController extends Action
{
    // Exibe a página de gerenciamento de usuários
    public function admin()
    {
        AuthMiddleware::verificarNivelAcesso(1); // Apenas Administradores        
        $usuario = Container::getModel('Usuario');
        // Buscar todos os usuários
        
        $usuarios = $usuario->getAll();
        // Atribuir os usuários à view
        
        $this->view->usuarios = $usuarios;        
        // Renderizar a view 'admin' com o layout 'layout2'
        $this->render('admin', 'layout2');
    }

    // Altera o nível de acesso de um usuário
    public function alterarNivelAcesso()
    {
        AuthMiddleware::verificarNivelAcesso(1); // Apenas Administradores

        $idUsuario = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);
        $novoNivel = filter_input(INPUT_POST, 'nivel_acesso', FILTER_VALIDATE_INT);

        if ($idUsuario && $novoNivel) {
            $usuario = Container::getModel('Usuario');
            if ($usuario->atualizarNivelAcesso($idUsuario, $novoNivel)) {
                $_SESSION['mensagem'] = 'Nível de acesso atualizado com sucesso!';
            } else {
                $_SESSION['mensagem'] = 'Erro ao atualizar o nível de acesso.';
            }
        } else {
            $_SESSION['mensagem'] = 'Dados inválidos.';
        }

        header('Location: /admin');
        exit;
    }
}
