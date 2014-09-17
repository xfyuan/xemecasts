@extends('layout.admin')

@section('main')

<div class="container">
    <h1> <i class="fa fa-book"></i> Series Management</h1>
    <div class="row">
        <div class="col-md-11 text-right">
            @if (Entrust::can('manage_series'))
            {{ link_to_route('admin.series.create', 'New Series', null, ['class' => 'btn btn-success btn-lg']) }}
            @endif
        </div>
    </div>

@if ($series->count())

  @foreach ($series as $serie)
    <div class="series-item">
        <h3>{{{ $serie->title }}}</h3>
        <div class="row">
            <div class="col-md-4 lead text-warning">{{ $serie->purpose }}</div>
            <div class="col-md-6 text-muted">{{{ $serie->summary }}}</div>
            <div class="col-md-2">
              {{ Form::open(['method' => 'DELETE', 'route' => ['admin.series.destroy', $serie->id]]) }}
              @if (Entrust::can('manage_series'))
              <a class='btn btn-info' href="{{ route('admin.series.edit', $serie->id, false) }}"> <i class="fa fa-pencil"></i> </a>
              @endif

              @if (Entrust::can('delete_series'))
                  <button type="submit" class='btn btn-danger'> <i class="fa fa-trash-o"></i> </button>
              @endif
              {{ Form::close() }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 bg-warning">
        @if ($serie->xcast->count())
            @foreach ($serie->xcast as $cast)
                <h5>
                    <a href="{{ route('admin.xcasts.show', $cast->id, false) }}" target="_blank" class="text-warning"><i class="fa fa-youtube-play"></i> {{ $cast->title }}</a>
                    <small>[ <i class="fa fa-clock-o"></i> {{ $cast->duration }} ]</small>
                </h5>
            @endforeach
        @endif
            </div>
        </div>
    </div>
  @endforeach

@else
    There are no series
@endif
</div>

@stop

