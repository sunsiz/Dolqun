@extends('layouts.global')
@section('title', 'يازما يوللاش')
@include('vendor.ueditor.assets')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default lf-border">
                <div class="panel-heading">
                    <h5 class="text-primary">
                        <i class="fa fa-angle-right"></i>
                        <i class="fa fa-angle-right"></i>
                        <span>
                                 ھالقىلىق سۆز
                            </span>
                        <span class="text-pink" style="font-size: 18px;">
                             [ {{ $keywords }} ]
                        </span>
                        <span>
                            نىڭ ئىزدەش نەتىجىسى
                        </span>
                    </h5>
                </div>
                @foreach($filghets as $filghet)
                    <div class="panel-heading">
                        <h4>
                            <a href="{{ route('filghetes.show', $filghet->id) }}" class="text-dark"> {{ $filghet->ug }}</a>
                            <span class="text-muted" style="font-size: 14px;">
                                {{ $filghet->zh }}
                            </span>
                        </h4>
                    </div>
                 @endforeach
            </div>
        </div>
    </div>
@stop