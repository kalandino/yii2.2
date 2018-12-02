<?php

namespace console\controllers;

use yii\console\Controller;
use console\components\WsServer;

class ServerController extends Controller
{
	public function actionWs()
	{
		// require "vendor/autoload.php";

		$server = \Ratchet\Server\IoServer::factory(
			new \Ratchet\Http\HttpServer(
				new \Ratchet\WebSocket\WsServer(
					new WsServer()
				)
			),
			8080
		);

		$server->run();
	}
}