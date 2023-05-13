@if(count($notifications) > 0)
  @foreach($notifications as $notification)
    <div class="row">
      <div class="dropdown-item">
        <span ><i class="fa-solid fa-circle-info"></i>{{ $notification->data['message'] }}</span>
        <a class="btn btn-sm btn-success float-right">v</a>
      </div>
    </div>
  @endforeach
@endif