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
                            <li role="presentation" class="active"><a href="{{ route('filghetes.create') }}"><i class="fa fa-language"></i> فىلغەت</a></li>
                            <li role="presentation"><a href="{{ route('qamus.create') }}" ><i class="fa fa-globe"></i> قامۇس</a></li>
                            <li role="presentation"><a href="{{ route('photos.create') }}"><i class="fa fa-image"></i> رەسىم</a></li>
                        </ul>

                        <form action="{{ route('filghetes.update', $filghet->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $filghet->id }}">
                            <div class="form-group {{ $errors->has('ug') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="ئۇيغۇرچە ئاتىلىشى" name="ug" value="{{ $filghet->ug }}">
                                @if ($errors->has('ug'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('ug') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('zh') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="خەنچە ئاتىلىشى" name="zh" value="{{ $filghet->zh }}">
                                @if ($errors->has('zh'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('zh') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('other') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="باشقا ئاتىلىشى" name="other" value="{{ $filghet->other }}">
                                @if ($errors->has('other'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('other') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <textarea  class="form-control"  placeholder="ئىزاھات" name="description" rows="4">{{ $filghet->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">ساقلاش</button>
                            <a href="{{ route('filghetes.index') }}" class="btn btn-default">تېزىملىككە قايتىش</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop