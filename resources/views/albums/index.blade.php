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
                            <li role="presentation" class="active"><a href="{{ route('album.index') }}"><i class="fa fa-video-camera"></i> فىلغەت بوغچىسى</a></li>
                        </ul>

                        <div class="form-group">
                            <a href="{{ route('album.create') }}" class="btn btn-primary btn-sm">بوغچا قوشۇش</a>
                        </div>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>مۇقاۋا رەسىم</th>
                                <th>ئۇيغۇرچە نامى</th>
                                <th>خەنزۇچە نامى</th>
                                <th>مەشخۇلات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $albums as $album)
                                <tr>
                                    <th>{{ $album->id }}</th>
                                    <th><img src="{{ asset($album->thumb) }}" class="img-rounded" height="60"></th>
                                    <td>
                                        <a href="#">{{ $album->name_ug }}</a>
                                        <br>
                                        <span class="text-muted" style="font-size: 10px;">
                                            يوللانغان ۋاقىت :
                                            {{ Date::parse($album->created_at)->diffForHumans(Date::now()) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="#">{{ $album->name_zh }}</a>
                                    </td>
                                    <th>
                                        <!-- Single button -->
                                        <div class="btn-group">
                                            <a href="{{ route('album.edit', $album->id) }}" class="btn btn-info btn-sm">تەھرىرلەش</a>
                                            <form action="{{ route('album.destroy', $album->id) }}" method="post" style="display: inline">
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
                        {{ $albums->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop