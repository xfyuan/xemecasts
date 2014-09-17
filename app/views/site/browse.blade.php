@extends('layout.site')

@section('main')

<br/>
<div class="container">

    @if ($xcasts->count())
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-group">
                @foreach ($xcasts as $cast)
                <a class="list-group-item" href="{{ route('cast.show', [$cast->id], false) }}">
                    <span class="label label-info"> {{ $cast->updated_at->toDateString() }} </span>&nbsp;&nbsp;
                    {{ $cast->title }}
                    @include ('partial._levels-label', ['cast' => $cast])
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @else
    There are no casts
    @endif

</div>

@stop
