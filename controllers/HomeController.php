<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class HomeController extends Controller
{

    public function actionIndex(){
        return $this->renderPartial("index");
    }
    public function actionTest(){
        echo 111;
    }

}