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

            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-md-4">
                        <div class="photos-list-item">
                            <a href="{{ route('photos.show', $photo->id) }}">
                                <img src="{{ asset($photo->thumb) }}" alt="" class="img-responsive">
                            </a>
                            <a href="{{ route('photos.show', $photo->id) }}"><h3 style="font-size:14px;">{{ $photo->title }}</h3></a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@stop