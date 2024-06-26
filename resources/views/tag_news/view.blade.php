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
                    <h5 class="font-weight-bolder" style="color:black">Content FAQ</h5>
                    <hr style="background-color:#1c1c1c;height:10px;border-radius:40px;width:25%">
                </div>
                <input type="hidden" name="id" value="{{ $tag_news->id }}">
                <form class="p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Name</label>
                                <textarea type="text" class="form-control" style="height:100px" id="description"
                                    name="name" disabled>{{ $tag_news->name }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/tag_news" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i>
                                </a>
                                <a href="/tag_news" class="btn-inner--text text-white ms-2">Kembali</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-success"
                                style="background: linear-gradient(45deg, #525151, #1c1c1c)" type="submit">
                                <a class="btn-inner--icon text-white"><i class="fa fa-save" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('tag_news.edit',$tag_news->id)}}"
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