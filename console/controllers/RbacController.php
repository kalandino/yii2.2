<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
	public function actionIndex()
	{
		$auth = \Yii::$app->authManager;

		$admin = $auth->createRole('admin');
		$moder = $auth->createRole('moder');
		$manager = $auth->createRole('manager');

		$auth->add($admin);
		$auth->add($moder);
		$auth->add($manager);

		$permissionCreate = $auth->createPermission('createTask');
		$permissionDelete = $auth->createPermission('deleteTask');

		$auth->add($permissionCreate);
		$auth->add($permissionDelete);

		$auth->addChild($admin, $permissionCreate);
		$auth->addChild($admin, $permissionDelete);

		$auth->addChild($moder, $permissionCreate);

		$auth->addChild($manager, $permissionCreate);

		$auth->assign($admin, 1);
		$auth->assign($moder, 2);
		$auth->assign($manager, 3);
	}
}