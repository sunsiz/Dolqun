<!DOCTYPE html>
<html>
<head>
    <title>ئەپ چۈشۈرۈش بېتى</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/uyghur-font/oyghan-font.css') }}">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        body {
            background:url('images/down/bg.jpeg');
            -moz-background-size:100% 100%;
            background-size:100% 100%;
            background-attachment: fixed
        }
        #logo {
            display: block;
            height: 180px;
            width: 180px;
            position: absolute;
            left: 50%;
            margin-left: -90px;
            top: 50%;
            margin-top: -90px;
        }
        #logo img{
            width: 100%;
            height: 100%;
        }

        #logo a {
            display: block;
            height: 40px;
            line-height: 40px;
            width: 80px;
            padding: 0 10px;
            text-align: center;
            background-color: #2d8cf0;
            color: #fff;
            margin:20px auto;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div id="logo">
    <img src="{{ asset('images/down/logo.png') }}">
    <a href="javascript:;">چۈشۈرۈش</a>
</div>
</body>

<script type="text/javascript">

    $(function () {


        $('#logo a').on('click', function() {

            var ua = navigator.userAgent.toLowerCase();


            if (ua.match(/MicroMessenger/i) == "micromessenger") {
                alert('تور كۆرگۈچتە زىيارەت قىلىپ چۈشۈرۈڭ')
            }else {
                window.location.href="http://app.dolqun.net/dolqunv103.apk";
            }
        })

    })

</script>
</html>