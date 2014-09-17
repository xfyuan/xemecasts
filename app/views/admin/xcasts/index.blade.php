@extends('layout.admin')

@section('main')

<div class="container">
  <h1> <i class="fa fa-video-camera"></i> Casts Management</h1>
  <div class="row">
    <div class="col-md-11 text-right">
      @if (Entrust::can('manage_premium_casts') or Entrust::can('manage_free_casts'))
      {{ link_to_route('admin.xcasts.create', 'New Cast', null, ['class' => 'btn btn-success btn-lg']) }}
      @endif
    </div>
  </div>

  @include('partial._pagination', ['pages' => $xcasts])

@if ($xcasts->count())

  @foreach ($xcasts as $cast)
    <div class="xcasts-item">
        <h3>{{{ $cast->title }}}</h3>
        <div class="row">
            <div class="col-md-4 col-md-offset-1 text-danger">{{{ $cast->author }}}</div>
            <div class="col-md-2"><small>[ <i class="fa fa-clock-o"></i> {{ $cast->duration }} ]</small></div>
            <div class="col-md-2"><small><em>{{{ $cast->updated_at }}}</em></small></div>
            <div class="col-md-3">
              {{ Form::open(['method' => 'DELETE', 'route' => ['admin.xcasts.destroy', $cast->id]]) }}

              @if (Entrust::can('manage_premium_casts') or Entrust::can('manage_free_casts'))
                  <a class='btn btn-warning' href="{{ route('admin.xcasts.show', [$cast->id], false) }}" title="Preview"> <i class="fa fa-eye"></i> </a>
                  <a class='btn btn-info' href="{{ route('admin.xcasts.edit', [$cast->id], false) }}" title="Edit info"> <i class="fa fa-pencil"></i> </a>
                  <a class='btn btn-info' href="{{ route('admin.xcasts.upload_image', [$cast->id], false) }}" title="Upload poster image"> <i class="fa fa-camera"></i> </a>
                  <a class='btn btn-info' href="{{ route('admin.xcasts.upload_video', [$cast->id], false) }}" title="Upload video casts"> <i class="fa fa-video-camera"></i> </a>
              @endif

              @if (Entrust::can('delete_casts'))
                  <button type="submit" class='btn btn-danger'> <i class="fa fa-trash-o"></i> </button>
              @endif

              {{ Form::close() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">{{ HTML::image($cast->poster, $cast->title, ['width' => 256, 'height' => 160]) }}</div>
            <div class="col-md-6 text-muted">{{{ $cast->description }}}</div>
        </div>
    </div>
  @endforeach

  @include('partial._pagination', ['pages' => $xcasts])

@else
    There are no casts
@endif
</div>

@stop

