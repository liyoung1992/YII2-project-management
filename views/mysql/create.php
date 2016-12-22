<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MysqlInfo */

$this->title = 'Create Mysql Info';
$this->params['breadcrumbs'][] = ['label' => 'Mysql Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysql-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
