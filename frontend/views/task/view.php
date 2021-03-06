<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\tables\Task */

$this->title = $model->name;
if(!isset($hideBreadcrumbs)) {
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="task-view">

    <h1><?= Html::a(Html::encode($this->title), ['detail', 'id' => $model->id]) ?></h1>

    <p>
        <?= Html::a('Detail', ['detail', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'date',
            'description:ntext',
            'responsible_id',
            // 'initiator_id',
            // 'project_id',
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
