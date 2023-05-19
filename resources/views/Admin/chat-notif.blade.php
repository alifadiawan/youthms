@if(count($notifications) > 0)
  @foreach($notifications as $notification)
    @if($notification->type === 'App\Notifications\NewNotification')
    <a href="#" data-notif-id="{{ $notification->id }}" class="dropdown-item notif-chat">
        <!-- Message Start -->
        <div class="media">
            <img src="{{$notification->data['from_user_avatar']}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
                <h3 class="dropdown-item-title">
                    {{$notification->data['from_user_name']}}
                </h3>
                <p class="text-sm">{{$notification->data['message']}}</p>
                <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <!-- Message End -->
    </a>
    <div class="dropdown-divider"></div>
    @endif
  @endforeach
@endif