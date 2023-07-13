<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('https://kit.fontawesome.com/e4a753eb05.js') }}" crossorigin="anonymous"></script>

<script>
    function show(id) {
        $.get('/group-chat/' + id, function(data) {
            $('#group').html(data);
        })
    }
</script>



<!-- Add Group Modal -->
<div class="modal fade" id="addGroupModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="border-radius: 50px">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('gc.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <h4 class="text-center fw-bold">TAMBAH GROUP</h4>
                    <div class="form-group">
                        <label for="group">Nama Group : </label>
                        <input type="text" name="group" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="row p-3 justify-content-center">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Tambah</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

<!-- Join Group Modal -->
<div class="modal fade" id="joinGroupModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="border-radius: 50px">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('gc.join') }}" method="post">
                @csrf
                <div class="modal-body">
                    <h4 class="text-center fw-bold">JOIN GROUP</h4>
                    <div class="form-group">
                        <label for="group">Kode Group : </label>
                        <input type="text" name="kode" class="form-control" placeholder="Kode Group...">
                    </div>
                </div>

                <div class="row p-3 justify-content-center">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Join</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>

