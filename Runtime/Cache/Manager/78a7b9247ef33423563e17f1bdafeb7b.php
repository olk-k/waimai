<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>TINY管理平台</title>
        <link href="/Public/Manager/images/favicon.png" type="image/x-icon" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="/Public/Manager/css/login.css" media="all">
    </head>
    <body id="login-page">
        <div id="main-content">

            <!-- 主体 -->
            <div class="login-body">
                <div class="login-main pr">
                    <form action="<?php echo U('login');?>" method="post" class="login-form">
                        <h3 class="welcome"><i class="login-logo"></i>TINY管理平台</h3>
                        <div id="itemBox" class="item-box">
                            <div class="item">
                                <i class="icon-login-user"></i>
                                <input type="text" name="username" placeholder="请填写用户名" autocomplete="off" />
                            </div>
                            <span class="placeholder_copy placeholder_un">请填写用户名</span>
                            <div class="item b0">
                                <i class="icon-login-pwd"></i>
                                <input type="password" name="password" placeholder="请填写密码" autocomplete="off" />
                            </div>
                            <span class="placeholder_copy placeholder_pwd">请填写密码</span>
                            <div class="item verifycode">
                                <i class="icon-login-verifycode"></i>
                                <input type="text" name="verify" placeholder="请填写验证码" autocomplete="off">
                                <a class="reloadverify" title="换一张" href="javascript:void(0)">换一张？</a>
                            </div>
                            <span class="placeholder_copy placeholder_check">请填写验证码</span>
                            <div>
                                <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Public/verify');?>">
                            </div>
                        </div>
                        <div class="login_btn_panel">
                            <button class="login-btn" type="submit">
                                <span class="in"><i class="icon-loading"></i>登 录 中 ...</span>
                                <span class="on">登 录</span>
                            </button>
                            <div class="check-tips"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]-->
        <!--[if gte IE 9]><!-->
        <script type="text/javascript" src="/Public/static/jquery-2.2.4.min.js"></script>
        <!--<![endif]-->
        <script type="text/javascript">
            /* 登陆表单获取焦点变色 */
            $(".login-form").on("focus", "input", function () {
                $(this).closest('.item').addClass('focus');
            }).on("blur", "input", function () {
                $(this).closest('.item').removeClass('focus');
            });

            //表单提交
            $(document)
                    .ajaxStart(function () {
                        $("button:submit").addClass("log-in").attr("disabled", true);
                    })
                    .ajaxStop(function () {
                        $("button:submit").removeClass("log-in").attr("disabled", false);
                    });

            $("form").submit(function () {
                var self = $(this);

                $.post(self.attr("action"), self.serialize(), function (data) {
                    if (data.status) {
                        self.find(".check-tips").text("");
                        window.location.href = data.url;
                    } else {
                        self.find(".check-tips").text(data.info);
//                        刷新验证码
                        $(".verifyimg").attr("src", "<?php echo U('Public/verify');?>");
                        $("[name=verify]").val("");
                        if (data.info === "密码错误！") {
                            $("[name=password]").focus();
                            $("[name=password]").val("");
                        }
                    }
                }, "json");

                return false;
            });

            $(function () {
                //初始化选中用户名输入框
                $("#itemBox").find("input[name=username]").focus();
                //刷新验证码
                var verifyimg = $(".verifyimg").attr("src");
                $(".reloadverify").click(function () {
                    if (verifyimg.indexOf('?') > 0) {
                        $(".verifyimg").attr("src", "<?php echo U('Public/verify');?>");///index.php/Manager/Public/verify/i/
                    } else {
                        $(".verifyimg").attr("src", "<?php echo U('Public/verify');?>");
                    }
                });
            });
        </script>
    </body>
</html>