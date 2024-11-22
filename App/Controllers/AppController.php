<?php

namespace App\Controllers;

use App\Middleware\AuthMiddleware;
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {


	public function apphome() {

		session_start();


		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('apphome', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}

		
	}
	public function book() {
		session_start();


		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('book', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}
	public function perfil() {
		session_start();


		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('perfil', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}
	public function calendario() {
		session_start();


		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('calendario', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}
	public function videoaula() {
		session_start();


		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('videoaula', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}
	public function upload() {
		session_start();
		

		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('upload', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}

		$playlistModel = Container::getModel('Playlist');
		$videoModel = Container::getModel('Video');

		// Atribui as playlists e vídeos ao objeto view
		$this->view->playlists = $playlistModel->getAllPlaylists();
		$this->view->videos = $videoModel->getAllVideos();

		
	}

	public function listar_playlists() {
		session_start();
		

		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('listar', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}

	public function listas_arquivo() {
		session_start();
		

		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('listas_arquivo', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}
}

?>