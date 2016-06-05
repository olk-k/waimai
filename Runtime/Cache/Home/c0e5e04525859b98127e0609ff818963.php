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
    

</head>
<body>

    

    <header class="navbar navbar-static-top bs-docs-nav">
        <a href="javaScript:history.go(-1);">
            <div class="pull-left padding-left-1 padding-right-1">
                <span class="fa fa-angle-left icon-color-1"></span>
            </div>
        </a>
        <div class="pull-right">
            <a href="<?php echo U('Search/search');?>"><span class="fa fa-search icon-color-1"></span></a>
            <span class="border-left border-color-1 margin-right-1  margin-left-1"></span>
            <a href="<?php echo U('User/shopCart');?>"><span class="fa fa-shopping-cart icon-color-1"></span></a>
            <span class="border-left border-color-1 margin-right-1  margin-left-1"></span>
            <a href="<?php echo U('User/userCenter');?>"><span class="fa fa-user icon-color-1"></span></a>
        </div>
    </header>

    <div class="content">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active" style="background-color: #00F;height: 200px;   ">
                    <div class="carousel-caption">
                        Slide1
                    </div>
                </div>
                <div class="item" style="background-color: #00F;height: 200px;   ">
                    <div class="carousel-caption">
                        Slide2
                    </div>
                </div>
            </div>
        </div>

        <div class="background-color-1 font-size-1">
            <div class="background-color-0 padding-1">
                <div class="pltitle padding-top-1">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                <div class="plprice padding-top-1">￥29.00</div>
                <div class="padding-top-1">运费：￥5.00</div>
            </div>
            <div class="padding-1 border-bottom border-color-2">
                <span class="padding-right-1 dpib"><i class="fa fa-check-circle-o font-color-2"></i> 平台担保</span>
                <span class="padding-right-1 dpib"><i class="fa fa-check-circle-o font-color-2"></i> 支付宝支付</span>
                <span class="padding-right-1 dpib"><i class="fa fa-check-circle-o font-color-2"></i> 微信支付</span>
                <span class="padding-right-1 dpib"><i class="fa fa-check-circle-o font-color-2"></i> 信用卡支付</span>
                <span class="padding-right-1 dpib"><i class="fa fa-check-circle-o font-color-2"></i> 30分钟发货</span>
                <span class="padding-right-1 dpib"><i class="fa fa-check-circle-o font-color-2"></i> 不支持退货</span>
            </div>
            <div class="margin-bottom-1 background-color-0 padding-1 border-bottom border-color-2 ofh lha">
                <span class="left">请选择 商品型号</span>
                <span class="right fa fa-angle-right"></span>
            </div>
            <iframe id="iframepage" frameborder="0" src="<?php echo U('index/index');?>" width="100%" class="background-color-0 border-top border-color-2"></iframe>
        </div>
    </div>


    <script src="/Public/static/jquery-2.2.4.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        $(function () {

            $("#iframepage").load(function () {
                $(this).height($(this).contents().height());
            });


        });
    </script>

</body>
</html>