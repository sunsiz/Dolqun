@extends('layouts.global')
@section('title', $filghet->title)
@section('content')

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">

                <h3> {{ $filghet->ug }}</h3>
                <h4> {{ $filghet->zh }}</h4>
                <h5> {{ $filghet->other }}</h5>
                <p>
                    {{ $filghet->description }}
                </p>
            </div>

        </div>
    </div>
@stop
