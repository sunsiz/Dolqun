@extends('layouts.global')
@section('title', 'ئارخىب تەھرىرلەش')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                @include('users.sidebar')
            </div>
            <div class="col-md-9 mt25">
                <div class="panel panel-default">
                    <div class="panel-heading">ئارخىب تەھرىرلەش</div>
                    <div class="panel-body">
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="ئاكونت" name="name" value="{{ $user->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox1" value="male" name="sex"
                                           @if($user->sex == 'male')
                                           checked
                                            @endif
                                    > ئاق ئاتلىق شاھزادە
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" id="inlineCheckbox2" value="female" name="sex"
                                           @if($user->sex == 'female')
                                           checked
                                            @endif
                                    > ساھىبجامال
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                            <button type="submit" class="btn btn-success">ساقلاش</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
