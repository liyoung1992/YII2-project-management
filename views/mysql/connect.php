<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE> ZTREE DEMO - left_menu for Outlook</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!--    <link rel="stylesheet" href="js/zTree/css/demo.css" type="text/css">-->
    <link rel="stylesheet" href="js/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <link rel="stylesheet" href="css/connect.css" type="text/css">


    <div class="zTreeDemoBackground">
        <ul id="treeDemo" class="ztree"></ul>

    </div>
    <div class="table_data">
          12121212
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
            select_from_table(treeNode.name);
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
       function select_from_table(table){
        alert(table);
       }
    </SCRIPT>