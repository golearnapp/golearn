<?php


namespace App\Models;

use MF\Model\Model;

class Livro extends Model {

    public static function buscarLivros($query)
    {
        $url = "https://openlibrary.org/search.json?q=" . urlencode($query);
        $response = file_get_contents($url);
         return json_decode($response, true);
    }
}