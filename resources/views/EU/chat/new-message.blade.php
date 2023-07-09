@foreach ($messages as $message)
    @if ($message->user_id == auth()->user()->id)
        <div class="row justify-content-end mb-4">
            <div class="col-4 mt-2">
                <div class="p-3 border" style="border-radius: 15px; background-color: #406cab;">
                    <span class="text-start" style="color: #e4e4e4; font-weight:bold">{{ auth()->user()->username }}</span>
                    <p class=" mb-0 text-white text-start">{{ $message->message }}</p>
                </div>
                <span class="time text-start text-muted">{{ $message->created_at->format('h:i A') }}</span>
            </div>
        </div>
    @else
        <div class="row justify-content-start mb-4">
            <div class="col-4 mt-2">
                <div class="p-3 border" style="border-radius: 15px; background-color: #e4e4e4;">
                    <span class="text-start" style="color: black; font-weight:bold">{{ $message->user->username }}</span>
                    <p class=" mb-0">{{ $message->message }}</p>
                </div>
                <span class="time text-start text-muted">{{ $message->created_at->format('h:i A') }}</span>
            </div>
        </div>
    @endif
@endforeach