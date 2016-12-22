<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE> ZTREE DEMO - left_menu for Outlook</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!--    <link rel="stylesheet" href="js/zTree/css/demo.css" type="text/css">-->
    <link rel="stylesheet" href="js/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <link rel="stylesheet" href="css/connect.css" type="text/css">

    <input style="display: none" id="db_key" value="<?php echo $key;?>">
    <div class="zTreeDemoBackground">
        <ul id="treeDemo" class="ztree"></ul>

    </div>
    <div class="table_data">
           <h2 class="table_title">在这里显示数据库表的数据</h2>
         <table id="select_data" class="select_table_css">

         </table>
    </div>



    <script type="text/javascript" src="js/zTree/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="js/zTree/js/jquery.ztree.core.js"></script>
    <SCRIPT type="text/javascript">
        <!--
        var curMenu = null, zTree_Menu = null;
        var setting = {
            view: {
                showLine: false,
                showIcon: false,
                selectedMulti: false,
                dblClickExpand: false,
                addDiyDom: addDiyDom
            },
            data: {
                simpleData: {
                    enable: true
                }
            },
            callback: {
                beforeClick: beforeClick,
                onClick:onClick,
            }
        };
        var zNodes = <?php echo $data;?>;


        function addDiyDom(treeId, treeNode) {
            var spaceWidth = 5;
            var switchObj = $("#" + treeNode.tId + "_switch"),
                icoObj = $("#" + treeNode.tId + "_ico");
            switchObj.remove();
            icoObj.before(switchObj);

            if (treeNode.level > 1) {
                var spaceStr = "<span style='display: inline-block;width:" + (spaceWidth * treeNode.level)+ "px'></span>";
                switchObj.before(spaceStr);
            }
        }
        function onClick(event, treeId, treeNode, clickFlag) {
            select_from_table(treeNode.name,$("#db_key").val());
        }
        function beforeClick(treeId, treeNode) {
            if (treeNode.level == 0 ) {
                var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                zTree.expandNode(treeNode);
                return false;
            }
            return true;
        }

        $(document).ready(function(){
            var treeObj = $("#treeDemo");
            $.fn.zTree.init(treeObj, setting, zNodes);
            zTree_Menu = $.fn.zTree.getZTreeObj("treeDemo");
            curMenu = zTree_Menu.getNodes()[0].children[0].children[0];
            zTree_Menu.selectNode(curMenu);

            treeObj.hover(function () {
                if (!treeObj.hasClass("showIcon")) {
                    treeObj.addClass("showIcon");
                }
            }, function() {
                treeObj.removeClass("showIcon");
            });
        });
       function select_from_table(table,key){
           $.ajax({
               type:"POST",
               url:"/index.php?r=mysql/find",
               data:{
                   "table":table,
                   "key":key,
               },
               dataType:'html',
               contentType:'application/x-www-form-urlencoded',
               async:false,
               success:function(data){
                    $(".table_title").html(table + "表的所有数据");
                   var result = eval("("+data+")");
                   $("#select_data").empty();
                   var  header = "";
                   var body = "";
                   for(var i = 0; i < result['key'].length; i++){
                       var h = "<th>"+ result['key'][i]+"</th>"
                      header = header + h;
                   }
                   header = "<tr>" + header + "</tr>";
                   for(var i = 0; i < result['data'].length; i++){
                       var b = "<tr>"
                       for(var j = 0; j < result['key'].length; j++){
                           b = b + "<td>"+result['data'][i][result['key'][j]] +"</td>";
                       }
                       b = b + "</tr>";
                       body = body + b;
                   }

                   $("#select_data").append(header + body);
                   return false;
               },
               error:function(XMLHttpRequest, textStatus, errorThrown) {
                   alert('读取超时，请检查网络连接');
                   return false;
               },
           });
       }
    </SCRIPT>