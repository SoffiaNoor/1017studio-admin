@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder" style="color:black">Data: {{ $portofolio->id }}
                    </h5>
                    <hr style="background-color:#1c1c1c;height:10px;border-radius:40px;width:25%">
                </div>
                <div class="ms-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Name</label>
                                <input type="text" value="{{ $portofolio->name }}" class="form-control" id="name"
                                    name="name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Portfolio Type</label>
                                @if($tagJenis)
                                <input type="text" value="{{$tagJenis->jenis}}" id="fname" name="jenis_tag_id"
                                    class="form-control" readonly>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Image</label>
                                <div class="grid grid-cols-6">
                                    <img id="image_display" class="object-cover"
                                        style="width:10rem;height:10rem;object-fit:cover"
                                        src="{{asset($portofolio->image)}}" alt="image description">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ $portofolio->description }}" readonly>
                            </div>
                        </div>
                    </div>
                    @if($portofolio->jenis_tag_id == 2)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Url (For Website Only)</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    value="{{ $portofolio->url }}" readonly>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/portfolio" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i>
                                </a>
                                <a href="/portfolio" class="btn-inner--text text-white ms-2">Kembali</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-success"
                                style="background: linear-gradient(45deg, #525151, #1c1c1c)" type="submit">
                                <a class="btn-inner--icon text-white"><i class="fa fa-save" aria-hidden="true"></i>
                                </a>
                                <a  href="{{ route('portfolio.edit',$portofolio->id)}}" class="btn-inner--text text-white ms-2">Edit</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
@endsection