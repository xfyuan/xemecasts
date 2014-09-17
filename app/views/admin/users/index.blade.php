@extends('layout.admin')

@section('main')

<div class="container">
    <h1> <i class="fa fa-users"></i> Users Management</h1>

    @include('partial._roles', ['roles' => $roles])

    <h3>Users</h3>
    @if ($users->count())
    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Confirmed</th>
            <th class="text-center">Role</th>
            <th class="text-center"></th>
        </tr>
        @foreach ($users as $user)
        <tr class="{{ $user->confirmed ? 'success' : 'danger'}} text-center">
            <td>{{{ $user->username }}}</td>
            <td>{{{ $user->email }}}</td>
            <td>{{ $user->confirmed
                ? '<i class="fa fa-check text-success"></i>'
                : '<i class="fa fa-times text-danger"></i>'}}</td>
            <td> {{{implode(array_pluck($user->roles, 'name'), ' | ')}}} </td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id]]) }}
                <a class='btn btn-info' href="{{ route('admin.users.edit', [$user->id], false) }}" title="Edit role"> <i class="fa fa-wrench"></i> </a>
                <button type="submit" class='btn btn-danger'> <i class="fa fa-trash-o"></i> </button>
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </table>

    @include('partial._pagination', ['pages' => $users])

    @else
    There are no casts
    @endif
</div>

@stop

