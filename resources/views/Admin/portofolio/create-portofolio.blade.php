@extends('layout.admin')
@section('content-title', 'Create Portofolio')
@section('content')
@section('judul', 'Create Portofolio')


<div class="card">
    <div class="card-body">
        <form action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row mb-4">
                    <div class="col-md-6 col-lg-12">
                        <p style="font-weight: bold">Nama Project</p>
                        <input type="text" placeholder="Eagle Eye" class="form-control mb-3" name="project" id="project" required>
                        <p style="font-weight: bold">Deskripsi</p>
                        <textarea name="deskripsi" class="form-control mb-3" id="deskripsi" cols="30" rows="5"></textarea>
                        <p style="font-weight: bold">Services : </p>
                        <select class="form-control form-select text-capitalize" name="services_id">
                            <option value="">Pilih Services</option>
                            @foreach($services as $s)
                            <option value="{{$s->id}}">{{$s->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                    </div>
                </div>

                
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="illustration" name="cover"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    <img id="preview" src="#" class="form-control">
                  </div>
                  
                <div class="row" id="screenshots-container">
                    <div class="col">
                        <div class="form-group">
                            <label for="illustration">Screenshot : </label>
                            <input type="file" name="foto[]" class="form-control screenshot-input" accept="image/jpeg, image/png" id="screenshot-illustration">
                            <img id="screenshot-preview" src="#" class="form-control" style="display: none;">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" id="add-screenshot" style="background-color: green;">Tambah Screenshot</button>
            </div>
            <br><br>
            <div class="row">
                <div class="col">
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

    #screenshot-preview {
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

    document.getElementById("screenshot-illustration").addEventListener("change", function() {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById("screenshot-preview");
            preview.src = reader.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(this.files[0]);
    });

    document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('screenshots-container');
            const addButton = document.getElementById('add-screenshot');
            let counter = 2;
            const maxScreenshots = 6;

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
                    newInput.classList.add('form-control', 'screenshot-input');
                    newInput.setAttribute('accept', 'image/jpeg, image/png');

                    newImg.id = 'screenshot-preview';
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
