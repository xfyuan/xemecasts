@extends('layout.site')

@section('main')

<div class="container">

  @if ($xcasts->count())

    @include('partial._pagination', ['pages' => $xcasts])

    <div class="row lessons">
        @foreach ($xcasts as $cast)
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="{{ route('cast.show', [$cast->id], false) }}"> <img src="{{ url($cast->poster) }}" alt="..."> </a>
                <div class="caption">
                    <p class="lessons__title">{{ $cast->title }}</p>
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
