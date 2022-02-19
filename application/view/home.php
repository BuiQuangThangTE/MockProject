<!DOCTYPE HTML>
<html>

<head>
    <title>Style Blog a Blogging Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Style Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="applijewelleryion/x-javascript">
         addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />

    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../plugins/bootstrap3-editable-1.5.1/bootstrap3-editable/css/bootstrap-editable.css">
    <script src="../plugins/bootstrap3-editable-1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script src="https://pagination.js.org/dist/2.1.5/pagination.js"></script>



    <!--    -->
    <!--    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
    <!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->


    <script src="../js/script.js"></script>
    <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <!-- animation-effect -->
    <link href="../css/animate.min.css" rel="stylesheet">
    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <script>
        $('#myModal').modal();
    </script>
</head>

<body>
<!-- Begin header -->
<div class="header" id="ban" >
    <div class="container">
        <div class="row">
            <div class="head-left wow fadeInLeft animated animated" data-wow-delay=".5s"
                 style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                <div class="header-search">

                </div>
            </div>
            <div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s"
                 style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav class="link-effect-7" id="link-effect-7">
                            <ul class="nav navbar-nav">
                                <li class="active act cate_home"><a href="#" data-id="home">Home</a></li>
                                <li class="cate"><a href="#" data-id="1">Travel</a></li>
                                <li class="cate"><a href="#" data-id="2">Fashion</a></li>
                                <li class="cate"><a href="#" data-id="3">Music</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated animated"
                 data-wow-delay=".5s"
                 style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                <ul>
                    <li><a href="#"> </a></li>
                    <li><a href="#" class="pin"> </a></li>
                    <li><a href="#" class="in"> </a></li>
                    <li><a href="#" class="be"> </a></li>
                    <li><a href="#" class="vimeo"></a></li>
                </ul>
            </div>
            <div class="login wow fadeInRight animated animated" data-wow-delay=".5s"
                 style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
                <li id="username">
                    <a class='btn button_login' data-toggle='modal' data-target='#myModal'>Login</a>
                </li>
            </div>
        </div>
    </div>
</div>
<!-- form login -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="overlay-loader">
            <div class="loader">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">Login/Registration</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <p class="errorLog" style="color: #990000; text-align: center;"></p>
                                <form role="form" class="form-horizontal" method="post" id="form_login">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label">
                                            Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="usernameLog"
                                                   placeholder="Email" name="username" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="passwordLog"
                                                   name="password" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Login
                                            </button>
                                            <a href="/reset">Quên mật khẩu</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <p class="error" style="color: #990000; text-align: center;"></p>
                                <form role="form" class="form-horizontal">

                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label">
                                            Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="namerg"
                                                   placeholder="Username" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">
                                            Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="emailrg"
                                                   placeholder="Email" name="emailrg" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="passwordrg"
                                                   placeholder="Password" name="passwordrg" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="register()">
                                                Register
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Header -->

<!--Bắt đầu Nội dung -->

<div class="main">
    <!-- Tat cả bài viet -->
    <div id="listBlog">
        <div class="col-md-9 blog-left">
            <div class="tech-no" id="list_blog" style="width:auto">
                <!-- det Bài viết-->
            </div>
        </div>

        <!-- Bài viết phổ biến -->
        <div class="col-md-3 blog-right">
            <div class="blo-top1">
                <div class="tech-btm">
                    <div class="search-1 wow fadeInDown animated" id="search_home" data-wow-duration=".8s"
                         data-wow-delay=".2s"
                         style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInDown;">
                        <form>
                            <input id="search" type="search" name="Search" required="" placeholder="Search">
                        </form>
                    </div>
                    <div class="results_search">
                        <ul id="results_search"></ul>
                    </div>
                    <h4>Bài viết phổ biến</h4>
                    <div class="blog-grids">
                        <div class="blog-grids" id="popular_blog">
                            <!-- post ppho bien -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
    </div>
    <!-- Chi tiết bài viet -->
    <div class="detail_blogs" id="">
        <div class="detail_blogs">
            <div class="col-md-9 technology-left">
                <div class="agileinfo" id="detail_blog">
                    <!-- chi tiet tại đây -->
                </div>
            </div>
            <!--Bài viết liên quan -->
            <!-- <div class="col-md-3 technology-right" id="box-right">
                <div class="blo-top1">
                    <div class="tech-btm">
                        <div class="search-1">
                            <form action="#" method="post">
                                <input type="search" name="Search" value="Search" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Search';}" required="">
                                <input type="submit" value=" ">
                            </form>
                        </div>
                        <h4>Bài viết liên quan </h4>
                        <div class="blog-grids" id="lienQuan">

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div> -->
        </div>
    </div>
    <div id ="main_blog">

    </div>
