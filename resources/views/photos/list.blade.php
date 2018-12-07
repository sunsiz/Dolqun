@extends('layouts.global')
@section('title', 'يازما يوللاش')
@section('content')
    <div class="col-md-12">
        <div class="row">
            @foreach($photos as $photo)
                <div class="col-md-3">
                    <div class="photos-list-item">
                        <a href="{{ route('photos.show', $photo->id) }}">
                            <img src="{{ asset($photo->thumb) }}" alt="" class="img-responsive">
                        </a>
                        <a href="{{ route('photos.show', $photo->id) }}"><h3 style="font-size:14px;">{{ $photo->title }}</h3></a>
                    </div>
                </div>
            @endforeach
            <div class="col-md-12">
                {{ $photos->render() }}
            </div>
        </div>
    </div>
@stop