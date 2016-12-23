<?php

namespace app\controllers;

use app\models\RedisInfo;
use Codeception\Module\Redis;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;

class RedisController extends Controller
{

    public function actionIndex(){

        $dataProvider = new ActiveDataProvider([
            'query' => RedisInfo::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->renderPartial("index",[
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionConnect(){
        if(!empty($_POST)){
            $key = $_POST['id'].time();
            Yii::$app->session->set($key,$_POST);
            return $key;
        }else if(!empty($_GET['key'])){
            $paras = Yii::$app->session->get($_GET['key']);
            $redis = new \Redis();
            $redis->connect($paras['serverName'],$paras['port']);
            $redis->select($paras['db']);
            $keys = $redis->keys("*");
            $redis->close();
            $data = $this->generateTreeData($paras['serverName'],$keys);
            return $this->renderPartial("connect",[
                'data' => $data,
                'key' => $_GET['key'],
            ]);
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

    public function actionFind(){
        if(!empty($_POST)){
            $paras = Yii::$app->session->get($_POST['key']);
            $redis = new \Redis();
            $redis->connect($paras['serverName'],$paras['port']);
            $redis->select($paras['db']);
            $type = $redis->type($_POST['redis_key']);
            $result = array();
            switch($type){
                case \Redis::REDIS_STRING:
                    $data = $redis->get($_POST['redis_key']);
                    $result['key'] = array($_POST['redis_key']);
                    $result['data'] = array($data);
                    break;
                case \Redis::REDIS_SET:
                    $data = $redis->get($_POST['redis_key']);
                    $result['key'] = array($_POST['redis_key']);
                    $result['data'] = array($data);
                    break;
                case \Redis::REDIS_LIST:
                    break;
                case \Redis::REDIS_ZSET:
                    break;
                case \Redis::REDIS_HASH:
                    break;
                case \Redis::REDIS_NOT_FOUND:
            }
            return json_encode($result);
        }
    }


}