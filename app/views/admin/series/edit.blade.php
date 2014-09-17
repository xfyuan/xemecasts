@extends('layout.admin')

@section('main')

<div class="container">

@include('partial._errors')

{{ Form::model($series, array('method' => 'PATCH', 'route' => array('admin.series.update', $series->id))) }}

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
              {{ Form::label('title', 'Title:') }}
              {{ Form::text('title', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              {{ Form::label('purpose', 'Purpose:') }}
              {{ Form::textarea('purpose', null, ['class' => 'form-control','rows' => 3]) }}
            </div>
            <div class="form-group has-success">
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
                    <div class="checkbox">
                        <label>
                            <li> {{ Form::checkbox('casts[]', $xcast['id'], in_array($xcast['id'], $selected_casts)) }} {{ $xcast['title']}} </li>
                        </label>
                    </div>
                    @endforeach
                  </ul>
                </div>
                @endforeach
              </div>
            </div>
            <div class="form-group">
              {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
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

