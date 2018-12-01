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
    {{--@include('layouts/navbar')--}}
    <div class="container-fluid lf-header">
        {{--<img src="{{ asset('images/logo-background.png') }}" alt="">--}}
        <div class="container p-logo">
            <div class="row">
                <div class="col-md-4" style="padding-top: 20px;">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    @auth()
                        <div class="hasLogin">
                            ياخشىمۇسىز!
                            <a href="{{ route('user.edit', Auth::user()->id) }}" style="color: #fff;line-height: 100%;">
                                {{ Auth::user()->name }}
                            </a>
                            <a href="{{ route('logout') }}"> [ بېخەتەر چىكىنىش ]</a>
                        </div>
                    @else
                        <div class="noLogin">
                            <a href="{{ route('login') }}">[ كىرىش ]</a> |
                            <a href="{{ route('register') }}">[ تېزىملىتىش ]</a>
                        </div>

                    @endauth
                </div>
            </div>
        </div>
    </div>
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