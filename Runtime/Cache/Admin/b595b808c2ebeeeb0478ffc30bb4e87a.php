<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>后台管理</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link href="/Public/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/static/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/Admin/css/my-app.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/static/css/base.css" rel="stylesheet" type="text/css"/>
    
    <style>

    </style>

</head>
<body>

    <div class="header">
        <!--Logo--> 
        <span class="logo"></span>
        <!--/Logo--> 

        <!--主导航--> 
        <ul class="main-nav">
            <li><a href="/index.php?s=/admin/index/index.html">首页</a></li>
            <li><a href="/index.php?s=/admin/article/mydocument.html">内容</a></li>
            <li><a href="/index.php?s=/admin/user/index.html">用户</a></li>
            <li class="current"><a href="<?php echo U('Menu/index');?>">系统</a></li>
            <li><a href="/index.php?s=/admin/addons/index.html">扩展</a></li>        
        </ul>
        <!--/主导航--> 

        <!--用户栏--> 
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="admin">admin</em></li>
                <li><a href="/index.php?s=/admin/user/updatepassword.html">修改密码</a></li>
                <li><a href="/index.php?s=/admin/user/updatenickname.html">修改昵称</a></li>
                <li><a href="/index.php?s=/admin/public/logout.html">退出</a></li>
            </ul>
        </div>
    </div>


    <div class="main-block dpb">
        <div class="sidebar">
            <!--子导航--> 
            <div id="subnav" class="subnav">
                <!--子导航--> 
                <h3><i class="icon icon-unfold"></i>系统设置</h3>                        
                <ul class="side-sub-menu">
                    <li class="current">
                        <a class="item" href="/index.php?s=/admin/config/group.html">网站设置</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php?s=/admin/category/index.html">分类管理</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php?s=/admin/model/index.html">模型管理</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php?s=/admin/config/index.html">配置管理</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php?s=/admin/menu/index.html">菜单管理</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php?s=/admin/channel/index.html">导航管理</a>
                    </li>                        
                </ul>                     
                <!--/子导航  子导航--> 
                <!--/子导航  子导航--> 
                <h3><i class="icon icon-unfold"></i>数据备份</h3>                        
                <ul class="side-sub-menu">
                    <li>
                        <a class="item" href="/index.php?s=/admin/database/index/type/export.html">备份数据库</a>
                    </li>
                    <li>
                        <a class="item" href="/index.php?s=/admin/database/index/type/import.html">还原数据库</a>
                    </li>                        
                </ul>                     
                <!--/子导航-->             
            </div>
        </div>
        <div class='content'>
            


        </div>
    </div>











    <script src="/Public/static/jquery-2.2.4.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $(".main-block").height($(document).height() - $(".header").height());
        });
    </script>
    
    <script>

    </script>

</body>
</html>