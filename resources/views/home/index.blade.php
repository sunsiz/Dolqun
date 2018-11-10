@extends('layouts.global')
@section('title', 'كىرىش بېتى')
@section('content')
    <div class="row">
        <div class="home-top-area">
            <div class="logo-area">
                <div id="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('./images/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="slider-area">
                <ul>
                    <li><img src="{{ asset('./images/Slam-Dunk.jpg') }}" alt=""></li>
                    <li><img src="{{ asset('./images/12.jpeg') }}" alt=""></li>
                    <li><img src="{{ asset('./images/heizi.jpeg') }}" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="row main-area">
            <div class="col-md-9 col-xs-12 right-area">
                <div class="video-list">
                    <div class="area-title">
                        <h3>يېڭى يوللانغانلار</h3>
                    </div>
                    <ul>
                        @foreach( $posts as  $post)
                        <li>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12 video-img">
                                    <a href="#">
                                        <img src="{{ asset($post->thumb) }}" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="video-content">
                                        <a href="#">
                                            <h3>{{ $post->title }}</h3>
                                        </a>
                                        <div class="video-star">
                                            <span class="color-warning"><i class="fa fa-star"></i></span>
                                            <span class="color-warning"><i class="fa fa-star"></i></span>
                                            <span class="color-warning"><i class="fa fa-star"></i></span>
                                            <span class="color-warning"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span class="video-star">9.0</span>
                                        </div>
                                        <p>{{ $post->description }}</p>
                                        <div class="video-info">
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                {{ Date::parse($post->created_at)->diffForHumans(Date::now()) }}
                                            </span>
                                            <span>
                                                <i class="fa fa-eye"></i>
                                                {{ $post->clicks }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="load-more">
                        <button class="btn btn-outline-primary" style="margin: 0 auto;display: block">تېخىمۇ كۆپ ...</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 left-area">
                <div class="hot-photos-area">
                    <div class="area-title">
                        <h3>ئۇز رەسىم</h3>
                    </div>
                    <div class="hot-photos-list">
                        <div class="photos-list-item">
                            <a href="#">
                                <img src="{{ asset('./images/12.jpeg') }}" alt="" class="img-responsive">
                            </a>
                            <a href="#"><h3>ناروتۇ/火影忍者</h3></a>
                        </div>
                        <div class="photos-list-item">
                            <a href="#">
                                <img src="{{ asset('./images/heizi.jpeg') }}" alt="" class="img-responsive">
                            </a>
                            <a href="#"><h3>كوروكۇنىڭ ۋاسكېتبولى/黑子的篮球</h3></a>
                        </div>
                        <div class="photos-list-item">
                            <a href="#">
                                <img src="{{ asset('./images/yixiu.jpeg') }}" alt="" class="img-responsive">
                            </a>
                            <a href="#"><h3>ناروتۇ/火影忍者</h3></a>
                        </div>
                    </div>
                </div>
                <div class="tags-area">
                    <div class="area-title">
                        <h3>ئاۋات خەتكۈچلەر</h3>
                    </div>
                    <div class="tags-list">
                        <a href="#" class="btn btn-primary"><span>كورۇكۇنىڭ ۋاسكېتبولى</span></a>
                        <a href="#" class="btn btn-warning"><span>ناروتۇ</span></a>
                        <a href="#" class="btn btn-success"><span>ئ‍اۋاتار</span></a>
                        <a href="#" class="btn btn-warning"><span>خەتلىك فىلىم</span></a>
                        <a href="#" class="btn btn-pink"><span>تېخنىكا</span></a>
                        <a href="#" class="btn btn-purple"><span>چۈشۈرۈلمىلەر</span></a>
                        <a href="#" class="btn btn-custom"><span>ئەپ دېتال</span></a>
                        <a href="#" class="btn btn-info"><span>VIP ئەزالىق</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop