<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-detail">

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