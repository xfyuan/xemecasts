@extends('layout.site')

@section('main')

{{HTML::style('packages/videojs/dist/video-js/video-js.min.css')}}
{{HTML::script('packages/videojs/dist/video-js/video.js')}}

<div id="blue">
  <div class="container">
    <div class="row">
        <h3>[<i class="fa fa-user"></i> {{$xcast->author}}] {{$xcast->title}}</h3>
    </div><!-- /row -->
  </div> <!-- /container -->
</div><!-- /blue -->

<br/>
<div class="container mt">
  <div class="row">
    <div class="col-md-10">

        @if ($xcast->levels > 0 && ! Entrust::can('view_premium_casts'))
            <img src="/img/_disabled.jpg" alt="">

        @else
          <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="1024" height="576"
            poster="{{url($xcast->poster)}}"
            data-setup="{}">
            <source src="{{url($xcast->video)}}" type='video/mp4' />
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
          </video>
        @endif

    </div>
  </div><! --/row -->
</div><! --/container -->

<br/>
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Casts Notes</h3>
              </div>
              <div class="panel-body">
                <blockquote>
                @if ($xcast->levels > 0 && ! Entrust::can('view_premium_casts'))
                    Sorry, you don't have permission to view this notes. Please update your account.
                @else
                    {{$xcast->rendered_notes}}
                @endif
                </blockquote>
              </div>
            </div>
        </div>
    </div>
</div>

@stop
