<?php

namespace App\Models;

use MF\Model\Model;

class Note extends Model {

    private $id;
    private $text;
    private $cor;
    private $id_usuario;
    

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
    
 
    public function getAllNotesByUser($id_usuario) {
        $stmt = $this->db->prepare("SELECT * FROM notes WHERE id_usuario = ?");
        $stmt->execute([$id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNote($text, $color, $id_usuario) {
        $stmt = $this->db->prepare("INSERT INTO notes (text, color, id_usuario) VALUES (?, ?, ?)");
        return $stmt->execute([$text, $color, $id_usuario]);
    }

    public function updateNote($id, $text, $id_usuario) {
        $stmt = $this->db->prepare("UPDATE notes SET text = ? WHERE id = ? AND id_usuario = ?");
        return $stmt->execute([$text, $id, $id_usuario]);
    }

    public function deleteNote($id, $id_usuario) {
        $stmt = $this->db->prepare("DELETE FROM notes WHERE id = ? AND id_usuario = ?");
        return $stmt->execute([$id, $id_usuario]);
    }
}