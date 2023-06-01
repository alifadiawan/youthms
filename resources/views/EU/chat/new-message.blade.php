@foreach ($messages as $message)
    @if ($message->user_id == auth()->user()->id)
        <div class="row justify-content-end mb-4">
            <span class="text-end">{{ auth()->user()->username }}</span>
            <div class="col-4 mt-2">
                <div class="p-3 border" style="border-radius: 10px; background-color: #406cab;">
                    <p class=" mb-0 text-white text-end">{{ $message->message }}</p>
                </div>
                <span class="time text-end text-muted">{{ $message->created_at->format('h:i A') }}</span>
            </div>
        </div>
    @else
    <div class="row justify-content-start mb-4">
        <span class="text-start">{{ $message->user->username }}</span>
        <div class="col-4">
            <div class="p-3 border" style="border-radius: 10px; background-color: #e4e4e4;">
                <p class=" mb-0">{{ $message->message }}</p>
            </div>
            <span class="time text-start text-muted">{{ $message->created_at->format('h:i A') }}</span>
        </div>
    </div>
    @endif
@endforeach