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
                    <div class="panel-heading">يازما تېزىملىكى</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>يازما ماۋزۇسى</th>
                                <th>ھالىتى</th>
                                <th>ئاپتور</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $posts as  $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->status==1?'يوللانغان':'ئارگىنال' }}</td>
                                    <td>{{ $post->author }}</td>
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