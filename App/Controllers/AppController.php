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
	public function uplod() {
		session_start();
		

		if($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
			$this->render('uplod', 'layout2');
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
}

?>