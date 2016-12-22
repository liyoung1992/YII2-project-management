<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MysqlInfo */

$this->title = 'Update Mysql Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mysql Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mysql-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
