@extends('layout.admin')
@section('content-title', 'Landing Page')
@section('judul', 'Landing Page')
@section('content')

<div class="container">
	<div class="col-lg-12">
		<h4>Add Image To Landing Page</h4>
		<div class="row">
			<div class="col-lg-3">
				<button id="button1" onclick="tombol1()" style="border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('add-image.png') }}" width="250px"></button>
				<button id="button2" onclick="tombol2()" style="display: none; border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('img1.jpg') }}" width="250px"></button>
			</div>
			<div class="col-lg-3">
				<button id="button3" onclick="tombol3()" style="border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('add-image.png') }}" width="250px"></button>
				<button id="button4" onclick="tombol4()" style="display: none; border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('img2.jpg') }}" width="250px"></button>
			</div>
			<div class="col-lg-3">
				<button id="button5" onclick="tombol5()" style="border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('add-image.png') }}" width="250px"></button>
				<button id="button6" onclick="tombol6()" style="display: none; border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('img3.jpg') }}" width="250px"></button>
			</div>
			<div class="col-lg-3">
				<button id="button7" onclick="tombol7()" style="border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('add-image.png') }}" width="250px"></button>
				<button id="button8" onclick="tombol8()" style="display: none; border: none; appearance: none; cursor: pointer; background-color: inherit"><img src="{{ asset('img4.jpg') }}" width="250px"></button>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<h4>Edit Description</h4>
		<form>
			<textarea id="summernote" class="form-control"></textarea>
			<br>
			<button type="submit" class="btn btn-md btn-success">Simpan</button>
		</form>
	</div>
</div>

<script>
	function tombol1() {
		document.getElementById("button2").style.display = "inline";
		document.getElementById("button1").style.display = "none";
	}

	function tombol2() {
		document.getElementById("button2").style.display = "none";
		document.getElementById("button1").style.display = "inline";
	}

	function tombol3() {
		document.getElementById("button4").style.display = "inline";
		document.getElementById("button3").style.display = "none";
	}

	function tombol4() {
		document.getElementById("button4").style.display = "none";
		document.getElementById("button3").style.display = "inline";
	}

	function tombol5() {
		document.getElementById("button6").style.display = "inline";
		document.getElementById("button5").style.display = "none";
	}

	function tombol6() {
		document.getElementById("button6").style.display = "none";
		document.getElementById("button5").style.display = "inline";
	}

	function tombol7() {
		document.getElementById("button8").style.display = "inline";
		document.getElementById("button7").style.display = "none";
	}

	function tombol8() {
		document.getElementById("button8").style.display = "none";
		document.getElementById("button7").style.display = "inline";
	}
</script>
@endsection