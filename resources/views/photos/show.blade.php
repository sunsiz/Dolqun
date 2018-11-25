@extends('layouts.global')
@section('title', $photo->title)
@section('content')
    <div class="col-md-3">
        @include('users.user-card', ['user' => $photo->user])
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading tac" style="border-bottom: none;">
                <h3 class="mt25">{{ $photo->title }}</h3>
            </div>
            <div class="panel-body post-body">
                {!! $photo->body !!}
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