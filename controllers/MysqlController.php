<?php

namespace app\controllers;

use app\models\MysqlInfo;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\SqlDataProvider;

class MysqlController extends Controller
{

    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => MysqlInfo::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->renderPartial("index",[
            'dataProvider' => $dataProvider,

        ]);
    }
    public function actionView(){

    }
    public function actionUpdate(){

    }
    public function actionDelete(){

    }
    public function actionConnect(){
        if(!empty($_POST)){

//            $conn = new \mysqli($_POST['serverName'], $_POST['userName'], $_POST['password'], $_POST['dbName']);
            $key = $_POST['serverName'].$_POST['userName'].time();
            Yii::$app->session->set($key,$_POST);
            return $key;
        }else if(!empty($_GET['key'])){
            $paras = Yii::$app->session->get($_GET['key']);
            $conn = new \mysqli($paras['serverName'], $paras['userName'], $paras['password'], $paras['dbName']);
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }
            $tables = $conn->query("show tables");
            $table_list = array();
            if ($tables->num_rows > 0) {
                while ($row = $tables->fetch_assoc()) {
                    $table_list[] = $row['Tables_in_'.$paras['dbName']];
                }
            } else {
                echo "没有查询到结果！！！";
            }
            $conn->close();
            $data = $this->generateTreeData($paras['dbName'],$table_list);
            return $this->renderPartial("connect",[
                'data' => $data,
                'key' => $_GET['key'],
            ]);
        }
    }

    public function actionFind(){
        if(!empty($_POST)){
//            $paras = $_POST['key'];
            $paras = Yii::$app->session->get($_POST['key']);
            $conn = new \mysqli($paras['serverName'], $paras['userName'], $paras['password'], $paras['dbName']);
            if ($conn->connect_error) {
                die("连接失败: " . $conn->connect_error);
            }
            $table_data = $conn->query("select * from {$_POST['table']}");
            $data = array();
            if ($table_data->num_rows > 0) {
                while ($row = $table_data->fetch_assoc()) {
                    $data[] = $row;
                }
            } else {
                echo "没有查询到结果！！！";
            }
            $result = array();
            $keys = array();
            if(!empty($data[0])){
                foreach ($data[0] as $key => $item) {
                    $keys[] = $key;
                }
            }
            $result['key'] = $keys;
            $result['data'] = $data;
            return json_encode($result);
        }else{
            return "";
        }
    }
    public function generateTreeData($parent,$data){
        $ztree = array();
        $table['id'] = 1;
        $table['pId'] = -1;
        $table['name'] = $parent;
        $table['open'] = true;
        $ztree[] = $table;
        if(!empty($data)){
            foreach ($data as $item) {
                $table['id'] = $item;
                $table['pId'] = 1;
                $table['name'] = $item;
                $ztree[] = $table;
            }
        }
        return json_encode($ztree);
    }
}