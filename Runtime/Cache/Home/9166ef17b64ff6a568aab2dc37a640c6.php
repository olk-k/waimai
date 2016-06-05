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
        <link href="/Public/Home/css/base.css" rel="stylesheet" type="text/css"/>
        <link href="/Public/Home/css/color.css" rel="stylesheet" type="text/css"/>
    
    <style>
        .itemRadio{
            width: 25px;
        }
        .productIcon{
            width: 60px;
            height: 60px;
            background-color: #F00;
        }
        .settlement{
            bottom:0px;
            height: 50px;
            background-color: #FFF;
            line-height: 50px;
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
            购物车
        </div>
<!--        <div class="pull-right">
            <a href="<?php echo U('User/userCenter');?>"><span class="fa fa-user icon-color-1"></span></a>
        </div>-->
    </header>
    <div class="content">

        <div class="shopItem background-color-0 padding-left-1 padding-right-1  margin-top-1">
            <div class="padding-top-1 padding-bottom-1 border-bottom border-color-1 ofh dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="" style="-webkit-box-flex:1;">
                    欣欣超市
                </div>
            </div>

            <div class="border-bottom border-color-1 ofh padding-top-1 padding-bottom-1 dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="dpb" style="-webkit-box-flex:1;">
                    <div class="productIcon"></div>
                    <div class="margin-left-1" style="-webkit-box-flex:1;">
                        <div>韩版夏季新款女士学生凉鞋</div>
                        <div>型号：38</div>
                        <div>￥100</div>
                    </div>
                </div>
            </div>
            <div class="border-bottom border-color-1 ofh padding-top-1 padding-bottom-1 dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="dpb" style="-webkit-box-flex:1;">
                    <div class="productIcon"></div>
                    <div class="margin-left-1" style="-webkit-box-flex:1;">
                        <div>韩版夏季新款女士学生凉鞋</div>
                        <div>型号：38</div>
                        <div>￥100</div>
                    </div>
                </div>
            </div>
            <div class="ofh padding-top-1 padding-bottom-1 dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="dpb" style="-webkit-box-flex:1;">
                    <div class="productIcon"></div>
                    <div class="margin-left-1" style="-webkit-box-flex:1;">
                        <div>韩版夏季新款女士学生凉鞋</div>
                        <div>型号：38</div>
                        <div>￥100</div>
                    </div>
                </div>
            </div>


        </div>




        <div class="shopItem background-color-0 padding-left-1 padding-right-1  margin-top-1">

            <div class="padding-top-1 padding-bottom-1 border-bottom border-color-1 ofh dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="" style="-webkit-box-flex:1;">
                    欣欣超市
                </div>
            </div>

            <div class="border-bottom border-color-1 ofh padding-top-1 padding-bottom-1 dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="dpb" style="-webkit-box-flex:1;">
                    <div class="productIcon"></div>
                    <div class="margin-left-1" style="-webkit-box-flex:1;">
                        <div>韩版夏季新款女士学生凉鞋</div>
                        <div>型号：38</div>
                        <div>￥100</div>
                    </div>
                </div>
            </div>
            <div class="border-bottom border-color-1 ofh padding-top-1 padding-bottom-1 dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="dpb" style="-webkit-box-flex:1;">
                    <div class="productIcon"></div>
                    <div class="margin-left-1" style="-webkit-box-flex:1;">
                        <div>韩版夏季新款女士学生凉鞋</div>
                        <div>型号：38</div>
                        <div>￥100</div>
                    </div>
                </div>
            </div>
            <div class="ofh padding-top-1 padding-bottom-1 dpb">
                <div class="itemRadio ">
                    <input type="checkbox" value="">
                </div>
                <div class="dpb" style="-webkit-box-flex:1;">
                    <div class="productIcon"></div>
                    <div class="margin-left-1" style="-webkit-box-flex:1;">
                        <div>韩版夏季新款女士学生凉鞋</div>
                        <div>型号：38</div>
                        <div>￥100</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="ptf settlement txr border-top border-color-1 padding-right-1 padding-left-1">
            <span>总计：￥100.00</span>
            <span><button type="button" class="btn btn-danger">结算</button></span>
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