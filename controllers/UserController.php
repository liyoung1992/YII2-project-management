<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends Controller
{

    public function actionLogin(){
        return $this->render("index");
        $this->layout = false;
        return $this->render("login");
    }
    public function actionRegister(){
        $this->layout = false;
        return $this->render("register");
    }
    public function actionIndex(){
        $this->layout = "main.php";
        return $this->render("register");
    }
}