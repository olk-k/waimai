<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>我的生活</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link href="/Public/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/static/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/Home/css/my-app.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/static/css/base.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/Home/css/color.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/Home/css/icon.css" rel="stylesheet" type="text/css"/>
    
    <style>
        .userIcon{
            width: 60px;
            height: 60px;
            border-radius: 60px;
            background-size: 100%;
        }
        .userInfo{
            margin-top: 10px;
        }
        .userDetails{
            padding: 20px 30px;
        }
        .funIcon{
            width: 35px;
            height: 35px;
            line-height: 35px;
            font-size: 1.8em;
        }
        .serIcon{
            width: 55px;
            height: 55px;
        }
    </style>

</head>
<body>

    
    <header class="navbar navbar-static-top bs-docs-nav">
        <a href="javaScript:history.go(-1);">
            <div class="left txc margin-right-1">
                <span class="fa fa-angle-left icon-color-1"></span>
            </div>
        </a>
        <div class="txc">
            个人中心
        </div>
    </header>

    <div class="content">
        <div class="ofh userDetails background-color-0 margin-bottom-1">
            <div class="left">
                <div class="userIcon" style=" background-image: url(/Public/Home/images/img-1.jpg);"></div>
            </div>
            <div class="left userInfo margin-left-1">
                <div>小新才是可爱的</div>
                <div>已绑定的手机号：13550842366</div>
            </div>
        </div>



        <div class="background-color-0 margin-top-1">
            <div class="ofh padding-top-1 padding-bottom-1 padding-left-2 padding-right-2 border-bottom border-color-1">
                <div class="left">我的订单</div>
                <div class="right">查看全部订单&nbsp;></div>
            </div>

            <div class="txc padding-top-1 ofh">
                <a href="#">
                    <div class="col-xs-0 left padding-bottom-1 padding-top-1 font-color-3">
                        <div class="funIcon fa fa-credit-card"></div>
                        <div>待付款</div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-xs-0 left padding-bottom-1 padding-top-1 font-color-3">
                        <div class="funIcon"></div>
                        <div>待发货</div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-xs-0 left padding-bottom-1 padding-top-1 font-color-3">
                        <div class="funIcon fa fa-truck"></div>
                        <div>待收货</div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-xs-0 left padding-bottom-1 padding-top-1 font-color-3">
                        <div class="funIcon"></div>
                        <div>待付款</div>
                    </div>
                </a>
                <a href="#">
                    <div class="col-xs-0 left padding-bottom-1 padding-top-1 font-color-3">
                        <div class="funIcon"></div>
                        <div>待付款</div>
                    </div>
                </a>
            </div>
        </div>


        <div class="margin-top-1 background-color-0">
            <div class="txc ofh">
                <div class="col-xs-3 border-right border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>
                <div class="col-xs-3 border-right border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>
                <div class="col-xs-3 border-right border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>
                <div class="col-xs-3 border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>
                <div class="col-xs-3 border-right border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>
                <div class="col-xs-3 border-right border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>
                <div class="col-xs-3 border-right border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>
                <div class="col-xs-3 border-bottom border-color-1 padding-bottom-1 padding-top-1">
                    <div class="serIcon"></div>
                    <div>123</div>
                </div>

            </div>
        </div>

    </div>



    <script src="/Public/static/jquery-2.2.4.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        +$(function () {
            $(".content").height($(document).height());
        });
    </script>

</body>
</html>