<?php

namespace App\Controllers;
use App\Models\Playlist;
use App\Models\Video;
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
			$videoModel = Container::getModel('Videoaula');
        	$playlistModel = Container::getModel('Playlist');
			$videos = $videoModel->getAll();
			$playlists = $playlistModel->getAll();
			$this->view->video = $videos;
        	$this->view->playlists = $playlists;
			$this->render('upload', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}

		

		
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
			$arquivo = Container::getModel('Arquivo');
			
			$arquivos = $arquivo->getAll();
			
			$this->view->arquivo = $arquivos;
			
			
			$this->render('listas_arquivo', 'layout2');
		} else {
			header('Location: /login?login=erro');
		}
	}
}

?>