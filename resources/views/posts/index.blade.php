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
                                <th>مەشخۇلات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $posts as  $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->status==1?'يوللانغان':'ئارگىنال' }}</td>
                                    <td>{{ $post->author }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">تەھرىرلەش</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger btn-sm" type="submit">ئ‍ۆچۈرۈش</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{  $posts->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop