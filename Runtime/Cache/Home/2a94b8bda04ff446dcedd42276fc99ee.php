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
            width: 30px;
            height: 30px;
            border-radius: 100%;
            background-size: 100%;
        }
    </style>

</head>
<body>

    

    <header class="navbar navbar-static-top bs-docs-nav">
        <a href="<?php echo U('User/userCenter');?>">
            <div class="left">
                <div class="userIcon" style=" background-image: url('/Public/Home/images/img-1.jpg');"></div>
            </div>
        </a>
        <div class="pull-right">
            <a href="<?php echo U('Search/search');?>"><span class="fa fa-search icon-color-1"></span></a>
            <span class="border-left border-color-1 margin-right-1  margin-left-1"></span>
            <a href="<?php echo U('User/shopCart');?>"><span class="fa fa-shopping-cart icon-color-1"></span></a>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>
                <div class="col-xs-6 productItem">
                    <a href="<?php echo U('product/details');?>">
                        <div class="plimg" style=" background-image: url(/Public/Home/images/img-1.jpg); background-size: 100% 100%;"></div>
                        <div class="pltitle">爱鲨 iPhone6手机壳苹果6s套奢华简约ipone平</div>
                        <div class="plprice">￥29.00</div>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <script src="/Public/static/jquery-2.2.4.min.js"></script>
    <script src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        $(function () {
            $('.carousel').carousel({
                interval: 3000,
                wrap: true
            });
            $(".plimg").height($(".plimg").width());

        });
    </script>

</body>
</html>