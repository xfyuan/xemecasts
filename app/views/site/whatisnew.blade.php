@extends('layout.site')

@section('main')

<br/>
<div class="container">

    @if (count($whatisnew))
        @foreach ($whatisnew as $date => $xcasts)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-warning">
                  <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-calendar"></i> {{$date}}</h3>
                  </div>

                  <ul class="list-group">
                    @foreach ($xcasts as $cast)
                        <a class="list-group-item" href="{{ route('cast.show', [$cast->id], false) }}">
                            {{ $cast->title }}
                            @include ('partial._levels-label', ['cast' => $cast])
                        </a>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
        @endforeach
    @else
        There are no casts
    @endif

</div>

@stop
