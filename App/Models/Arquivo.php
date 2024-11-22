<?php

namespace App\Models;

use MF\Model\Model;

class Arquivo extends Model {
 
        public function salvar($dados) {
            if (empty($dados['nome_arquivo']) || empty($dados['caminho_arquivo'])) {
                throw new Exception("Nome do arquivo ou caminho não podem ser nulos.");
            }
        
            $query = "INSERT INTO arquivos (nome_arquivo, caminho_arquivo, tipo_arquivo, tamanho_arquivo, enviado_por) 
                    VALUES (:nome_arquivo, :caminho_arquivo, :tipo_arquivo, :tamanho_arquivo, :enviado_por)";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nome_arquivo', $dados['nome_arquivo']);
            $stmt->bindValue(':caminho_arquivo', $dados['caminho_arquivo']);
            $stmt->bindValue(':tipo_arquivo', $dados['tipo_arquivo']);
            $stmt->bindValue(':tamanho_arquivo', $dados['tamanho_arquivo']);
            $stmt->bindValue(':enviado_por', $dados['enviado_por']);
        
            return $stmt->execute();
        }
    
    
    
        public function listarArquivos() {
            session_start();
        
            $arquivo = Container::getModel('Arquivo');
            $arquivos = $arquivo->getAll(); // Método no modelo que retorna todos os arquivos
        
            require_once '../views/lista_arquivos.php';
        }
}
    
