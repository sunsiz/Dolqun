@extends('layouts.global')
@section('title', 'كىرىش بېتى')
@section('content')
    <div class="col-md-6 col-md-offset-3 bg-white pd50 br3" style="margin-top: 60px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ئاكونت" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="پارول" name="password">
                        @if ($errors->has('password'))
                            <span class="text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group checkbox">
                        <label class="text-muted">
                            <input type="checkbox" name="remember">ئەستە ساقلىسۇن &nbsp;
                        </label>
                        {{--<a href="{{ route('password.request') }}" class="text-custom">پارولنى ئۇنتۇدۇم</a>--}}
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-rounded btn-block">كىرىش</button>
                </form>
            </div>
        </div>
    </div>
@stop