@extends('layouts.global')
@section('title', 'يازما يوللاش')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="container-fluid" style="padding-right: 15px;padding-left: 15px;">
                    <div class="area-title hidden-xs hidden-sm">
                        <h3>بارلىق يازمىلار</h3>
                    </div>
                    @foreach( $posts as  $post)
                        <div class="row info-content">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <a href="{{ route('articles.show', $post->id) }}">
                                    <img src="{{ asset($post->thumb) }}" class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <h4><a href="{{ route('articles.show', $post->id) }}">{{ $post->title }}</a></h4>
                                <p class="hidden-xs">
                                    {{ $post->description }}
                                </p>
                                <div class="content-status">
                                    <span><i class="fa fa-clock-o"></i>&nbsp;{{ Date::parse($post->updated_at)->diffForHumans(Date::now()) }}</span>
                                    <span><i class="fa fa-eye"></i>&nbsp;{{ $post->clicks }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12">
                        {{ $posts->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop