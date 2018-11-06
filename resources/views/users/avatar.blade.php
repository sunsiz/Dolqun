@extends('layouts.global')
@section('title', 'باش رەسىم ئۆزگەرتىش')
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
                    <div class="panel-heading">باش رەسىم ئۆزگەرتىش</div>
                    <div class="panel-body">
                        <user-avatar avatar="{{ asset(Auth::user()->avatar) }}"></user-avatar>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
