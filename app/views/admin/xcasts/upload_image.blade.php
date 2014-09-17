@extends('layout.admin')

@section('main')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3> {{$xcast->title}} </h3>
            <p class="bg-danger text-danger">You can upload your own poster image for your video cast. Otherwise, it should be set a default poster. Recommend to use 16:10 resolution.</p>

            {{ Form::model($xcast, ['method' => 'POST', 'route' => ['admin.xcasts.transmit_image', $xcast->id], 'class' => 'dropzone', 'id' => 'xe-dropzone']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop
