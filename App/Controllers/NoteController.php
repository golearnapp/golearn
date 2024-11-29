<?php

namespace App\Controllers;

use App\Models\Note;

use MF\Controller\Action;
use MF\Model\Container;

class NoteController extends Action{

    public function note() {
		session_start();


		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('note', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}
    public function getNotes() {
        $userId = Session::get('id_usuario');
        echo json_encode($this-view->getAllNotesByUser($id_usuario));
       
    }

    public function saveNote() {
        $userId = Session::get('id_usuario');
        $data = json_decode(file_get_contents("php://input"), true);
        $text = $data['text'] ?? '';
        $color = $data['color'] ?? '#FFFFFF';

        $this->model->addNote($text, $color, $id_usuario);
    }

    public function updateNote() {
        $userId = Session::get('id_usuario');
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];
        $text = $data['text'];

        $this->model->updateNote($id, $text, $id_usuario);
    }

    public function deleteNote() {
        $userId = Session::get('id_usuario');
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];

        $this->model->deleteNote($id, $id_usuario);
    }
}
