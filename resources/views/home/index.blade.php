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
        <div class="row searchForm">
            <form action="{{ route('search') }}">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn izdesh">ئ‍ىزدەش</button>
                    <input type="hidden" name="type" value="posts" id="searchType">
                    <input type="text" class="" name="keywords"
                           placeholder="ھالقىلىق سۆزنى كىرگۈزۈپ ئىزدەڭ...">
                    <ul class="searchType">
                        <h3><i class="fa fa-arrow-down"></i> <span>مەزمۇن</span></h3>
                        <li data-value="filghetes">فىلغەت</li>
                        <li data-value="photos">رەسىم</li>
                    </ul>
                </div>
            </form>

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
                                        <a href="{{ route('articles.show', $post->id) }}">
                                            <img src="{{ asset($post->thumb) }}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="video-content">
                                            <a href="{{ route('articles.show', $post->id) }}">
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
                        <button class="btn btn-outline-primary" style="margin: 0 auto;display: block">تېخىمۇ كۆپ ...
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 left-area">
                <div class="hot-photos-area">
                    <div class="area-title">
                        <h3>ئۇز رەسىم</h3>
                    </div>
                    <div class="hot-photos-list">

                        @foreach($photos as $photo)
                            <div class="photos-list-item">
                                <a href="{{ route('photos.show', $photo->id) }}">
                                    <img src="{{ asset($photo->thumb) }}" alt="" class="img-responsive">
                                </a>
                                <a href="{{ route('photos.show', $photo->id) }}"><h3>{{ $photo->title }}</h3></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tags-area">
                    <div class="area-title">
                        <h3>يېڭى قوشۇلغان سۆزلۈكلەر </h3>
                    </div>
                    <div class="tags-list">
                        @foreach($filghets as $k=>$filghet)
                            @php
                                $colors = ['btn-primary', 'btn-danger', 'btn-info', 'btn-pink', 'btn-warning', 'btn-success'];
                            @endphp
                            <a href="{{ route('filghetes.show', $filghet->id) }}" class="btn {{$colors[$k]}}">
                                <span>{{ $filghet->ug }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $('.searchType li').on('click', function () {
                var searchType = $(this).attr('data-value');
                var searchText = $(this).text();
                $('.searchType h3 span').text(searchText);
                $('#searchType').attr('value', searchType)
            });
        })
    </script>
@stop