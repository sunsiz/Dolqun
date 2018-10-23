<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-3.3.7/css/bootstrap-rtl.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @auth()
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="#">كىرىش</a></li>
                        <li><a href="#">تېزىملىتىش</a></li>
                    @endauth
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="home-top-area">
            <div class="logo-area">
                <div id="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('./images/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="slider-area">
                <img src="{{ asset('./images/Slam-Dunk.jpg') }}" alt="">
            </div>
        </div>
        <div class="row main-area">
            <div class="col-md-9 right-area">
                <div class="video-list">
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col-md-3 video-img">
                                    <a href="#">
                                        <img src="{{ asset('./images/Slam-Dunk.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <a href="#">
                                        <h3>نارۇتو Naruto/火影忍者 </h3>
                                    </a>
                                    <div class="video-star">
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span class="video-star">9.0</span>
                                    </div>
                                    <p>
                                        بۇيىل 3- ئايدا Let's Encrypt ئورگان تەرەپ كۆپ دەرىجىلىك تورنامى (泛域名) گە بولغان قوللاشنى ئېلان قىلدى . دىمەك شۇنىڭدىن كىيىن بىرلا SSL ئىجازەتنامىسىنى كۆپ قاتلاملىق تور نامىغا قوللىنىش شىرىن ئارزۇيىمىز ئەمەلگە ئاشتى .
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3 video-img">
                                    <a href="#">
                                        <img src="{{ asset('./images/2.jpeg') }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <a href="#">
                                        <h3>نارۇتو Naruto/火影忍者 </h3>
                                    </a>
                                    <div class="video-star">
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span class="video-star">9.0</span>
                                    </div>
                                    <p>
                                        بۇيىل 3- ئايدا Let's Encrypt ئورگان تەرەپ كۆپ دەرىجىلىك تورنامى (泛域名) گە بولغان قوللاشنى ئېلان قىلدى . دىمەك شۇنىڭدىن كىيىن بىرلا SSL ئىجازەتنامىسىنى كۆپ قاتلاملىق تور نامىغا قوللىنىش شىرىن ئارزۇيىمىز ئەمەلگە ئاشتى .
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3 video-img">
                                    <a href="#">
                                        <img src="{{ asset('./images/1.jpeg') }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <a href="#">
                                        <h3>نارۇتو Naruto/火影忍者 </h3>
                                    </a>
                                    <div class="video-star">
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span class="video-star">9.0</span>
                                    </div>
                                    <p>
                                        بۇيىل 3- ئايدا Let's Encrypt ئورگان تەرەپ كۆپ دەرىجىلىك تورنامى (泛域名) گە بولغان قوللاشنى ئېلان قىلدى . دىمەك شۇنىڭدىن كىيىن بىرلا SSL ئىجازەتنامىسىنى كۆپ قاتلاملىق تور نامىغا قوللىنىش شىرىن ئارزۇيىمىز ئەمەلگە ئاشتى .
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3 video-img">
                                    <a href="#">
                                        <img src="{{ asset('./images/3.jpeg') }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-9">
                                    <a href="#">
                                        <h3>نارۇتو Naruto/火影忍者 </h3>
                                    </a>
                                    <div class="video-star">
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span class="color-warning"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span class="video-star">9.0</span>
                                    </div>
                                    <p>
                                        بۇيىل 3- ئايدا Let's Encrypt ئورگان تەرەپ كۆپ دەرىجىلىك تورنامى (泛域名) گە بولغان قوللاشنى ئېلان قىلدى . دىمەك شۇنىڭدىن كىيىن بىرلا SSL ئىجازەتنامىسىنى كۆپ قاتلاملىق تور نامىغا قوللىنىش شىرىن ئارزۇيىمىز ئەمەلگە ئاشتى .
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 left-area">
                grgr
            </div>
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>