@extends('layouts.global')
@section('title', 'يازما يوللاش')
@include('vendor.ueditor.assets')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                @can('update', Auth::user())
                    @include('users.sidebar', ['user' => Auth::user()])
                @endcan
            </div>
            <div class="col-md-9 mt25">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="{{ route('posts.create') }}"><i class="fa fa-align-center"></i> مەزمۇن</a></li>
                            <li role="presentation"><a href="{{ route('filghetes.create') }}"><i class="fa fa-language"></i> فىلغەت</a></li>
                            <li role="presentation"><a href="{{ route('qamus.create') }}" ><i class="fa fa-globe"></i> قامۇس</a></li>
                            <li role="presentation" class="active"><a href="{{ route('photos.create') }}"><i class="fa fa-image"></i> رەسىم</a></li>
                        </ul>

                        <form action="{{ route('photos.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="ماۋزۇ (چوقۇم يازىسىز)" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox1" value="1" name="type" checked>  تەگلىك
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox2" value="2" name="type"> سىزما
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox3" value="3" name="type"> كوسپىلاي
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox4" value="4" name="type">باش سۈرەت
                                </label>
                            </div>

                            <div class="form-group">
                                <photo avatar=""></photo>
                            </div>

                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                <textarea id="container" name="body" type="text/plain"> {{ old('body') }}</textarea>
                                @if ($errors->has('body'))
                                    <span class="text-danger">
                                            <strong>{{ $errors->first('body') }}</strong>
                                         </span>
                                @endif
                            </div>

                            <script>
                                var ue = UE.getEditor('container');

                                ue.ready(function() {
                                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                                });
                            </script>
                            <button type="submit" class="btn btn-primary">ساقلاش</button>
                            <a href="{{ route('photos.index') }}" class="btn btn-default">تېزىملىككە قايتىش</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop