<div class="msg-head">
    <div class="row align-items-center">
        <div class="col-8">
            <h3>{{$group->group}}</h3>
        </div>
        <div class="col-4">
            <ul class="moreoption">
                <li class="navbar nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addMember">Tambahkan Member</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Another
                                action</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else
                                here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Add Member Modal -->
<div class="modal fade" id="addMember" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addMemberLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('gc.users.add', ['group' => $group->id]) }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="users[]" value="{{ $user->id }}">
                                                    <label class="form-check-label">Tambahkan</label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>