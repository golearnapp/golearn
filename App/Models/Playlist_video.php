<?php

namespace App\Models;

use MF\Model\Model;

class Playlist_video extends Model
{
    // Propriedades
    private $id;
    private $id_playlist;
    private $id_video;

    // Getters e Setters
    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    // Método para adicionar vídeo a uma playlist
    public function adicionarVideo($id_playlist, $id_video) {
        $query = "INSERT INTO playlist_videos (id_playlist, id_video) VALUES (:id_playlist, :id_video)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_playlist', $id_playlist);
        $stmt->bindValue(':id_video', $id_video);
        return $stmt->execute();
    }

    // Método para obter vídeos de uma playlist
    public function obterVideosDaPlaylist($id_playlist)
    {
        $query = "SELECT v.* FROM videos v
                  JOIN playlist_videos pv ON v.id = pv.id_video
                  WHERE pv.id_playlist = :id_playlist";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_playlist', $id_playlist);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}