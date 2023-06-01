<div class="modal-dialog-scrollable">
    <div class="modal-content">
        @include('EU.chat.topbar')



        <div class="modal-body">
            <div class="msg-body" id="messsageArea">
                @include('EU.chat.messageArea')
            </div>
        </div>


        <!-- sendbox -->
        @include('EU.chat.sendbox')

    </div>
</div>


<!-- Add Member Modal -->
{{-- <div class="modal fade" id="addMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="max-width: 600px">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <form action="{{ route('gc.users.add', ['group' => $group->id, 'user' => $user->id]) }}"
                                method="post">
                                @csrf
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td><button class="btn btn-success"><i class="fas fa-solid fa-check"></i></button></td>
                                </tr>
                            </form>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> --}}
<div class="modal fade" id="addMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMemberLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col">
            <table class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <th>Nama</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                      <form action="{{ route('gc.users.add', ['group' => $group->id, 'user' => $user->id]) }}"
                          method="post">
                          @csrf
                          <tr>
                              <td>{{ $user->username }}</td>
                              <td><button class="btn btn-success"><i class="fas fa-solid fa-check"></i></button></td>
                          </tr>
                      </form>
                  @endforeach

              </tbody>
          </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
