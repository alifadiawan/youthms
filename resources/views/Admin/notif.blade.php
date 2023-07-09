@if(count($notifications) > 0)
  @foreach($notifications as $notification)
    <a href="#" data-url="{{ $notification->data['url'] }}" class="dropdown-item notification-item">
      <i class="fa-solid fa-circle-info"></i> {{ $notification->data['message'] }}
      <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
    </a>
  @endforeach
@endif