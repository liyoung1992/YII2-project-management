<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MysqlInfoQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mysql-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dbName') ?>

    <?= $form->field($model, 'userName') ?>

    <?= $form->field($model, 'passWord') ?>

    <?= $form->field($model, 'serverName') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'createTime') ?>

    <?php // echo $form->field($model, 'updateTime') ?>

    <?php // echo $form->field($model, 'userId') ?>

    <?php // echo $form->field($model, 'state') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
