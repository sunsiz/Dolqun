@extends('layouts.global')
@section('title', 'تېزىملىتىش بېتى')
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3 bg-white br3 pd50" style="margin-top: 60px;">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{ route('register') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <input type="text" class="form-control"  placeholder="ئاكونت" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="ئېلخەت" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" class="form-control"  placeholder="پارول" name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="جەزم پارول" value="{{ old('password_confirmation') }}">
                        </div>
                        <button type="submit" class="btn btn-block btn-rounded btn-outline-primary">تېزىملىتىش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop