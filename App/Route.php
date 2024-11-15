<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

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

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['timeline'] = array(
			'route' => '/timeline',
			'controller' => 'AppController',
			'action' => 'timeline'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		$this->setRoutes($routes);
	}

}

?>