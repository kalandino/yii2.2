<?php

namespace frontend\controllers;

use common\models\tables\Message;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class MessageController extends ActiveController
{
	public $modelClass = Message::class;

	public function behaviors()
	{
		$behaviors = parent::behaviors();
		$behaviors['authentificator'] = [
			'class' => HttpBasicAuth::class,
			'auth' => function($username, $password) {
				$user = User::findByUsername($username);
				if($user !== null && $user->validatePassword($password)) {
					return $user;
				} 
				return false;
			}
		];
		return $behaviors;
	}
}