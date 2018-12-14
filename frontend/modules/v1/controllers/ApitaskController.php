<?php

namespace frontend\modules\v1\controllers;

use common\models\tables\Task;
use common\models\User;
use common\models\filters\ApitaskFilter;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class ApitaskController extends ActiveController
{
	public $modelClass = Task::class;

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
  	$filter = \Yii::$app->request->get('filter');
  	$query = Task::find();
    return new ActiveDataProvider([
    	'query' => (new ApitaskFilter)->filter($filter, $query)
    ]);
  }
}