<div class="leftnav">
    <!--    <div class="leftnav-title"><strong><span class="icon-list"></span>系统首页</strong></div>-->
    <h2><a class="left_nav" name="/index.php?r=home/index" href="#"><span class="icon-pencil-square-o" ></span>系统首页</a></h2>
    <h2><a  class="left_nav" name="/index.php?r=mysql/index" href="#"><span class="icon-pencil-square-o"></span>mysql管理</a></h2>

    <h2><a  class="left_nav" name="/index.php?r=redis/index" href="#"><span class="icon-pencil-square-o"></span>redis管理</a></h2>

    <h2><a  class="left_nav" name="/index.php?r=home/test" href="#"><span class="icon-pencil-square-o"></span>mongodb管理</a></h2>
    <h2><a  class="left_nav" name="/index.php?r=home/test" href="#"><span class="icon-pencil-square-o"></span>用户管理</a></h2>
    <h2><a  class="left_nav" name="/index.php?r=home/test" href="#"><span class="icon-pencil-square-o"></span>权限管理</a></h2>
</div>

<div class="admin">
    <iframe scrolling="auto" id="iframe" rameborder="0" src="/index.php?r=home/index" name="right" width="100%" height="100%"></iframe>
</div>
<script  type="text/javascript">
    $(".left_nav").click(function(){
        $("#iframe").attr('src',this.name);
    })
</script>