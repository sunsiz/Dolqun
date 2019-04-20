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
                            <li role="presentation" class="active"><a href="{{ route('category.index') }}"><i class="fa fa-align-center"></i> كاتىگورىيە باشقۇرۇش</a></li>
                            <li role="presentation"><a href="{{ route('category.create') }}"><i class="fa fa-plus"></i> يېڭىدىن قوشۇش</a></li>
                        </ul>

                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Bio</th>
                                <th>مەشخۇلات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $categorys as  $category)
                                <tr>
                                    <th>{{ $category->id }}</th>
                                    <td> {{ $category->name }}</td>
                                    <td> {{ $category->bio }}</td>
                                    <th>
                                        <!-- Single button -->
                                        <div class="btn-group">
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">تەھرىرلەش</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline">
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
                        {{ $categorys->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop