@extends('layout.admin')
@section('content-title', 'Edit Portofolio')
@section('content')
@section('judul', 'Edit Portofolio')


<div class="card">
    <div class="card-body">
        <form action="{{route('portfolio.update', $porto->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content">
                
                <div class="row mb-4">
                    <div class="col-lg-12 col-md-6">
                        <p>Project</p>
                        <input type="text" class="form-control" name="project" id="project" value="{{$porto->project}}">
                        <p>Deskripsi</p>
                        <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5">{{$porto->deskripsi}}</textarea>
                        <p>Services : </p>
                        <select class="form-control form-select text-capitalize" name="services_id">
                            <option value="">Pilih Services</option>
                            @foreach($services as $s)
                            <option value="{{$s->id}}" @if($s->id == $porto->services_id) selected @endif>{{$s->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="cover">Cover Lama : </label>
                        <img src="{{ asset('./portofolio/'.$porto->cover) }}">
                    </div>
                    @foreach($pic as $p)
                    <div class="col">
                        <label for="foto">Screenshot Lama : </label>
                        <img src="{{ asset('./portofolio/'.$p->foto) }}">
                    </div>
                    @endforeach
                </div>


                <div class="row mt-5" id="screenshots-container">
                    <div class="col-md-6 col-lg-3   ">
                        <div class="form-group">
                            <label for="cover">Cover Baru : </label>
                            <input type="file" name="cover" id="illustration" class="form-control">
                            <img id="preview" src="#" class="form-control">
                        </div>
                    </div>
                    @foreach($pic as $pp)
                        <div class="col">
                            <div class="form-group">
                                <label for="foto">Screenshot Baru : </label>
                                <input type="file" name="foto[]" id="foto" class="form-control">
                                <img id="foto-preview" src="#" class="form-control">
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-success" id="add-screenshot" style="background-color: green;">Tambah Screenshot</button>
            </div>
            <br><br>
            <div class="row">
                <div class="col">
                    <!-- <input type="hidden" name="portofolio_id" value="{{$porto->id}}"> -->
                    <button class="btn btn-success">Submit</button>
                    <a href="{{route('portfolio.index')}}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    #preview {
        width: 100%;
        height: 190px;
        object-fit: contain;
    }

    #foto-preview {
        width: 100%;
        height: 190px;
        object-fit: contain;
    }
</style>
<script>
    document.getElementById("illustration").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("preview");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.getElementById("foto").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("foto-preview");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('screenshots-container');
            const addButton = document.getElementById('add-screenshot');
            let counter = {{count($pic) + 1}};
            const maxScreenshots = 5;
            if (counter >= maxScreenshots) {
                addButton.style.display = 'none'; // Jika jumlah screenshot sudah mencapai batas maksimum, sembunyikan tombol
            }

            addButton.addEventListener('click', function () {
                if (counter <= maxScreenshots) {
                    const newDiv = document.createElement('div');
                    const newLabel = document.createElement('label');
                    const newInput = document.createElement('input');
                    const newImg = document.createElement('img');

                    newLabel.setAttribute('for', `screenshot${counter}`);
                    newLabel.textContent = `Screenshot ${counter}:`;

                    newInput.setAttribute('type', 'file');
                    newInput.setAttribute('name', 'foto[]');
                    newInput.classList.add('form-control');
                    newInput.setAttribute('accept', 'image/jpeg, image/png');

                    newImg.id = 'foto-preview';
                    newImg.src = '#';
                    newImg.classList.add('form-control');
                    newImg.style.display = 'none';

                    newDiv.appendChild(newLabel);
                    newDiv.appendChild(newInput);
                    newDiv.appendChild(newImg);
                    container.appendChild(newDiv);

                    counter++;

                    // Set up event listener for the new screenshot input
                    newInput.addEventListener('change', function () {
                        const reader = new FileReader();
                        const preview = newImg;

                        reader.onload = function () {
                            preview.src = reader.result;
                            preview.style.display = 'block';
                        }

                        reader.readAsDataURL(this.files[0]);
                    });
                }

                if (counter == maxScreenshots) {
                    addButton.style.display = 'none';
                }
            });
        });
</script>

@endsection
