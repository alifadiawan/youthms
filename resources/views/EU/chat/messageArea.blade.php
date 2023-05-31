<ul>
    @foreach($messages as $message)
        @if($message->user_id == auth()->user()->id)
            <li class="repaly">
                <div class="flex-shrink-0">
                    <span>{{auth()->user()->username}}</span>
                    <img class="img-fluid"
                    src="https://mehedihtml.com/chatbox/assets/img/user.png"
                    alt="user img">
                </div>
                <p>{{$message->message}}</p>
                <span class="time">{{ $message->created_at->format('h:i A') }}</span>
            </li>

            
            <div class="d-flex flex-row justify-content-end mb-4">
                <div class="row"></div>
                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                  <p class="small mb-0">Thank you, I really like your product.</p>
                </div>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                  alt="avatar 1" style="width: 45px; height: 100%;">
              </div>
        @else
            <li class="sender">
                <div class="flex-shrink-0">
                    <img class="img-fluid"
                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                        alt="user img">
                    <span>{{$message->user->username}}</span>
                </div>
                <p>{{$message->message}}</p>
                <span class="time">{{ $message->created_at->format('h:i A') }}</span>
            </li>
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