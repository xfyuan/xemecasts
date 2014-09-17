@extends('layout.site')

@section('main')

<br/>
<div class="container">

  @if ($series->count())
  <div class="row series">
    @foreach ($series as $serie)
    <div class="col-md-4">
      <div class="thumbnail">
        <div class="series__logo text-center"><i class="fa fa-book"></i></div>
        <div class="caption">
          <h3>{{ $serie->title }}</h3>
          <p class="series__summary">{{ str_limit($serie->summary, 136) }}</p>
          <p class="text-center"><a href="{{ route('series.show', [$serie->id], false) }}" class="btn btn-info btn-theme" role="button">More Info</a></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  @else
      There are no casts
  @endif

</div>

@stop
