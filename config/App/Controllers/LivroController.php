<?php

namespace App\Controllers;

use App\Models\Livro;

use MF\Controller\Action;
use MF\Model\Container;

class LivroController extends Action
{
    public function buscar()
    { 
        $query = $_GET['search'] ?? '';
        if ($query) { $resultados = Livro::buscarLivros($query);

            $this->view->resultados = $resultados;
            $this->render('book', 'layout2');
        } else { 
            
            $_SESSION['mensagem'] = 'Por favor, insira um termo de busca.';
                header("Location: /buscar");
                
        } 
    }
}