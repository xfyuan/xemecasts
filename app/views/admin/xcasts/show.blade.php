@extends('layout.admin')

@section('main')

{{HTML::style('packages/videojs/dist/video-js/video-js.min.css')}}
{{HTML::script('packages/videojs/dist/video-js/video.js')}}

<div class="container">
  <div class="row">
    <div class="col-md-9 col-md-offset-2">
      <h2>{{$xcast->title}}</h2>

      <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="800" height="450"
        poster="{{url($xcast->poster)}}"
        data-setup="{}">
        <source src="{{url($xcast->video)}}" type='video/mp4' />
        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
      </video>
    </div>

    <div class="col-md-8 col-md-offset-2">
      <h4>Cast Notes</h4>
        {{$xcast->rendered_notes}}
    </div>

  </div><! --/row -->
</div><! --/container -->

@stop
