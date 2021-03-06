<?php

namespace frontend\controllers;

use common\models\tables\Message;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

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

  public function actions()
  {
    $actions = parent::actions();
    unset($actions['index']);
    return $actions;
  }

  public function actionIndex()
  {
  	$query = Message::find();
  	$query->where(['user_id' => 2]);
    return new ActiveDataProvider([
    	'query' => $query
    ]);
  }
}