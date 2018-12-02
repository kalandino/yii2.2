<?php use yii\widgets\Pjax; ?>


<?php Pjax::begin(); ?>

<?= \yii\helpers\Html::a("Обновить", ['pjax/time'], ['class' => 'btn btn-success']); ?>
<h2>Текущее время: <?= $time; ?></h2>

<?php Pjax::end(); ?>

