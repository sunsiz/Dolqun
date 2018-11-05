@extends('layouts.global')
@section('title', $user->name.'نىڭ ھويلىسى')
@section('content')
    <div class="col-md-12">
        <div class="row">
            @can('is_admin', $user)
                <div class="col-md-12">
                    <div class="page-header">
                        <h3>سىېستېما باشقۇرۇش مەركىزى</h3>
                    </div>
                </div>
            @endcan
            <div class="col-md-3">
                @include('users.sidebar')
            </div>
            <div class="col-md-9 mt25">
                <div class="bg-white pd-all-25">
                    <div class="page-header">
                        <h3>dwdwdwd</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop