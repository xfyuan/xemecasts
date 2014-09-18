@extends('layout.site')

@section('main')
<div class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <h3>Start your works from these video casts.</h3>
        <h1>Keep Learning As Thoughtworks Dev</h1>
        <h5>New technology popularizing, skills & tips learning, new oritation training... and more</h5>
        <h5>Just for Chengdu Thoughtworkers. Hope each of you enjoy it!</h5>
      </div>
      <div class="col-lg-8 col-lg-offset-2 himg">
        <img src="img/hero.png" class="hero__img-responsive">
      </div>
    </div><!-- /row -->
  </div> <!-- /container -->
</div><!-- /hero -->

<div class="advised">
  <div class="container">
    <div class="row text-center">

    @if ($top3->count())

      @foreach ($top3 as $top)
        <div class="col-md-4">
          <i class="fa fa-leaf"></i>
          <h4>{{ $top->title }}</h4>
          <p>{{ $top->description}}</p>
          <p><br/><a href="{{ route('cast.show', [$top->id], false) }}" class="btn btn-theme">More Info</a></p>
        </div>
      @endforeach

    @else
        There are no casts
    @endif

    </div>
  </div><! --/container -->
</div><! --/advised -->

<div class="casts">
  <h3>LATEST CASTS</h3>

  <div class="casts-centered">
    <div class="casts-thumbnails" class="js-isotope" data-isotope-options=''>

    @if ($xcasts->count())

      @foreach ($xcasts as $cast)
          <div class="casts-thumbnails__item graphic-design">
            <div class="he-wrap tpl6">
              <img src="{{ url($cast->poster) }}" alt="">
              <div class="he-view">
                <div class="bg a0" data-animate="fadeIn">
                  <h3 class="a1" data-animate="fadeInDown">{{ $cast->title }}</h3>
                  <a data-rel="prettyPhoto" href="{{ url($cast->poster) }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                  <a href="{{ route('cast.show', [$cast->id], false) }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                </div><!-- he bg -->
              </div><!-- he view -->
            </div><!-- he wrap -->
          </div><!-- end col-12 -->
      @endforeach

    @else
        There are no casts
    @endif

    </div><!-- casts-thumbnails -->
  </div><!-- casts container -->
</div><!--/Portfoliowrap -->

@stop
