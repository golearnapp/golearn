<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		// Rotas de Páginas
		$routes['home'] = array(
			'route' => '/',
        	'controller' => 'indexController',
        	'action' => 'index'
        );      
        $routes['devs'] = array(
			'route' => '/devs',
			'controller' => 'indexController',
			'action' => 'devs'
		);
        $routes['login'] = array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);
        $routes['signup'] = array(
			'route' => '/signup',
			'controller' => 'indexController',
			'action' => 'signup'
		);
		$routes['register'] = array(
			'route' => '/register',
			'controller' => 'indexController',
			'action' => 'register'
		);
        $routes['code'] = array(
			'route' => '/code',
			'controller' => 'indexController',
			'action' => 'code'
		);
        $routes['recover'] = array(
			'route' => '/recover',
			'controller' => 'indexController',
			'action' => 'recover'
		);
        $routes['password'] = array(
			'route' => '/password',
			'controller' => 'indexController',
			'action' => 'password'
		);
		// Rotas de Autenticação
		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);
		// Rotas de Aplicação
		$routes['apphome'] = array(
			'route' => '/apphome',
			'controller' => 'AppController',
			'action' => 'apphome'
		);	

		$routes['book'] = array(
			'route' => '/book',
			'controller' => 'AppController',
			'action' => 'book'
		);

		$routes['perfil'] = array(
			'route' => '/perfil',
			'controller' => 'AppController',
			'action' => 'perfil'
		);

		$routes['calendario'] = array(
			'route' => '/calendario',
			'controller' => 'AppController',
			'action' => 'calendario'
		);

		$routes['videoaula'] = array(
			'route' => '/videoaula',
			'controller' => 'AppController',
			'action' => 'videoaula'
		);

		$routes['upload'] = array(
			'route' => '/upload',
			'controller' => 'AppController',
			'action' => 'upload'
		);

		$routes['listas_arquivo'] = array(
			'route' => '/listas_arquivo',
			'controller' => 'AppController',
			'action' => 'listas_arquivo'
		);

		// Rotas de Administração
		$routes['admin'] = array(
			'route' => '/admin',
			'controller' => 'AdminController',
			'action' => 'admin'
		);
		
		$routes['alterar_nivel'] = [
			'route' => '/admin/alterar_nivel',
			'controller' => 'AdminController',
			'action' => 'alterarNivelAcesso'
		];

		// Rotas de Playlist
        $routes['criar_playlist'] = [
            'route' => '/playlist/criar',
            'controller' => 'PlaylistController',
            'action' => 'criar'
        ];

        $routes['salvar_playlist'] = [
            'route' => '/playlist/salvar',
            'controller' => 'PlaylistController',
            'action' => 'salvar'
        ];

        $routes['visualizar_playlist'] = [
            'route' => '/playlist/visualizar',
            'controller' => 'PlaylistController',
            'action' => 'visualizar'
        ];

        $routes['adicionar_video_playlist'] = [
            'route' => '/playlist/adicionar_video',
            'controller' => 'PlaylistController',
            'action' => 'adicionarVideo'
        ];

        $routes['listar_playlists'] = [
            'route' => '/playlists',
            'controller' => 'PlaylistController',
            'action' => 'listar'
        ];

		// Rotas de Videoaula
        $routes['videoaula_upload'] = [
            'route' => '/videoaula/upload',
            'controller' => 'VideoaulaController',
            'action' => 'upload'
        ];

        $routes['videoaula_salvar'] = [
            'route' => '/videoaula/salvar',
            'controller' => 'VideoaulaController',
            'action' => 'salvar'
        ];

        $routes['videoaula_listar'] = [
            'route' => '/videoaula/listar',
            'controller' => 'VideoaulaController',
            'action' => 'listar'
        ];

		$routes['arquivo_salvar'] = [
			'route' => '/arquivo/salvar',
			'controller' => 'ArquivoController',
            'action' => 'postararquivo'
		];

		$routes['buscar'] = [
			'route' => '/buscar',
			'controller' => 'livroController',
			'action' => 'buscar'
		];

		$this->setRoutes($routes);
	}

}

?>