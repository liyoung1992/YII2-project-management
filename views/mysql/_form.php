<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MysqlInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mysql-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dbName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passWord')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serverName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createTime')->textInput() ?>

    <?= $form->field($model, 'updateTime')->textInput() ?>

    <?= $form->field($model, 'userId')->textInput() ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
