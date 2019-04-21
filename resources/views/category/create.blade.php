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
                            <li role="presentation"><a href="{{ route('category.index') }}"><i class="fa fa-align-center"></i> سەھىپە باشقۇرۇش</a></li>
                            <li role="presentation" class="active"><a href="{{ route('category.create') }}"><i class="fa fa-plus"></i> يېڭىدىن قوشۇش</a></li>
                        </ul>

                        <form action="{{ route('category.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <select class="form-control" name="parent_id">
                                    <option value="0">== ئانا سەھىپە ==</option>
                                    @foreach($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="كاتىگورىيە نامى" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                                <textarea  class="form-control"  placeholder="ئىزاھات" name="bio" rows="4">{{ old('bio') }}</textarea>
                                @if ($errors->has('bio'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">قوشۇش</button>
                            <a href="{{ route('category.index') }}" class="btn btn-default">تېزىملىككە قايتىش</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop