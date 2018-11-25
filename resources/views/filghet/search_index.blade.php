@extends('layouts.global')
@section('title', 'يازما يوللاش')
@include('vendor.ueditor.assets')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="page-header">
                <h3>
                    <span>ھالقىلىق سۆز</span>
                    <span class="text-pink">{{ $keywords }}</span>
                </h3>
            </div>

            <div class="word-list">
                @foreach($filghets as $filghet)
                    <div class="word-item">
                        <h3> {{ $filghet->ug }}</h3>
                        <h4> {{ $filghet->zh }}</h4>
                        <h5> {{ $filghet->other }}</h5>
                        <p>
                            {{ $filghet->description }}
                        </p>
                    </div>
                 @endforeach
            </div>
        </div>
    </div>
@stop