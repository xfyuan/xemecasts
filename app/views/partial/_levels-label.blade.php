@if ($cast->levels == 0)
    <label class="label label-success">Free</label>
@else
    <label class="label label-danger">Premium</label>
@endif
<span class="badge"> {{ $cast->duration }} </span>
