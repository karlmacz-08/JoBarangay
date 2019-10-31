@if(session()->has('flash_status'))
  @if(session()->get('flash_status') === 'ok')
    <div class="alert alert-success">
      <span class="fas fa-check fa-fw fa-m-r"></span>
      <span>{{ session()->get('flash_message') }}</span>
    </div>
  @elseif(session()->get('flash_status') === 'error')
    <div class="alert alert-danger">
      <span class="fas fa-times fa-fw fa-m-r"></span>
      <span>{{ session()->get('flash_message') }}</span>
    </div>
  @endif
@endif
