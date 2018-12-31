<h1><?= $model->name; ?></h1>

<form action="#" id="chat-form" name="chat-form">
	<input type="hidden" name="channel" value="<?= $channel; ?>">
	<input type="hidden" name="user_id" value="<?= Yii::$app->user->getId(); ?>">
	<input type="text" name="message" placeholder="Введите сообщение">
	<button type="submit">Ваше сообщение</button>
</form>

<hr>
<div id="chat">
	<?php foreach ($history as $mes): ?>
	<div><?= $mes->message; ?></div>
	<?php endforeach; ?>
</div>

<script>
	if (!window.WebSocket) {
		alert('Ваш браузер не потдерживает Web-Sockets!');
	}

	var webSocket = new WebSocket("ws://yii2.2:8080?channel=<?= {$channel} ?>");

	document.getElementById("chat-form")
		.addEventListener('submit', function(e) {
			var data = {
				message: this.message.value,
				channel: this.channel.value,
				user_id: this.user_id.value,
			};

			webSocket.send(textMessage);
			e.preventDefault();
			return false;
		});

	webSocket.onmessage = function(e) {
		var data = e.data;
		var messageContainer = document.createElement('div');
		var textNode = document.createTextNode(data);
		messageContainer.appendChild(textNode);
		document.getElementById('chat').appendChild(messageContainer);
	}

	// webSocket.on = 
</script>

