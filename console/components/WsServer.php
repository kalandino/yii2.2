<?php

namespace console\components;

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
		$this->clients->attach($conn);
		echo "New connection : {$conn->resourceId}";
	}

	function onClose(ConnectionInterface $conn) {
		$this->clients->detach($conn);
		echo "User : {$conn->resourceId} disconnect!";
	}

	function onError(ConnectionInterface $conn, \Exception $e) {
		$conn->close();
		echo "Conn {$conn->resourceId} closed with error";
	}

	function onMessage(ConnectionInterface $from, $data) {
		// echo "message {$msg} from {$from->resourceId}";
		$data = json_decode($data, true);
		(new Chat($data))->save();
		
		foreach ($this->clients as $client) {
			$client->send($data['message']);

		}
	}
}