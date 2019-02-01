@extends('layouts.global')
@section('title', 'يازما يوللاش')
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default lf-border">
                <div class="panel-heading">
                    <h5 class="text-primary">
                        <i class="fa fa-angle-right"></i>
                        <i class="fa fa-angle-right"></i>
                        <span>
                                   فىلغەت بوغچىسى
                            </span>
                        <span class="text-pink" style="font-size: 18px;">
                             [ {{ $album->name_ug }} ]
                        </span>
                        <span>
                            دىكى سۆزلۈكلەر
                        </span>
                    </h5>
                </div>
                <div class="panel-heading" style="border-bottom: none">
                @foreach($album->filghets as $filghet)
                    <a href="{{ route('filghetes.show', $filghet->id) }}" class="btn btn-default" style="margin-bottom: 3px;"> {{ $filghet->ug }}</a>
                 @endforeach
                </div>
            </div>
        </div>
    </div>
@stop