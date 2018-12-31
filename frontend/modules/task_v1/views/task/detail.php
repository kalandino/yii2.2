<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = 'Detail Tasks: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Detail';
?>
<div class="tasks-detail">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_detail', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
