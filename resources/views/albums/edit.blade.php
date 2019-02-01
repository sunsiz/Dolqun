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
                            <li role="presentation"><a href="{{ route('photos.create') }}"><i class="fa fa-image"></i> رەسىم</a></li>
                            <li role="presentation"  class="active"><a href="{{ route('album.index') }}"><i class="fa fa-video-camera"></i> فىلغەت بوغچىسى</a></li>
                        </ul>

                        <form action="{{ route('album.update', $album->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('name_ug') ? 'has-error' : '' }}">
                                        <input type="text" class="form-control"  placeholder="ئۇيغۇرچە نامى (چوقۇم يازىسىز)" name="name_ug" value="{{ $album->name_ug }}">
                                        @if ($errors->has('name_ug'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('name_ug') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('name_zh') ? 'has-error' : '' }}">
                                        <input type="text" class="form-control"  placeholder="خەنزۇچە نامى (چوقۇم يازىسىز)" name="name_zh" value="{{ $album->name_zh }}">
                                        @if ($errors->has('name_zh'))
                                            <span class="text-danger">
                                        <strong>{{ $errors->first('name_zh') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                                <textarea id="container" name="bio" class="form-control" placeholder="بوغچا ئىزاھاتى (يازمىسىڭىزمۇ بولىدۇ)"> {{ $album->bio }}</textarea>
                            </div>

                            <div class="form-group">
                                <photo avatar="{{ $album->thumb }}"></photo>
                            </div>

                            <button type="submit" class="btn btn-primary">ساقلاش</button>
                            <a href="{{ route('album.index') }}" class="btn btn-default">تېزىملىككە قايتىش</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop