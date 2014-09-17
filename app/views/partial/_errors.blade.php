@if ($errors->any())
  <div class="row">
    <div class="col-md-12 text-danger">
      <ul>
        <strong> {{ implode('', $errors->all('<li class="error">:message</li>')) }} </strong>
      </ul>
    </div>
  </div>
@endif
