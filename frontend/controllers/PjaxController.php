<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Pjax controller
 */
class PjaxController extends Controller
{
	public function actionTime()
	{
		$time = date("H:i:s");
		return $this->render('time', ['time' => $time]);
	}
}