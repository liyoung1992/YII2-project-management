<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>数据管理中心</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
</head>
<body  style="background-color:#f2f9fd;">
<?php $this->beginBody() ?>

<?php $this->beginContent('@app/views/layouts/header.php') ?>
<?php $this->endContent() ?>


<?php $this->beginContent('@app/views/layouts/left.php') ?>
<?php $this->endContent() ?>


<?= $content ?>
<!--footer-->
<?php $this->beginContent('@app/views/layouts/footer.php') ?>
<?php $this->endContent() ?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<script type="text/javascript">
//    $(function(){
//        $(".leftnav h2").click(function(){
//            $(this).next().slideToggle(200);
//            $(this).toggleClass("on");
//        })
//        $(".leftnav ul li a").click(function(){
//            $("#a_leader_txt").text($(this).text());
//            $(".leftnav ul li a").removeClass("on");
//            $(this).addClass("on");
//        })
//    });
</script>
