<?php

namespace App\Models;

use MF\Model\Model;

class Arquivos extends Model {
    


        public function salvar($dados) {
            $query = "INSERT INTO arquivos (nome_arquivo, caminho_arquivo, enviado_por) VALUES (:nome_arquivo, :caminho_arquivo, :enviado_por)";
            $stmt = self::getDb()->prepare($query);
            $stmt->bindValue(':nome_arquivo', $dados['nome_arquivo']);
            $stmt->bindValue(':caminho_arquivo', $dados['caminho_arquivo']);
            $stmt->bindValue(':enviado_por', $dados['enviado_por']);
            $stmt->execute();
        }
    
        public function listarTodos() {
            $query = "SELECT a.id, a.nome_arquivo, a.caminho_arquivo, u.nome AS enviado_por 
                      FROM arquivos a 
                      JOIN usuarios u ON a.enviado_por = u.id";
            return self::getDb()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        }
}
    
