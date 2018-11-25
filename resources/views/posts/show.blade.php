@extends('layouts.global')
@section('title', $post->title)
@section('content')
    <div class="col-md-3">
        @include('users.user-card', ['user' => $post->user])
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading tac" style="border-bottom: none;">
                <h3 class="mt25">{{ $post->title }}</h3>
            </div>
            <div class="panel-body post-body">
                {!! $post->body !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="post-likes-statics bg-white br3">
                    {{--@auth--}}
                        {{--<like-post post_id="{{ $post->id }}"></like-post>--}}
                    {{--@endauth--}}

                    {{--@if($post->likers->count())--}}
                            {{--<div class="post-likers">--}}
                                {{--<div class="text-muted" style="margin-bottom: 15px;"> {{ $post->likers->count() }}ئەزا بۇ تېمىنى ياقتۇردى  </div>--}}
                                {{--@foreach($post->likers as $liker)--}}
                                    {{--<a href="{{ route('user.show', $liker->user_id) }}">--}}
                                        {{--<img src="{{ $liker->avatar }}" alt="{{ $liker->name }}" class="img-responsive img-circle" data-toggle="tooltip" data-placement="bottom" title="{{ $liker->name }}">--}}
                                    {{--</a>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                   {{--@endif--}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {{--<h4 class="text-muted"> جەمئىي {{ $post->allComments->count() }} ئىنكاس يېزىلدى</h4>--}}
                </div>
                @auth()
                    <div class="alert alert-warning alert-dismissible" role="alert" style="text-align: justify;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>ئۇيغۇرچە كىرگۈزۈش كۆرسەتمىسى</strong> <br>
                        بېكىتىمىز ئۇيغۇرچە كىرگۈزۈش ئۈچۈن قارلۇق شىركىتىدىن ئادىلجان ياسىن مۇئەللىم ياساپ چىققان Qarluq.UIME.js ئىشلىتىلگەن بولۇپ.
                        MAC OS سىستىمىسىدا Control ياكى
                        Windows سىستىمىسىدا Ctrl كۇنۇپكىسى ئارقىلق تىل ئالماشتۇرۇشقا بولىدۇ .
                    </div>
                {{--<form action="{{ route('posts.comment', $post->id) }}" method="post">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">--}}
                        {{--<textarea  class="form-control"  placeholder="بىر ئىككى جۈملە ئىنكاس يېزىپ باقمامسىز ..." name="body" rows="6"></textarea>--}}
                        {{--@if ($errors->has('body'))--}}
                            {{--<span class="text-danger">--}}
                            {{--<strong>{{ $errors->first('body') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<button type="submit" class="btn btn-outline-custom">يوللاش</button>--}}
                {{--</form>--}}
                    @else
                    <div class="alert alert-warning alert-dismissible tac pd25" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        بىكەتكە كىرگەندىن كىيىن ئىنكاس يازالايسىز . <a href="{{ route('login') }}"> ھازىرلا كىرەي</a>
                    </div>
                @endauth
            </div>
            <div class="col-md-12">
                {{--@include('comments.list')--}}
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript" src="{{asset('highlight/highlight.pack.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.post-body pre, .post-body code').each(function(i, block) {
                hljs.highlightBlock(block);
            });
            //编辑器的内的图片改为响应式图片类型
            $('.post-body img').addClass('img-responsive');
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop