<ul>
    @foreach ($messages as $message)
        @if ($message->user_id == auth()->user()->id)
            <div class="row justify-content-end mb-4">
                <span class="text-end">{{ auth()->user()->username }}</span>
                <div class="col-4 mt-2">
                    <div class="p-3 border" style="border-radius: 15px; background-color: #e4e4e4;">
                        <p class=" mb-0">{{ $message->message }}</p>
                    </div>
                    <span class="time text-end text-muted">{{ $message->created_at->format('h:i A') }}</span>
                </div>
            </div>
        @else
        <div class="row justify-content-start mb-4">
            <div class="col-4">
                <div class="p-3 border" style="border-radius: 15px; background-color: #406cab;">
                    <p class=" mb-0 text-white">{{ $message->message }}</p>
                </div>
                <span class="time text-start text-muted">{{ $message->created_at->format('h:i A') }}</span>
            </div>
        </div>
            {{-- <li class="sender">
                <div class="flex-shrink-0">
                    <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                    <span>{{ $message->user->username }}</span>
                </div>
                <p>{{ $message->message }}</p>
                <span class="time">{{ $message->created_at->format('h:i A') }}</span>
            </li> --}}
        @endif
    @endforeach
    <!-- <li class="sender">
        <p> Hey, Are you there? </p>
        <span class="time">10:26 am</span>
    </li>
    <li class="sender">
        <p> Hey, Are you there? </p>
        <span class="time">10:32 am</span>
    </li>
    <li class="repaly">
        <p>How are you?</p>
        <span class="time">10:35 am</span>
    </li>
    <li>
        <div class="divider">
            <h6>Today</h6>
        </div>
    </li>

    <li class="repaly">
        <p> yes, tell me</p>
        <span class="time">10:36 am</span>
    </li>
    <li class="repaly">
        <p>yes... on it</p>
        <span class="time">junt now</span>
    </li> -->

</ul>
