<?php

namespace app\controllers;

use Codeception\Module\Redis;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class RedisController extends Controller
{

    public function actionIndex(){

        $dataProvider = new ActiveDataProvider([
            'query' => Redis::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->renderPartial("index",[
            'dataProvider' => $dataProvider,

        ]);
    }

}