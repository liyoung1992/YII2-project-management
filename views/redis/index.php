<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">


</head>
<body>
<form method="post" action="" id="listform">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li> <a class="button border-main icon-plus-square-o" href="add.html"> 添加数据库</a> </li>
                <li>
                    <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
                    <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>
            </ul>
        </div>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'serverName',
                'port',
                'note',
                'userId',
                'createTime:datetime',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=> '操作',
                    'template'=>'{connect}',
                    'buttons' => [
                        'connect' => function ($url, $model, $key) {

                            return  Html::a('<span class="glyphicon glyphicon-user">连接到数据库</span>',
                                "javascript:connect('$model->serverName','$model->port');",
                                ['title' => "连接到数据库",'data-pjax'=>'0'] ) ;
                        },
//                        'update' => function ($url, $model, $key) {
//                            return  Html::a('<span class="glyphicon glyphicon-user">编辑</span>', $url, ['title' => 121,'data-pjax'=>'0'] ) ;
//                        },
//                        'delete' => function ($url, $model, $key) {
//                            return  Html::a('<span class="glyphicon glyphicon-user">删除</span>', $url, ['title' => 121,'data-pjax'=>'0'] ) ;
//                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
</form>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/pintuer.js"></script>
<script type="text/javascript">
    function connect(serverName,Port){
        $.ajax({
            type:"POST",
            url:"/index.php?r=redis/connect",
            data:{
                "serverName":serverName,
                "port":Port,
            },
            dataType:'html',
            contentType:'application/x-www-form-urlencoded',
            async:false,
            success:function(data){
                window.location.href = "/index.php?r=redis/connect&key="+data;
                return false;
            },
            error:function(XMLHttpRequest, textStatus, errorThrown) {
                alert('读取超时，请检查网络连接');
                return false;
            },
        });
    }
</script>
</body>
</html>