<?php

namespace App\Models;

use MF\Model\Model;

class LivroOpenLibrary extends Model {

    public function buscarPorTermo($termo) {
        if (empty($termo)) {
            return []; // Sempre retorne um array
        }
    
        $url = "https://openlibrary.org/search.json?q=" . urlencode($termo);
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        $dados = json_decode($response, true);
    
        $livros = [];
        if (!empty($dados['docs'])) {
            foreach ($dados['docs'] as $doc) {
                $livros[] = [
                    'titulo' => $doc['title'] ?? 'Título não disponível',
                    'autor' => $doc['author_name'][0] ?? 'Autor não disponível',
                    'capa' => isset($doc['cover_i']) ? "https://covers.openlibrary.org/b/id/{$doc['cover_i']}-L.jpg" : null
                ];
            }
        }
    
        return $livros;
    }
    
}
