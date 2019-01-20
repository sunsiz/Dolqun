@extends('layouts.global')
@section('title', 'كىرىش بېتى')
@section('content')
    <div class="row searchForm">
        <form action="{{ route('search') }}">
            <div class="col-md-6 col-xs-10 col-md-offset-3 col-xs-offset-1">
                <button type="submit" class="btn izdesh">ئ‍ىزدەش</button>
                <input type="hidden" name="type" value="posts" id="searchType">
                <input type="text" class="" name="keywords"
                       placeholder="ھالقىلىق سۆزنى كىرگۈزۈڭ...">
                <ul class="searchType">
                    <h3><i class="fa fa-angle-down"></i> <span>مەزمۇن</span></h3>
                    <li data-value="posts" style="height: 20px;line-height: 20px;font-size: 12px;">مەزمۇن</li>
                    <li data-value="filghetes" style="height: 20px;line-height: 20px;font-size: 12px;">فىلغەت</li>
                    <li data-value="photos" style="height: 20px;line-height: 20px;font-size: 12px;">رەسىم</li>
                </ul>
            </div>
        </form>

    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="container-fluid" style="padding-right: 15px;padding-left: 15px;">
                <div class="area-title hidden-xs hidden-sm">
                    <h3>يېڭى يازمىلار</h3>
                </div>
                <div class="hidden-xs">
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
                    @if(count($posts) >=10)
                        <div class="col-md-12" style="text-align: center;margin-bottom: 30px;">
                            <a href="{{ route('post.list') }}" class="btn btn-outline-primary">تېخىمۇ كۆپ
                                يازمىلار</a>
                        </div>
                    @endif
                </div>
                <div class="hidden-lg hidden-md hidden-sm">
                    @foreach( $posts as  $k=>$post)
                        @if($k >= 3)
                            @break
                        @endif
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
                    @if(count($posts) >=3)
                        <div class="col-md-12" style="text-align: center;margin-bottom: 30px;">
                            <a href="{{ route('post.list') }}" class="btn btn-outline-primary">تېخىمۇ كۆپ
                                يازمىلار</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 left-area">
            <div class="container-fluid" style="padding-right: 15px;padding-left: 15px;">
                <div class="row">
                    <div class="lf-filghet" style="margin-bottom: 20px;overflow: hidden;">

                        <div class="col-md-12 area-title hidden-sm hidden-xs">
                            <h3>يېڭى سۆزلۈك </h3>
                        </div>

                        <div class="col-md-12 tags-list">
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

                    <div class="col-md-12 hidden-sm hidden-xs area-title">
                        <h3>ئۇز رەسىم </h3>
                    </div>
                    <div class="hidden-xs">
                        @foreach($photos as $photo)
                            <div class="col-md-6">
                                <div class="photos-list-item">
                                    <a href="{{ route('photos.show', $photo->id) }}">
                                        <img src="{{ asset($photo->thumb) }}" alt="" class="img-responsive">
                                    </a>
                                    <a href="{{ route('photos.show', $photo->id) }}"><h3>{{ $photo->title }}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @if(count($photos) >=4)
                            <div class="col-md-12" style="text-align: center;margin-bottom: 30px;">
                                <a href="{{ route('photo.list') }}" class="btn btn-outline-primary">تېخىمۇ كۆپ
                                    رەسىملەر</a>
                            </div>
                        @endif
                    </div>
                    <div class="hidden-lg hidden-md hidden-sm">
                        @foreach($photos as $k=>$photo)
                            @if($k >= 4)
                                @break
                            @endif
                            <div class="col-md-6">
                                <div class="photos-list-item">
                                    <a href="{{ route('photos.show', $photo->id) }}">
                                        <img src="{{ asset($photo->thumb) }}" alt="" class="img-responsive">
                                    </a>
                                    <a href="{{ route('photos.show', $photo->id) }}"><h3>{{ $photo->title }}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @if(count($photos) >=4)
                            <div class="col-md-12" style="text-align: center;margin-bottom: 30px;">
                                <a href="{{ route('photo.list') }}" class="btn btn-outline-primary">تېخىمۇ كۆپ
                                    رەسىملەر</a>
                            </div>
                        @endif
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
                $('#searchType').attr('value', searchType);
                $('#searchType').hide();
            });
        })
    </script>
@stop