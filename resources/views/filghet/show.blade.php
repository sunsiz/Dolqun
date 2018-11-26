@extends('layouts.global')
@section('title', $filghet->title)
@section('content')

    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default lf-border">
                    <div class="panel-heading">
                        <h5 class="text-primary">
                            <i class="fa fa-angle-right"></i>
                            <i class="fa fa-angle-right"></i>
                            <span>
                                ئۇيغۇرچە ئاتىلىشى
                            </span>
                        </h5>
                        <h4 class="text-pink"> {{ $filghet->ug }}</h4>
                    </div>
                    <div class="panel-heading" style="text-align: left">
                        <h5 class="text-primary">
                            <i class="fa fa-angle-right"></i>
                            <i class="fa fa-angle-right"></i>
                            <span>
                                中文词
                            </span>
                        </h5>
                        <h4 class="text-pink"> {{ $filghet->zh }}</h4>
                    </div>
                    <div class="panel-heading" style="text-align: left">
                        <h5 class="text-primary">
                            <i class="fa fa-angle-right"></i>
                            <i class="fa fa-angle-right"></i>
                            <span>
                                其他词
                            </span>
                        </h5>
                        <h4 class="text-pink"> {{ $filghet->other }}</h4>
                    </div>
                    <div class="panel-heading">
                        <h5 class="text-primary">
                            <i class="fa fa-angle-right"></i>
                            <i class="fa fa-angle-right"></i>
                            <span>
                                ئىزاھات
                            </span>
                        </h5>
                        <h5>
                            {{ $filghet->description }}
                        </h5>
                    </div>
                </div>

            </div>

        </div>
    </div>
@stop
