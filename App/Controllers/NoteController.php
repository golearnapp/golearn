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
        $userId = Session::get('user_id');
        echo json_encode($this->model->getAllNotesByUser($userId));
    }

    public function saveNote() {
        $userId = Session::get('user_id');
        $data = json_decode(file_get_contents("php://input"), true);
        $text = $data['text'] ?? '';
        $color = $data['color'] ?? '#FFFFFF';

        $this->model->addNote($text, $color, $userId);
    }

    public function updateNote() {
        $userId = Session::get('user_id');
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];
        $text = $data['text'];

        $this->model->updateNote($id, $text, $userId);
    }

    public function deleteNote() {
        $userId = Session::get('user_id');
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];

        $this->model->deleteNote($id, $userId);
    }
}
