<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Xemecasts - Screencasts For Thoughtworks Developer</title>

{{HTML::style('packages/bootstrap/dist/css/bootstrap.min.css')}}
{{HTML::style('packages/font-awesome/css/font-awesome.min.css')}}
{{HTML::style('packages/jquery-prettyPhoto/css/prettyPhoto.css')}}
{{HTML::style('packages/hoverex/hoverex.css')}}
{{HTML::style('assets/css/xemecasts_fe.min.css')}}

{{HTML::script('packages/modernizr/modernizr.js')}}
</head>
<body>

<div class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><i class="fa fa-ra fa-fw"></i> Xemecasts</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">HOME</a></li>
        <li><a href="/browse">BROWSE</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">LEARN <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/whatisnew">What's New</a></li>
              <li><a href="/lessons">Lessons</a></li>
              <li><a href="/series">Series</a></li>
            </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
            <li><a href="/register">SIGNUP</a></li>
            <li><a href="/users/login">LOGIN</a></li>
        @else
            <li><a href="#" title="Who am I?">I'm {{ Auth::user()->username }}</a></li>
            <li><a href="/users/logout">LOGOUT</a></li>
        @endif
      </ul>

      @include('partial._search', ['route' => 'browse'])
    </div><!--/.nav-collapse -->
  </div>
</div>

@yield('main')

<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <h4>About</h4>
        <div class="hline-w"></div>
        <p>Xemecasts is just designed for new technology popularizing, skills & tips learning and new oritation training in Chengdu Thoughtworks.</p>
      </div>
      <div class="col-lg-4">
        <h4>Links</h4>
        <div class="hline-w"></div>
        <p>
        <a href="#"><i class="fa fa-github"></i></a>
        </p>
      </div>
      <div class="col-lg-4">
        <h4>Thanks</h4>
        <div class="hline-w"></div>
        <p>
        Drupal Team<br/>
        JL.ZL.ZF.ZY.YM.JF.YY.<br/>
        </p>
      </div>

    </div><! --/row -->
  </div><! --/container -->
</div><! --/footer -->

{{HTML::script('packages/jquery/dist/jquery.min.js')}}
{{HTML::script('packages/bootstrap/dist/js/bootstrap.min.js')}}
{{HTML::script('packages/isotope/jquery.isotope.min.js')}}
{{HTML::script('packages/jquery-prettyPhoto/js/jquery.prettyPhoto.js')}}
{{HTML::script('packages/DirectionAwareHoverEffect/js/jquery.hoverdir.js')}}
{{HTML::script('packages/retinajs/dist/retina.min.js')}}
{{HTML::script('packages/hoverex/jquery.hoverex.min.js')}}
{{HTML::script('assets/js/xemecasts_fe.min.js')}}
</body>
</html>
