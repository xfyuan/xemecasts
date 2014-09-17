@extends('layout.site')

@section('main')

<br/>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if ($series->count())

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $series->title }}</h3>
                </div>
                <div class="panel-body">
                    <p class="text-center"><img src="/casts/poster/_default_series.jpg" alt="..."></p>
                    <p class="lead">{{ $series->purpose }}</p>
                    <p>{{ $series->summary }}</p>
                </div>

                <ul class="list-group">
                    @if ($series->xcast->count())
                        @foreach ($series->xcast as $cast)
                        <a class="list-group-item" href="{{ route('cast.show', [$cast->id], false) }}" target="_blank">
                            <i class="fa fa-youtube-play"></i> {{ $cast->title }}
                            <span class="badge"> {{ $cast->duration }} </span>
                        </a>
                        @endforeach
                    @endif
                </ul>
            </div>
            @else
                There are no casts
            @endif

        </div>
    </div>
</div>

@stop
