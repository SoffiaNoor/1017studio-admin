@extends('layouts.master')

@section('content')
<style>
    @media screen and (min-width: 1024px) {
        .bootstrap-select>.dropdown-toggle {
            width: 400% !important;
        }
    }
</style>
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder" style="color:black">Update Content News</h5>
                    <hr style="background-color:#1c1c1c;height:10px;border-radius:40px;width:25%">
                </div>
                <input type="hidden" name="id" value="{{ $news->id }}">
                <form class="p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">News Category</label>
                                <br>
                                <select class="selectpicker" multiple data-live-search="true"
                                    style="width:100%!important" name="berita_tag[]" disabled>
                                    @foreach ($tagNews as $tb)
                                    <option value="{{$tb->id}}" {{ in_array($tb->id, explode(',', $news->berita_tag))
                                        ?
                                        'selected' : '' }}>{{$tb->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $news->title }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Author</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    value="{{ $news->author }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Photo</label>
                                <div class="grid grid-cols-6">
                                    <img id="image_display" class="object-cover"
                                        style="width:20rem;height:10rem;object-fit:cover"
                                        src="{{ asset($news->photo) }}" alt="image description">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Description</label>
                                <div class="p-3" style="background-color: #e9ecef;border-radius: 20px;border: solid;
                                border-width: 1px;
                                border-color: #ced4da;">
                                    <p class="ms-1 leading-normal text-sm text-justify"
                                        style="color:#1c1c1c;text-indent:2rem">{!! $news->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/news" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i></a>
                                <a href="/news" class="btn-inner--text text-white ms-2">Kembali</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-success"
                                style="background: linear-gradient(45deg, #525151, #1c1c1c)" type="submit">
                                <a class="btn-inner--icon text-white"><i class="fa fa-save" aria-hidden="true"></i></a>
                                <a href="{{ route('news.edit',$news->id)}}"
                                    class="btn-inner--text text-white ms-2">Edit</a>
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