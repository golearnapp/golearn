<?php

namespace App\Middleware;

use MF\Controller\Action;
use MF\Model\Container;

class AuthMiddleware extends Action
{
    // Verifica se o usuário está autenticado
    public static function isAuthenticated()
    {
        session_start();
  
        if (!isset($_SESSION['id']) || !isset($_SESSION['nivel_acesso'])) {
            header('Location: /login?erro=nao_autenticado');
            exit("Acesso negado: Você precisa estar logado.");
        }
    }
    // Verifica se o usuário tem o nível de acesso necessário
    public static function verificarNivelAcesso($nivelRequerido)
    {
        session_start();

        if (!isset($_SESSION['nivel_acesso']) || $_SESSION['nivel_acesso'] > $nivelRequerido) {
            header('Location: /apphome?acesso_negado');
            exit;
        }
    }
}
