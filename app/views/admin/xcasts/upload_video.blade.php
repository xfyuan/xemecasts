@extends('layout.admin')

@section('main')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3> {{$xcast->title}} </h3>

            {{ Form::model($xcast, ['method' => 'POST', 'route' => ['admin.xcasts.transmit_video', $xcast->id], 'class' => 'dropzone', 'id' => 'xe-dropzone']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop
