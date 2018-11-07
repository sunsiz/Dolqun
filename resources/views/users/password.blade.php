@extends('layouts.global')
@section('title', 'پارول ئۆزگەرتىش')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                @can('update', $user)
                    @include('users.sidebar')
                @endcan
            </div>
            <div class="col-md-9 mt25">
                <div class="panel panel-default">
                    <div class="panel-heading">پارول ئۆزگەرتىش</div>
                    <div class="panel-body">
                        <form action="{{ route('user.setPassword', $user->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" name="password" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" class="form-control"  placeholder="يېڭى پارول" name="password" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <input type="password" class="form-control"  placeholder="جەزم پارول" name="password_confirmation" value="">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">ساقلاش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop