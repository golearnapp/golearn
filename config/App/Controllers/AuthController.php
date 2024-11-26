<?php

namespace App\Controllers;


use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {


	public function autenticar() {
		$usuario = Container::getModel('Usuario');
	
		// Recebe os dados do formulário
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);
		
	
		// Verifica credenciais
		$usuario->autenticar();
	
		if ($usuario->__get('id') != '' && $usuario->__get('nome')) {
			// Inicia a sessão e configura as variáveis
			session_start();
			session_regenerate_id(); // Segurança contra roubo de sessão
	
			$_SESSION['id'] = $usuario->__get('id');
			$_SESSION['nome'] = $usuario->__get('nome');
			$_SESSION['email'] = $usuario->__get('email');
			$_SESSION['telefone'] = $usuario->__get('telefone');
			$_SESSION['nivel_acesso'] = $usuario->__get('nivel_acesso');
	
			// Redireciona baseado no nível de acesso
			if ($_SESSION['nivel_acesso'] == 1) {
				header('Location: /admin');
			} elseif ($_SESSION['nivel_acesso'] == 2) {
				header('Location: /apphome');
			} else {
				header('Location: /apphome');
			}
		} else {
			// Login inválido
			header('Location: /login?login=erro');
		}
	}
	

	public function sair() {
		session_start();
		session_destroy();
		header('Location: /');
	}
}