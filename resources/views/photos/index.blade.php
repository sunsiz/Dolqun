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

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>THUMB</th>
                                <th>يازما ماۋزۇسى</th>
                                <th>مەشخۇلات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $photos as  $photo)
                                <tr>
                                    <th>{{ $photo->id }}</th>
                                    <th><img src="{{ asset($photo->thumb) }}" class="img-rounded" height="60"></th>
                                    <td>
                                        <a href="{{ route('photos.show', $photo->id) }}">{{ $photo->title }}</a>
                                        <br>
                                        <span class="text-muted" style="font-size: 10px;">
                                            يوللانغان ۋاقىت
                                            {{ Date::parse($photo->created_at)->diffForHumans(Date::now()) }}
                                        </span>
                                    </td>
                                    <th>
                                        <!-- Single button -->
                                        <div class="btn-group">
                                            <a href="" class="btn btn-info btn-sm">تەھرىرلەش</a>
                                            <form action="{{ route('photos.destroy', $photo->id) }}" method="post" style="display: inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger btn-sm" type="submit">ئ‍ۆچۈرۈش</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop