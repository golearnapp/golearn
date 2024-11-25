<?php

namespace App\Models;

use MF\Model\Model;

class Arquivo extends Model {

    private $id;
    private $nome_arquivo;
    private $caminho_arquivo;
    private $tipo_arquivo;
    private $tamanho_arquivo;
    private $enviado_por;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
 
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
        
        public function getAll() {
            $query = "SELECT id, nome_arquivo, caminho_arquivo, tipo_arquivo, tamanho_arquivo, enviado_por, data_envio FROM arquivos";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } 
        
     
    
   
}
    
