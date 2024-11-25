<?php

namespace App\Models;

use MF\Model\Model;

class Playlist extends Model
{
    // Propriedades
    private $id;
    private $titulo;
    private $descricao;
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

    // Método para criar uma playlist
    public function criarPlaylist()
    {
        $query = "INSERT INTO playlists (titulo, descricao, id_usuario) VALUES (:titulo, :descricao, :id_usuario)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':titulo', $this->__get('titulo'));
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    // Método para listar todas as playlists de um usuário
    public function listarPlaylists($id_usuario)
    {
        $query = "SELECT * FROM playlists WHERE id_usuario = :id_usuario ORDER BY criado_em DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Método para adicionar vídeo a uma playlist
    public function adicionarVideo($id_playlist, $id_video)
    {
        $query = "INSERT INTO playlist_videos (id_playlist, id_video) VALUES (:id_playlist, :id_video)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_playlist', $id_playlist);
        $stmt->bindValue(':id_video', $id_video);
        return $stmt->execute();
    }
    

    public function getAll() {
        $query = "SELECT * FROM playlists";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function exists($id)
{
    $query = "SELECT COUNT(*) FROM {$this->table} WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    return $stmt->fetchColumn() > 0;
}
    
}
