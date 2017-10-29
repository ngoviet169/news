<!DOCTYPE html>
<html>
<head>
    <title>TechNews | 404</title>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<header id="header">
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            @include('layout.header')
            <div class="search"><a class="search_icon" href="#"><i class="fa fa-search"></i></a>
                <form action="#">
                    <input class="search_bar" type="text" placeholder="Search here">
                </form>
            </div>
        </div>
    </nav>
</header>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                {{--<div class="topadd_bar"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-sm-12">
                <div class="error_page"><img class="wow shake" src="images/error-img.png" alt="">
                    <p><span>Ohh.....</span>Your Requested Page Could Not Be Found!</p>
                    <button id="back"><a>Back</a></button>
                    <div class="erropr_recentpost">
                        <h2><a href="#">Recent Post</a></h2>
                        <ul class="ppost_nav wow fadeInDown">
                            <li>
                                <div class="media"><a href="single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                    <div class="media-body"><a href="single_page.html" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><a href="single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                    <div class="media-body"><a href="#" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><a href="single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                    <div class="media-body"><a href="#" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm3">
                    <div class="footer_widget wow fadeInLeftBig">
                        <h2>Labels</h2>
                        <ul class="labels_nav">
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Slider</a></li>
                            <li><a href="#">Life &amp; Style</a></li>
                            <li><a href="#">Ver</a></li>
                            <li><a href="#">Sports</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm3">
                    <div class="footer_widget">
                        <h2>Popular Post</h2>
                        <ul class="ppost_nav wow fadeInLeftBig">
                            <li>
                                <div class="media"><a href="single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                    <div class="media-body"><a href="single_page.html" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><a href="single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                    <div class="media-body"><a href="#" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><a href="single_page.html" class="media-left"><img alt="" src="../images/70x70.jpg"></a>
                                    <div class="media-body"><a href="#" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm3">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Flickr Images</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm3">
                    <div class="footer_widget wow fadeInRightBig">
                        <h2>Jetpack Subscription Widget</h2>
                        <form action="#" class="subscribe_form">
                            <p id="subscribe-text">We promise, we will only send you awesome stuff which will make your day!</p>
                            <p id="subscribe-email">
                                <input type="text" placeholder="Email Address" name="email">
                            </p>
                            <p id="subscribe-submit">
                                <input type="submit" value="Submit">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <p class="copyright">Copyright &copy; 2045 <a href="../index.html">Cyber Tech</a></p>
            <p class="developer">Developed By Wpfreeware</p>
        </div>
    </div>
</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
<script>
    $(document).ready(function() {
        $('#back').click(function () {
            window.history.back();
        });
    });
</script>
</html>