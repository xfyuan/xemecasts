<h3>Roles Legend</h3>
@if ($roles->count())
<table class="table table-bordered table-hover">
    @foreach ($roles as $role)
    <tr class="warning">
        <td class="text-warning text-right">{{ $role->name }}</td>
        <td><small><em>[{{implode(array_pluck($role->perms, 'display_name'), '] | [')}}]</em></small></td>
    </tr>
    @endforeach
</table>
@endif