</div>






<!-- Begin Footer -->
<!-- <div class="footer" ">
<div class="container">

<div class="col-md-4 footer-middle wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
<h4>Latest Tweet</h4>
<div class="mid-btm">
    <p>Sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
    <a href="https://w3layouts.com/">https://w3layouts.com/</a>
</div>
</div>
<div class="col-md-4 footer-right wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
<h4>Newsletter</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>

<div class="clearfix"></div>

</div>
<div class="clearfix"></div>
</div>
</div>
<div class="copyright wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s" style="">
<div class="container" style="height: auto;">
<p>© Style Blog. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
</div>
</div> -->
<!-- End Footer -->

<style>
    .overlay-loader {
        display: none;
        margin: auto;
        width: 97px;
        height: 97px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }
    div#ban {
        position: fixed;
        margin: -top;
        margin-top: 0px;
        z-index: 99;
        width: 100%;
    }
    .modal-content {
        z-index: 999px;
    }
    .tech-btm {
        padding: 2em 2em;
        padding-top: 2em;
        padding-right: 2em;
        padding-bottom: 2em;
        padding-left: 2em;
        background: #f5f5f5;
        position: fixed;
    }

    .loader {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        width: 97px;
        height: 97px;
        animation-name: rotateAnim;
        -o-animation-name: rotateAnim;
        -ms-animation-name: rotateAnim;
        -webkit-animation-name: rotateAnim;
        -moz-animation-name: rotateAnim;
        animation-duration: 0.4s;
        -o-animation-duration: 0.4s;
        -ms-animation-duration: 0.4s;
        -webkit-animation-duration: 0.4s;
        -moz-animation-duration: 0.4s;
        animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
        -ms-animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        animation-timing-function: linear;
        -o-animation-timing-function: linear;
        -ms-animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
    }

    .loader div {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        border: 1px solid rgb(0, 0, 0);
        position: absolute;
        top: 2px;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }

    .loader div:nth-child(odd) {
        border-top: none;
        border-left: none;
    }

    .loader div:nth-child(even) {
        border-bottom: none;
        border-right: none;
    }

    .loader div:nth-child(2) {
        border-width: 2px;
        left: 0px;
        top: -4px;
        width: 12px;
        height: 12px;
    }

    .loader div:nth-child(3) {
        border-width: 2px;
        left: -1px;
        top: 3px;
        width: 18px;
        height: 18px;
    }

    .loader div:nth-child(4) {
        border-width: 3px;
        left: -1px;
        top: -4px;
        width: 23px;
        height: 23px;
    }

    .loader div:nth-child(5) {
        border-width: 3px;
        left: -1px;
        top: 4px;
        width: 31px;
        height: 31px;
    }

    .loader div:nth-child(6) {
        border-width: 4px;
        left: 0px;
        top: -4px;
        width: 39px;
        height: 39px;
    }

    .loader div:nth-child(7) {
        border-width: 4px;
        left: 0px;
        top: 6px;
        width: 49px;
        height: 49px;
    }


    @keyframes rotateAnim {
        from {
            transform: rotate(360deg);
        }

        to {
            transform: rotate(0deg);
        }
    }

    @-o-keyframes rotateAnim {
        from {
            -o-transform: rotate(360deg);
        }

        to {
            -o-transform: rotate(0deg);
        }
    }

    @-ms-keyframes rotateAnim {
        from {
            -ms-transform: rotate(360deg);
        }

        to {
            -ms-transform: rotate(0deg);
        }
    }

    @-webkit-keyframes rotateAnim {
        from {
            -webkit-transform: rotate(360deg);
        }

        to {
            -webkit-transform: rotate(0deg);
        }
    }

    @-moz-keyframes rotateAnim {
        from {
            -moz-transform: rotate(360deg);
        }

        to {
            -moz-transform: rotate(0deg);
        }
    }
</style>
</body>