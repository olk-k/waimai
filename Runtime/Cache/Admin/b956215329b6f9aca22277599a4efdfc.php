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
            
    <div id="main" class="main">
        <div class="main-title">
            <p>菜单管理</p>
        </div>

        <div class="cf">
            <a class="buttn" href="<?php echo U('Menu/add');?>">新 增</a>
            <button class="buttn ajax-post confirm" url="/index.php?s=/admin/menu/del.html" target-form="ids">删 除</button>
            <a class="buttn" href="/index.php?s=/admin/menu/import/pid/0.html">导 入</a>
            <button class="buttn list_sort" url="/index.php?s=/admin/menu/sort/pid/0">排序</button>
        </div>
        
        
        
        <div class="margin-top-1 margin-bottom-1 data-table">
            <form class="ids">
                <table>
                    <thead>
                        <tr>
                            <th class="row-selected">
                                <input class="checkbox check-all" type="checkbox">
                            </th>
                            <th>ID</th>
                            <th>名称</th>
                            <th>上级菜单</th>
                            <th>分组</th>
                            <th>URL</th>
                            <th>排序</th>
                            <th>仅开发者模式显示</th>
                            <th>隐藏</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="ids row-selected" type="checkbox" name="id[]" value="1"></td>
                            <td>1</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/index/pid/1.html">首页</a>
                            </td>
                            <td>无</td>
                            <td></td>
                            <td>Index/index</td>
                            <td>1</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/toogledev/id/1/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a href="/index.php?s=/admin/menu/tooglehide/id/1/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a title="编辑" href="/index.php?s=/admin/menu/edit/id/1.html">编辑</a>
                                <a class="confirm ajax-get" title="删除" href="/index.php?s=/admin/menu/del/id/1.html">删除</a>
                            </td>
                        </tr><tr>
                            <td><input class="ids row-selected" type="checkbox" name="id[]" value="2"></td>
                            <td>2</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/index/pid/2.html">内容</a>
                            </td>
                            <td>无</td>
                            <td></td>
                            <td>Article/mydocument</td>
                            <td>2</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/toogledev/id/2/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a href="/index.php?s=/admin/menu/tooglehide/id/2/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a title="编辑" href="/index.php?s=/admin/menu/edit/id/2.html">编辑</a>
                                <a class="confirm ajax-get" title="删除" href="/index.php?s=/admin/menu/del/id/2.html">删除</a>
                            </td>
                        </tr><tr>
                            <td><input class="ids row-selected" type="checkbox" name="id[]" value="16"></td>
                            <td>16</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/index/pid/16.html">用户</a>
                            </td>
                            <td>无</td>
                            <td></td>
                            <td>User/index</td>
                            <td>3</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/toogledev/id/16/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a href="/index.php?s=/admin/menu/tooglehide/id/16/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a title="编辑" href="/index.php?s=/admin/menu/edit/id/16.html">编辑</a>
                                <a class="confirm ajax-get" title="删除" href="/index.php?s=/admin/menu/del/id/16.html">删除</a>
                            </td>
                        </tr><tr>
                            <td><input class="ids row-selected" type="checkbox" name="id[]" value="68"></td>
                            <td>68</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/index/pid/68.html">系统</a>
                            </td>
                            <td>无</td>
                            <td></td>
                            <td>Config/group</td>
                            <td>4</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/toogledev/id/68/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a href="/index.php?s=/admin/menu/tooglehide/id/68/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a title="编辑" href="/index.php?s=/admin/menu/edit/id/68.html">编辑</a>
                                <a class="confirm ajax-get" title="删除" href="/index.php?s=/admin/menu/del/id/68.html">删除</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="ids row-selected" type="checkbox" name="id[]" value="93"></td>
                            <td>93</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/index/pid/93.html">其他</a>
                            </td>
                            <td>无</td>
                            <td></td>
                            <td>other</td>
                            <td>5</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/toogledev/id/93/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a href="/index.php?s=/admin/menu/tooglehide/id/93/value/0.html" class="ajax-get">
                                    是                            </a>
                            </td>
                            <td>
                                <a title="编辑" href="/index.php?s=/admin/menu/edit/id/93.html">编辑</a>
                                <a class="confirm ajax-get" title="删除" href="/index.php?s=/admin/menu/del/id/93.html">删除</a>
                            </td>
                        </tr><tr>
                            <td><input class="ids row-selected" type="checkbox" name="id[]" value="43"></td>
                            <td>43</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/index/pid/43.html">扩展</a>
                            </td>
                            <td>无</td>
                            <td></td>
                            <td>Addons/index</td>
                            <td>7</td>
                            <td>
                                <a href="/index.php?s=/admin/menu/toogledev/id/43/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a href="/index.php?s=/admin/menu/tooglehide/id/43/value/1.html" class="ajax-get">
                                    否                            </a>
                            </td>
                            <td>
                                <a title="编辑" href="/index.php?s=/admin/menu/edit/id/43.html">编辑</a>
                                <a class="confirm ajax-get" title="删除" href="/index.php?s=/admin/menu/del/id/43.html">删除</a>
                            </td>
                        </tr>				                </tbody>
                </table>
            </form>
            <!-- 分页 -->
            <div class="page">

            </div>
        </div>

    </div>

        </div>
    </div>











    <script src="/Public/static/jquery-2.2.4.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/static/validform.jquery.js"></script>
    <script>
        $(function () {
            $(".main-block").height($(document).height() - $(".header").height());
        });
    </script>
    
    <script>

    </script>

</body>
</html>