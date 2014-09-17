@extends('layout.admin')

@section('main')

<div class="container">

@include('partial._errors')

@include('partial._roles', ['roles' => $roles])

{{ Form::model($user, array('method' => 'PATCH', 'route' => array('admin.users.update', $user->id))) }}

  <div class="row">
      <div class="col-md-6">
          <div class="form-group">
              <h3>Choose roles for "{{ $user->username }}"</h3>
              {{ Form::label('roles', 'User can be set multiple roles:') }}
              <ul class="list-inline">
                @foreach ($roles as $role)
                <li>
                <div class="checkbox">
                  <label>
                      <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, $own_roles) ? 'checked="checked"' : ''}}">
                    {{ $role->name }}
                  </label>
                </div>
                </li>
                @endforeach
              </ul>
          </div>

          <div class="form-group">
              {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
              {{ link_to_route('admin.users.index', 'Cancel', null, array('class' => 'btn btn-danger')) }}
          </div>
      </div>
  </div>
</div>

{{ Form::close() }}

@stop

