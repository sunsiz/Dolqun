<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Dolqun|دولقۇن تەرجىمىلىرى</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap-3.3.7/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-3.3.7/css/bootstrap-rtl.css') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script>
        @if(Auth::check())
            window.LEARNFANS = {
            name:"{{Auth::user()->name}}",
            avatar:"{{Auth::user()->avatar}}",
            token:"{{ csrf_token() }}"
        }
        @endif
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('./images/logo-icon.png') }}" alt="">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home') }}"> باشبەت<span class="sr-only">(current)</span></a>
                    </li>
                    {{--<li><a href="#">قامۇس</a></li>--}}
                    {{--<li><a href="#">فىلغەت</a></li>--}}

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @auth()
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false" data-hover="dropdown">
                                {{ Auth::user()->name }}
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="img-circle" height="18">
                            </a>
                            <ul class="dropdown-menu">
                                {{--@can('is_admin', $user)--}}
                                    {{--<li><a href="{{ route('user.show', Auth::user()->id) }}"><i class="fa fa-cog"></i> سىستېما باشقۇرۇش</a></li>--}}
                                {{--@endcan--}}
                                <li><a href="{{ route('user.edit', Auth::user()->id) }}"><i class="fa fa-edit"></i> ئ‍اكونت تەڭشىكى</a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> بېخەتەر چىكىنىش</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">كىرىش</a></li>
                        <li><a href="{{ route('register') }}">تېزىملىتىش</a></li>
                    @endauth
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row" style="padding-top:60px;">
            <div class="col-md-12">
                @include('layouts.messages')
            </div>
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>