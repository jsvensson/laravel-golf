@if(Session::has('alert'))
  @if(Session::has('alert_type'))
    <div class="alert alert-{{ Session::get('alert_type') }}">
  @else
    <div class="alert alert-success">
  @endif
      {{ Session::get('alert') }}
    </div>
@endif
