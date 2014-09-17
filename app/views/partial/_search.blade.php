{{ Form::open(['method' => 'GET', 'route' => $route, 'class' => 'navbar-form navbar-right']) }}

    {{ Form::input('text', 'q', null, ['class' => 'form-control', 'placeholder' => Input::get('q', 'Search...')]) }}

{{ Form::close() }}
