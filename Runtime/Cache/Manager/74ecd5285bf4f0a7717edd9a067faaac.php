<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo ($meta_title); ?>|TINY管理平台</title>
        <link href="/Public/Manager/images/favicon.png" type="image/x-icon" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="/Public/Manager/css/base.css" media="all">
        <link rel="stylesheet" type="text/css" href="/Public/Manager/css/common.css" media="all">
        <link rel="stylesheet" type="text/css" href="/Public/Manager/css/module.css">
        <link rel="stylesheet" type="text/css" href="/Public/Manager/css/style.css" media="all">
        <!--<link rel="stylesheet" type="text/css" href="/Public/Manager/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">-->
        <!--[if lt IE 9]>
       <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
       <![endif]--><!--[if gte IE 9]><!-->
        <script type="text/javascript" src="/Public/static/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="/Public/Manager/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="/Public/static/jquery.form.js"></script>
        <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["one"])): $i = 0; $__LIST__ = $__MENU__["one"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.nickname');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["two"])): $i = 0; $__LIST__ = $__MENU__["two"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): ?><!--<?php if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>-->
                        <ul class="side-sub-menu">
                            <li>
                                <a class="item" href="<?php echo (U($sub_menu["url"])); ?>"><?php echo ($sub_menu["title"]); ?></a>
                            </li>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
                <!-- nav -->
                <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                        <span>您的位置:</span>
                        <?php $i = '1'; ?>
                        <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                                <?php else: ?>
                                <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                            <?php $i = $i+1; endforeach; endif; ?>
                    </div><?php endif; ?>
                <!-- nav -->
            

            

    <div class="tab-wrap">
        <ul class="tab-nav nav">
            <li class="current"><a href="<?php echo U('Site/config');?>">基本配置</a></li>
        </ul>
        <div class="tab-content">
<!--            <div class="data-table table-striped">
                <table class="">
                    <thead>
                        <tr>
                            <th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
                            <th class="">UID</th>
                            <th class="">key</th>
                            <th class="">value</th>
                            <th class="">操作用户</th>
                            <th class="">状态</th>
                            <th class="">操作时间</th>
                            <th class="">备注</th>
                            <th class="">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($_list)): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><input class="ids" type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /></td>
                                <td><?php echo ($vo["id"]); ?> </td>
                                <td><?php echo ($vo["key"]); ?> </td>
                                <td><?php echo ($vo["value"]); ?></td>
                                <td><?php echo ($vo["username"]); ?></td>
                                <td><?php echo ($vo["status"]); ?></td>
                                <td><?php echo (time_format($vo["create_time"])); ?></td>
                                <td><?php echo ($vo["desc"]); ?></td>
                                <td>
                                    <a href="<?php echo U('Site/editConfig?i='.$vo['id']);?>">编辑</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php else: ?>
                        <td colspan="9" class="text-center"> aOh! 暂时还没有内容! </td><?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="page nls">
                <?php echo ($_page); ?>
            </div>
-->
            <form action="<?php echo U('');?>" method="post" class="form-horizontal">
                <div class="form-item">
                    <label class="item-label">网站标题<span class="check-tips">（网站标题前台显示标题）</span> </label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="config[WEB_SITE_TITLE]" value="<?php echo ($item["WEB_SITE_TITLE"]); ?>">				
                    </div>
                </div>
                <div class="form-item">
                    <label class="item-label">网站描述<span class="check-tips">（网站搜索引擎描述）</span> </label>
                    <div class="controls">
                        <label class="textarea input-large">
                            <textarea name="config[WEB_SITE_DESCRIPTION]"><?php echo ($item["WEB_SITE_DESCRIPTION"]); ?></textarea>
                        </label>				
                    </div>
                </div>
<!--                <div class="form-item">
                    <label class="item-label">关闭站点<span class="check-tips">（站点关闭后其他用户不能访问，管理员可以正常访问）</span> </label>
                    <div class="controls">
                        <select name="config[WEB_SITE_CLOSE]">
                            <option value="0">关闭</option><option value="1" selected="">开启</option>			</select>				
                    </div>
                </div>-->
                <div class="form-item">
                    <label class="item-label">网站关键字<span class="check-tips">（网站搜索引擎关键字）</span> </label>
                    <div class="controls">
                        <label class="textarea input-large">
                            <textarea name="config[WEB_SITE_KEYWORD]"><?php echo ($item["WEB_SITE_KEYWORD"]); ?></textarea>
                        </label>				
                    </div>
                </div>
<!--                <div class="form-item">
                    <label class="item-label">网站备案号<span class="check-tips">（设置在网站底部显示的备案号，如“沪ICP备12007941号-2）</span> </label>
                    <div class="controls">
                        <input type="text" class="text input-large" name="config[WEB_SITE_ICP]" value="">				
                    </div>
                </div>-->
<!--                <div class="form-item">
                    <label class="item-label">后台色系<span class="check-tips">（后台颜色风格）</span> </label>
                    <div class="controls">
                        <select name="config[COLOR_STYLE]">
                            <option value="default_color" selected="">默认</option><option value="blue_color">紫罗兰</option>			</select>				
                    </div>
                </div>-->
                <div class="form-item">
                    <label class="item-label"></label>
                    <div class="controls">
                        <button type="submit" class="btn submit-btn ajax-post" target-form="form-horizontal">确 定</button>				
                        <!--<button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用Tiny管理平台</div>
                <div class="fr">CMS_VERSION</div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
        (function () {
            var ThinkPHP = window.Think = {
                "ROOT": "", //当前网站地址
                "APP": "/index.php", //当前项目地址
                "PUBLIC": "/Public", //项目公共目录地址
                "DEEP": "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
                "MODEL": ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
                "VAR": ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
            }
        })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Manager/js/common.js"></script>
    <script type="text/javascript">
        +function () {
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function () {
                $("#main").css("height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function () {
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                        prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function (e) {
                e.stopPropagation()
            });

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function () {
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function () {
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function () {
                    userMenu.addClass("hidden")
                }, 100));
            });

            /* 表单获取焦点变色 */
            $("form").on("focus", "input", function () {
                $(this).addClass('focus');
            }).on("blur", "input", function () {
                $(this).removeClass('focus');
            });
            $("form").on("focus", "textarea", function () {
                $(this).closest('label').addClass('focus');
            }).on("blur", "textarea", function () {
                $(this).closest('label').removeClass('focus');
            });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if (diff > 0) {
                $(window).mousewheel(function (event, delta) {
                    if (delta > 0) {
                        if (parseInt(sub.css('marginTop')) > -10) {
                            sub.css('marginTop', '0px');
                        } else {
                            sub.css('marginTop', '+=' + 10);
                        }
                    } else {
                        if (parseInt(sub.css('marginTop')) < '-' + (diff - 10)) {
                            sub.css('marginTop', '-' + (diff - 10));
                        } else {
                            sub.css('marginTop', '-=' + 10);
                        }
                    }
                });
            }
        }();
    </script>

    <script>
        //导航高亮
        highlight_subnav('<?php echo U('base');?>');
    </script>

</body>
</html>