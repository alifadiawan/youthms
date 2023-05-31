<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('https://kit.fontawesome.com/e4a753eb05.js') }}" crossorigin="anonymous"></script>

<script>
	function show(id) {
		$.get('/group-chat/'+id, function(data){
			$('#group').html(data);
		})
	}
</script>

<!-- Add Group Modal -->
<div class="modal fade" id="addGroupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Group</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('gc.store')}}" method="post">
	       	@csrf
	    	<div class="modal-body">
	        	<label for="group">Nama Group : </label>
	        	<input type="text" name="group" class="form-control" placeholder="Nama Group">
	      	</div>
	      	<div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	            <button type="submit" class="btn btn-primary">Tambah</button>
	      	</div>
      </form>
    </div>
  </div>
</div>

