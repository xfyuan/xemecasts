@extends('layout.admin')

@section('main')

<div class="container">

@include('partial._errors')

{{ Form::open(['route' => 'admin.series.store']) }}

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Add new series</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form">
            <!-- text input -->
            <div class="form-group">
              {{ Form::label('title', 'Title:') }}
              {{ Form::text('title', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              {{ Form::label('purpose', 'Purpose:') }}
              {{ Form::textarea('purpose', null, ['class' => 'form-control','rows' => 3]) }}
            </div>
            <div class="form-group">
              {{ Form::label('summary', 'Summary:') }}
              {{ Form::textarea('summary', null, ['class' => 'form-control','rows' => 6]) }}
            </div>
            <div class="form-group">
              {{ Form::label('casts', 'Casts:') }}
              <div class="row">
                @foreach ($grouped_casts as $xcasts)
                <div class="col-md-4">
                  <ul class="list-unstyled">
                    @foreach ($xcasts as $xcast)
                    <li> {{ Form::checkbox('casts[]', $xcast['id']) }} {{ $xcast['title']}} </li>
                    @endforeach
                  </ul>
                </div>
                @endforeach
              </div>
            </div>
            <div class="form-group">
              {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
              {{ link_to_route('admin.series.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
            </div>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</div>

{{ Form::close() }}

@stop

