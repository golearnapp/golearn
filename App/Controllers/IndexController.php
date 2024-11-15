<?php

namespace App\Controllers;


use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{
    public function index() {

            
            $this->render('index');
    }    
        

    public function devs() {
            
            
            $this->render('devs');
    }

    public function login() {
            
            $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
            $this->render('login');
    }

    public function signup() { 
            $this->view->usuario = array(
				'nome' => '',
				'email' => '',
                'telefone' => '',
				'senha' => '',
			);

		    $this->view->erroCadastro = false;          
            $this->render('signup');

    }
    public function register() {
           
           
        $usuario = Container::getModel('Usuario');

		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
        $usuario->__set('telefone', $_POST['telefone']);
        $usuario->__set('senha', $_POST['senha']);

		
        if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0) {
		
			$usuario->salvar();

			$this->render('cadastro');

		} 
		else 
		{

			$this->view->usuario = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroCadastro = true;

        	$this->render('signup');
        }            
    }
    public function recover() {
            
            
        $this->render('recover');
    }
    public function code() {
            
            
        $this->render('code');
    }
    public function password() {
            
            
        $this->render('password');
    }

       
}


?>