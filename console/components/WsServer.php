<?php

namespace console\components;

use common\models\tables\Chat;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class WsServer implements MessageComponentInterface
{
	protected $clients;

	public function __construct()
	{
		$this->clients = new \SplObjectStorage();
	}

	function onOpen(ConnectionInterface $conn) {
		// $this->clients->attach($conn);
		$queryString = $conn->httpRequest->getUri()->getQuery();
		$channel= esplode("=", $querystring)[1];
		$this->clients[$channel][$conn->resourceId] = $conn;
		echo "New connection : {$conn->resourceId}\n";
	}

	function onClose(ConnectionInterface $conn) {
		$this->clients->detach($conn);
		echo "User : {$conn->resourceId} disconnect!\n";
	}

	function onError(ConnectionInterface $conn, \Exception $e) {
		$conn->close();
		echo "Conn {$conn->resourceId} closed with error\n";
	}

	function onMessage(ConnectionInterface $from, $data) {
		// echo "message {$msg} from {$from->resourceId}";
		$data = json_decode($data, true);
		$channel = $data['channel'];
		(new Chat($data))->save();
		
		foreach ($this->clients[$channel] as $client) {
			$client->send($data['message']);

		}
	}
}