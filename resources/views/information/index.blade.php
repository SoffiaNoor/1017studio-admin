@extends('layouts.master')

@section('content')
<div class="card shadow-lg mx-4 card-profile-top">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
                @if($information->logo_favicon)
                <div id="image_display" class="avatar avatar-xl position-relative">
                    <img src="{{asset($information->logo_favicon)}}" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
                @else
                <div id="image_display" class="avatar avatar-xl position-relative">
                    <img src="{{ asset('assets/img/no-photo.png') }}" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
                @endif
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1 font-weight-bolder" style="color:black">
                        {{$information->name}}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm" style="color:black">
                        {{$information->slogan}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    @if(session('error'))
    <div class="alert alert-danger m-2" style="color:white;font-weight:bold">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success font-weight-bolder" style="border:none;color:white">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('information.edit', $information->id) }}"
                            class="btn btn-primary btn-sm ms-auto"
                            style="background: linear-gradient(45deg, #525151, #1c1c1c);">Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <p class="ms-1 leading-normal text-sm text-justify"
                                    style="color:#1c1c1c;text-indent:2rem">{!! $information->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-uppercase text-sm font-weight-bolder" style="color:black">Contact Information</p>
                    <hr class="mt-0" style="background-color:#1c1c1c;height:10px;border-radius:40px;width:50%">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="color:black">Header Logo</label>
                                <div class="grid grid-cols-6">
                                    @if($information->logo_header)
                                    <div class="p-3 shadow-lg text-center"
                                        style="background-color: #535353;border-radius:20px">
                                        <img id="image_display" class="object-contain items-center"
                                            style="width:10rem;height:10rem;object-fit:cover"
                                            src="{{asset($information->logo_header)}}">
                                    </div>
                                    @else
                                    <img id="image_display" class="object-contain items-center"
                                        style="width:10rem;height:10rem;object-fit:cover"
                                        src="{{ asset('assets/img/no-photo.png') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="color:black">Favicon Logo</label>
                                <div class="grid grid-cols-6">
                                    @if($information->logo_favicon)
                                    <div class="p-3 shadow-lg text-center"
                                        style="background-color: #ffffff;border-radius:20px">
                                        <img id="image_display2" class="object-contain items-center"
                                            style="width:10rem;height:10rem;"
                                            src="{{asset($information->logo_favicon)}}">
                                    </div>
                                    @else
                                    <img id="image_display" class="object-contain items-center"
                                        style="width:10rem;height:10rem;object-fit:cover"
                                        src="{{ asset('assets/img/no-photo.png') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="color:black">Company Logo</label>
                                <div class="grid grid-cols-6">
                                    @if($information->logo_company)
                                    <div class="p-3 shadow-lg text-center"
                                        style="background-color: #ffffff;border-radius:20px">
                                        <img id="image_display3" class="object-contain items-center"
                                            style="width:10rem;height:10rem;"
                                            src="{{asset($information->logo_company)}}">
                                    </div>
                                    @else
                                    <img id="image_display3" class="object-contain items-center"
                                        style="width:10rem;height:10rem;object-fit:cover"
                                        src="{{ asset('assets/img/no-photo.png') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>About Us Image</label>
                                <div class="grid grid-cols-6">
                                    @if($information->image)
                                    <div class="p-3 shadow-lg text-center"
                                        style="background-color: #c7c7c7;border-radius:20px">
                                        <img id="image_display3" class="object-contain items-center"
                                            style="width:auto;height:10rem;object-fit:cover"
                                            src="{{asset($information->image)}}">
                                    </div>
                                    @else
                                    <img id="image_display3" class="object-contain items-center"
                                        style="width:10rem;height:10rem;object-fit:cover"
                                        src="{{ asset('assets/img/no-photo.png') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Full Name:</label>
                                <input class="form-control" type="text" value="{{$information->name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Mobile</label>
                                <input class="form-control" type="text" value="+{{$information->phone}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email</label>
                                <input class="form-control" type="text" value="{{$information->email}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Address</label>
                                <input class="form-control" type="text" value="{{$information->address}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Location</label>
                                <div class="grid grid-cols-6">
                                    {!! $information->google_map !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <strong class="text-slate-700" style="color:black">Social:</strong> &nbsp;
                            <a class="ms-3" target="_blank" href="{{$information->link_wa}}">
                                <i class="fab fa-whatsapp fa-lg" style="color:black"></i>
                            </a>
                            <a class="ms-3" target="_blank" href="{{$information->instagram}}" target="___blank">
                                <i class="fab fa-instagram fa-lg" style="color:black"></i>
                            </a>
                            <a class="ms-3" target="_blank" href="{{$information->facebook}}" target="___blank">
                                <i class="fab fa-facebook fa-lg" style="color:black"></i>
                            </a>
                            <a class="ms-3" target="_blank" href="{{$information->twitter}}" target="___blank">
                                <i class="fab fa-twitter fa-lg" style="color:black"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')
<script>

</script>
@endsection