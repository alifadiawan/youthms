@if (count($notifications) > 0)
    @foreach ($notifications as $notification)
        @if ($notification->type === 'App\Notifications\TransaksiNotification')
            <li class="notification-item" data-url="{{ $notification->data['url'] }}">
                <div class="d-flex flex-row gap-1 align-items-center">
                    <i class="bi bi-info-circle text-primary"></i>
                    <p class="p-0 m-0" style="font-size: 12px">{{ $notification->data['message'] }}</p>
                </div>
                <p class="text-muted m-0 p-0" style="font-size: 10px">{{ $notification->created_at->diffForHumans() }}</p>
                <hr>
            </li>
        @endif
    @endforeach
@endif
