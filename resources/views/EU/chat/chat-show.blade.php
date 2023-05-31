<div class="modal-dialog-scrollable">
    <div class="modal-content">
        @include('EU.chat.topbar')

        <!-- Add Member Modal -->
        <div class="modal fade" id="addMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <label for="users">Daftar User : </label>
                  @foreach($users as $user)
                    <form action="{{route('gc.users.add', ['group' => $group->id, 'user' => $user->id])}}" method="post">
                        @csrf
                        <ul>
                            <li>
                                <label>{{$user->username}}</label>
                                <button class="btn btn-success"><i class="fas fa-solid fa-check"></i></button>
                            </li>
                        </ul> 
                    </form>
                  @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="modal-body">
            <div class="msg-body" id="messsageArea">
                @include('EU.chat.messageArea')
            </div>
        </div>


        <!-- sendbox -->
        @include('EU.chat.sendbox')
        
    </div>
</div>