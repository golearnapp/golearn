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
    
 
    public function getAllNotesByUser($userId) {
        $stmt = $this->db->prepare("SELECT * FROM notes WHERE id_usuario = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNote($text, $color, $userId) {
        $stmt = $this->db->prepare("INSERT INTO notes (text, color, id_usuario) VALUES (?, ?, ?)");
        return $stmt->execute([$text, $color, $userId]);
    }

    public function updateNote($id, $text, $userId) {
        $stmt = $this->db->prepare("UPDATE notes SET text = ? WHERE id = ? AND id_usuario = ?");
        return $stmt->execute([$text, $id, $userId]);
    }

    public function deleteNote($id, $userId) {
        $stmt = $this->db->prepare("DELETE FROM notes WHERE id = ? AND id_usuario = ?");
        return $stmt->execute([$id, $userId]);
    }
}