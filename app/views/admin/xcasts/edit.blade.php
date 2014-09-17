@extends('layout.admin')

@section('main')

<div class="container">

@include('partial._errors')

{{ Form::model($xcast, array('method' => 'PATCH', 'route' => array('admin.xcasts.update', $xcast->id))) }}

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Edit cast</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <form role="form">
            <!-- text input -->
            <div class="form-group">
              <div class="row">
                <div class="col-md-8">
                  {{ Form::label('title', 'Title:') }}
                  {{ Form::text('title', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-3">
                  {{ Form::label('author', 'Author:') }}
                  {{ Form::text('author', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-1">
                  {{ Form::label('levels', 'Levels:') }}
                  {{ Form::select('levels', ['0' => 'Free', '1' => 'Premium'], $xcast->levels) }}
                </div>
              </div>
            </div>
            <div class="form-group has-success">
              {{ Form::label('description', 'Desc:') }}
              {{ Form::textarea('description', null, ['class' => 'form-control','rows' => 3]) }}
            </div>
            <div class="form-group">
              {{ Form::label('github', 'Github:') }}
              {{ Form::text('github', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              {{ Form::label('notes', 'Notes:') }}
                {{ Form::textarea('notes', null, ['class' => 'form-control', 'id' => 'editor']) }}
            </div>
            <div class="form-group">
              {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
              {{ link_to_route('admin.xcasts.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
            </div>
          </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</div>

{{ Form::close() }}

@stop

