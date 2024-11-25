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
            
            $this->render('buscar');
        } else { 
            
            $_SESSION['mensagem'] = 'Por favor, insira um termo de busca.';
                header("Location: /buscar");
                
        } 
    }
}