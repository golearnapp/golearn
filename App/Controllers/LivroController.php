<?php

namespace App\Controllers;
use App\Models\LivroOpenLibrary;

use MF\Controller\Action;
use MF\Model\Container;

class LivroController extends Action {
    public function book() {
		session_start();


		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			
			$this->render('book', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}

    public function buscar() {
        $termo = $_GET['termo'] ?? '';
        $limite = 10; // Define o limite de livros

        // Instanciar o Model e buscar dados
        $livroModel = Container::getModel('LivroOpenLibrary');
        $resultado = $livroModel->buscarPorTermo($termo, $limite);

        // Passar os dados para a View
        if(count($resultado) > 0) {
            $this->view->livros = $resultado;
            
        }else {
            $this->view->erro = 'Nenhum livro encontrado';    
         
        }
        $this->render('book', 'layout2');
    }
}
