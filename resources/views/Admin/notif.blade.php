@if(count($notifications) > 0)
  @foreach($notifications as $notification)
    <!-- <div class="row">
      <div class="dropdown-item">
        <span ><i class="fa-solid fa-circle-info"></i>{{ $notification->data['message'] }}</span>
        <a class="btn btn-sm btn-success float-right">v</a>
      </div>
    </div> -->

    <a href="{{route('notif.read')}}" class="dropdown-item">
      <i class="fa-solid fa-circle-info"></i> {{ $notification->data['message'] }}
      <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
    </a>
  @endforeach
@endif