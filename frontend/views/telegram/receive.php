<?php
$script = <<< JS
	setInterval(function() {
		console.log('1');
		$('#btn-refresh').click();
	}, 1000);
JS;

$this->registerJs($script);

\yii\widgets\Pjax::begin(); ?>
<div class="messages-container">
	<?php 
	echo \yii\helpers\Html::a("Refresh", ["telegram/receive"], ['id' => 'btn-refresh', 'class' => 'btn btn-success']);
	foreach ($messages as $message): ?>
		<div>
			<b><?= $message['username']; ?></b>
			<?= $message['text']; ?>
		</div>
	<?php endforeach; ?>
</div>
<?php \yii\widgets\Pjax::end(); ?>