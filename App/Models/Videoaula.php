<?php

namespace App\Models;

use MF\Model\Model;

class Videoaula extends Model
{
    // Propriedades
    private $id;
    private $titulo;
    private $caminho;
    private $id_usuario;

    // Getters e Setters
    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    // Método para salvar vídeo
    public function salvar()
    {
        $query = "INSERT INTO videoaulas (titulo, caminho, id_usuario) VALUES (:titulo, :caminho, :id_usuario)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':titulo', $this->__get('titulo'));
        $stmt->bindValue(':caminho', $this->__get('caminho'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        return $stmt->execute();
    }

    // Método para listar todos os vídeos
    public function listarTodos()
    {
        $query = "SELECT id, titulo, caminho, criado_em FROM videoaulas ORDER BY criado_em DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
