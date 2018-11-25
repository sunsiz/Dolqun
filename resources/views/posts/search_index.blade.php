@extends('layouts.global')
@section('title', 'يازما يوللاش')
@include('vendor.ueditor.assets')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="page-header">
                <h3>
                    <span>ھالقىلىق سۆز</span>
                    <span class="text-pink">{{ $keywords }}</span>
                </h3>
            </div>
            <div class="video-list">
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
    </div>
@stop