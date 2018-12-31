<?php

namespace common\components;

use frontend\models\tables\Project;
use common\models\tables\TelegramSubscribe;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;


class Bootstrap extends Component implements BootstrapInterface
{
	public function bootstrap($app)
	{
		Event::on(Project::class, Project::EVENT_AFTER_INSERT, function(Event $event) {
			$title = $event->sender->title;
			$message = "Создан новый проект  \"{$title}\"";
			$users = TelegramSubscribe::find()
				->select('chat_id')
				->where(['channel' => TelegramSubscribe::CHANNEL_PROJECT_CREATE])
				->column();
			foreach ($users as $user) {
				$bot = \Yii::$app->bot;
				$bot->sendMessage($user, $message);
			}
		});
	}
}