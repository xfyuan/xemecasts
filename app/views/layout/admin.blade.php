<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Xemecasts Admin</title>

{{HTML::style('packages/bootstrap/dist/css/bootstrap.min.css')}}
{{HTML::style('packages/font-awesome/css/font-awesome.min.css')}}
{{HTML::style('packages/codemirror/lib/codemirror.css')}}
{{HTML::style('packages/dropzone/downloads/css/dropzone.css')}}
{{HTML::style('assets/css/xemecasts_be.min.css')}}

{{HTML::script('packages/modernizr/modernizr.js')}}
</head>
<body>

<div class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><i class="fa fa-rebel"></i> Xemecasts</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        @if (Entrust::can('manage_premium_casts') or Entrust::can('manage_free_casts') or Entrust::can('delete_casts'))
            <li><a href="/admin/xcasts" title="Casts"><i class="fa fa-video-camera"></i> </a></li>
        @endif

        @if (Entrust::can('manage_series') or Entrust::can('delete_series'))
            <li><a href="/admin/series" title="Series"><i class="fa fa-book"></i> </a></li>
        @endif

        @if (Entrust::can('manage_users') or Entrust::can('delete_users'))
            <li><a href="/admin/users" title="Users"><i class="fa fa-users"></i> </a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" title="Who am I?">I'm {{ Auth::user()->username }}</a></li>
        <li><a href="/users/logout" title="Logout"><i class="fa fa-power-off"></i> </a></li>
      </ul>

      @include('partial._search', ['route' => 'admin.xcasts.index'])
    </div>
  </div>
</div>

@yield('main')

<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      </div>
    </div><! --/row -->
  </div><! --/container -->
</div><! --/footer -->

{{HTML::script('packages/jquery/dist/jquery.min.js')}}
{{HTML::script('packages/bootstrap/dist/js/bootstrap.min.js')}}
{{HTML::script('packages/dropzone/downloads/dropzone.min.js')}}
{{HTML::script('packages/codemirror/lib/codemirror.js')}}
{{HTML::script('packages/codemirror/mode/markdown/markdown.js')}}
{{HTML::script('assets/js/xemecasts_be.min.js')}}

</body>
</html>
