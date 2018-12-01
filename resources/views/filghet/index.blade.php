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

                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>ئۇيغۇرچە</th>
                                <th>خەنزۇچە</th>
                                <th>مەشخۇلات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $filghetes as  $filghete)
                                <tr>
                                    <th>{{ $filghete->id }}</th>
                                    <td>
                                        <a href="{{ route('filghetes.show', $filghete->id) }}">{{ $filghete->ug }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('filghetes.show', $filghete->id) }}">{{ $filghete->zh }}</a>
                                    </td>
                                    <th>
                                        <!-- Single button -->
                                        <div class="btn-group">
                                            <a href="{{ route('filghetes.edit', $filghete->id) }}" class="btn btn-info btn-sm">تەھرىرلەش</a>
                                            <form action="{{ route('filghetes.destroy', $filghete->id) }}" method="post" style="display: inline">
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
                        {{ $filghetes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop