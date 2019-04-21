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
                            <li role="presentation" class="active"><a href=""><i class="fa fa-edit"></i> تەھرىرلەش </a></li>
                        </ul>

                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <select class="form-control" name="parent_id">
                                    <option value="0">== ئانا سەھىپە ==</option>
                                    @foreach($categorys as $item)
                                        <option value="{{ $item->id }}"
                                            @if($category->parent_id == $item->id)
                                                selected
                                            @endif
                                        >
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" class="form-control"  placeholder="كاتىگورىيە نامى" name="name" value="{{ $category->name }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
                                <textarea  class="form-control"  placeholder="ئىزاھات" name="bio" rows="4">{{ $category->bio }}</textarea>
                                @if ($errors->has('bio'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('bio') }}</strong>
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