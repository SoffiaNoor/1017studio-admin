@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder" style="color:black">Edit Content Portfolio

                    </h5>
                    <hr style="background-color:#1c1c1c;height:10px;border-radius:40px;width:25%">
                </div>
                @if(session('error'))
                <div class="alert alert-danger m-2" style="color:white;font-weight:bold">
                    {{ session('error') }}
                </div>
                @endif
                <form class="p-3" method="POST" action="{{ route('portfolio.update',$portfolio->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Name</label>
                                <input type="text" value="{{ $portfolio->name }}" class="form-control" id="name"
                                    name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Portfolio Type</label>
                                <select id="countries" name="jenis_tag_id" required
                                    class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5">
                                    <option selected value="{{$tagJenis->id}}">{{$tagJenis->jenis}}</option>
                                    @foreach ($tagJenisPortfolio as $tj)
                                    <option value="{{ $tj->id }}">{{$tj->jenis}}</option>
                                    @endforeach
                                </select>
                                @error('jenis_tag_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Image</label>
                                <div class="grid grid-cols-6">
                                    @if($portfolio->image)
                                    <div class="p-3 shadow-lg text-center"
                                        style="background-color: #c7c7c7;border-radius:20px">
                                        <img id="image_display" class="object-contain items-center"
                                            style="width:auto;height:10rem;object-fit:cover"
                                            src="{{asset($portfolio->image)}}">
                                    </div>
                                    @else
                                    <div class="p-3 shadow-lg text-center"
                                        style="background-color: #c7c7c7;border-radius:20px">
                                        <img id="image_display" class="object-contain items-center"
                                            style="width:10rem;height:10rem;object-fit:cover"
                                            src="{{ asset('assets/img/no-photo.png') }}">
                                    </div>
                                    @endif
                                </div>
                                <input type="file" class="form-control mt-3" id="file_input" name="image"
                                    value="">
                                <small class="text-muted">Please choose an image to upload.</small>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ $portfolio->description }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/portfolio" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i>
                                </a>
                                <a href="/portfolio" class="btn-inner--text text-white ms-2">Kembali</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-success" type="submit">
                                <a class="btn-inner--icon text-white"><i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a class="btn-inner--text text-white ms-2">Update</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
</div>
@endsection

@section('jquery')
<script>
    const fileInput = document.getElementById('file_input');
    const imageDisplay = document.getElementById('image_display');

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imageDisplay.src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    });
</script>
@endsection