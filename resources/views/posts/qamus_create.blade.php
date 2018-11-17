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
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="{{ route('posts.create') }}">ئادەتتىكى مەزمۇن</a></li>
                        <li role="presentation" class="active"><a href="{{ route('qamus.create') }}" >قامۇس</a></li>
                        <li role="presentation"><a href="{{ route('filghetes.create') }}">فىلغەت</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">رەسىم</a></li>
                    </ul>
                    <div class="panel-body">
                        <form action="{{ route('articles.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="ماۋزۇ (چوقۇم يازىسىز)" name="title">
                                @if ($errors->has('title'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{--<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">--}}
                                {{--<thumb avatar="{{ asset(Auth::user()->avatar) }}"></thumb>--}}
                            {{--</div>--}}

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <textarea  class="form-control"  placeholder="يازما قىسقىچە مەزمۇنى" name="description" rows="4"></textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox1" value="1" name="status" checked> بىۋاستە يوللاش
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox2" value="0" name="status"> ئارگىنال ساقلاش
                                </label>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-primary">ساقلاش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop