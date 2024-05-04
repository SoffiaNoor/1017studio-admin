@extends('layouts.master')

@section('content')
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
    <form action="{{ route('information.update',$information->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                          <h4 class="card-title title">Website Information</h4>
                          <div class="row mr-1">
                            <div class="d-flex justify-content-between align-items-center">
                              <a href="/information" class="btn btn-info text-white"><i
                                  class="bi bi-arrow-return-left mx-1"></i>Back</a>
                              <button class="btn btn-success mx-2" type="submit">
                                <i class="bi bi-pencil mx-1"></i>Save Changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="color:black">Header Logo</label>
                                    <div class="grid grid-cols-6">
                                        @if($information->logo_header)
                                        <div class="p-3 shadow-lg text-center"
                                            style="background-color: #222b3c;border-radius:20px">
                                            <img id="image_display" class="object-contain items-center"
                                                style="width:auto;height:10rem;object-fit:cover"
                                                src="{{asset($information->logo_header)}}">
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
                                    <input type="file" class="form-control mt-3" id="file_input" name="logo_header"
                                        value="">
                                    <small class="text-muted">Please choose an image to upload.</small>
                                    @error('logo_header')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="color:black">Favicon Logo</label>
                                    <div class="grid grid-cols-6">
                                        @if($information->logo_favicon)
                                        <div class="p-3 shadow-lg text-center"
                                            style="background-color: #c7c7c7;border-radius:20px">
                                            <img id="image_display2" class="object-contain items-center"
                                                style="width:auto;height:10rem;object-fit:cover"
                                                src="{{asset($information->logo_favicon)}}">
                                        </div>
                                        @else
                                        <div class="p-3 shadow-lg text-center"
                                            style="background-color: #c7c7c7;border-radius:20px">
                                            <img id="image_display2" class="object-contain items-center"
                                                style="width:10rem;height:10rem;object-fit:cover"
                                                src="{{ asset('assets/img/no-photo.png') }}">
                                        </div>
                                        @endif
                                    </div>
                                    <input type="file" class="form-control mt-3" id="file_input2" name="logo_favicon"
                                        value="">
                                    <small class="text-muted">Please choose an image to upload.</small>
                                    @error('logo_favicon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="color:black">Company Logo</label>
                                    <div class="grid grid-cols-6">
                                        @if($information->logo_company)
                                        <div class="p-3 shadow-lg text-center"
                                            style="background-color: #c7c7c7;border-radius:20px">
                                            <img id="image_display3" class="object-contain items-center"
                                                style="width:auto;height:10rem;object-fit:cover"
                                                src="{{asset($information->logo_company)}}">
                                        </div>
                                        @else
                                        <div class="p-3 shadow-lg text-center"
                                            style="background-color: #c7c7c7;border-radius:20px">
                                            <img id="image_display3" class="object-contain items-center"
                                                style="width:10rem;height:10rem;object-fit:cover"
                                                src="{{ asset('assets/img/no-photo.png') }}">
                                        </div>
                                        @endif
                                    </div>
                                    <input type="file" class="form-control mt-3" id="file_input3" name="logo_company"
                                        value="">
                                    <small class="text-muted">Please choose an image to upload.</small>
                                    @error('logo_company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color:black">About Us Image</label>
                                    <div class="grid grid-cols-6">
                                        @if($information->image)
                                        <div class="p-3 shadow-lg text-center"
                                            style="background-color: #c7c7c7;border-radius:20px">
                                            <img id="image_display4" class="object-contain items-center"
                                                style="width:auto;height:10rem;object-fit:cover"
                                                src="{{asset($information->image)}}">
                                        </div>
                                        @else
                                        <div class="p-3 shadow-lg text-center"
                                            style="background-color: #c7c7c7;border-radius:20px">
                                            <img id="image_display4" class="object-contain items-center"
                                                style="width:10rem;height:10rem;object-fit:cover"
                                                src="{{ asset('assets/img/no-photo.png') }}">
                                        </div>
                                        @endif
                                    </div>
                                    <input type="file" class="form-control mt-3" id="file_input4" name="image" value="">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Company Name" value="{{$information->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Company Slogan</label>
                                    <input type="text" name="slogan" id="slogan" class="form-control"
                                        placeholder="Company Slogan" value="{{$information->slogan}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="10" name="description" id="description" cols="80"
                                        class="form-control"
                                        placeholder="Company Description">{{$information->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Home Address"
                                        value="{{$information->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="City"
                                        value="{{$information->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="First phone number" value="{{$information->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link Instagram</label>
                                    <input type="url" name="instagram" class="form-control"
                                        placeholder="Your instagram" value="{{$information->instagram}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link Twitter</label>
                                    <input type="url" name="twitter" class="form-control"
                                        placeholder="Your twitter" value="{{$information->twitter}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link Facebook</label>
                                    <input type="url" name="facebook" class="form-control"
                                        placeholder="Your facebook" value="{{$information->facebook}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Google Map</label>
                                    <input type="text" name="google_map" class="form-control" placeholder="Home Address"
                                        value="{{$information->google_map}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Order Whatsapp Message</label>
                                    <input type="text" class="form-control" name="order_wa"
                                        placeholder="I want to order..." value="{{$information->order_wa}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Website Link</label>
                                    <input type="text" class="form-control" name="website_link"
                                        placeholder="I want to order..." value="{{$information->website_link}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('jquery')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    const fileInput2 = document.getElementById('file_input2');
    const imageDisplay2 = document.getElementById('image_display2');

    fileInput2.addEventListener('change', function() {
        if (fileInput2.files.length > 0) {
            const reader2 = new FileReader();
            reader2.onload = function(e) {
                imageDisplay2.src = e.target.result;
            };
            reader2.readAsDataURL(fileInput2.files[0]);
        }
    });

    const fileInput3 = document.getElementById('file_input3');
    const imageDisplay3 = document.getElementById('image_display3');

    fileInput3.addEventListener('change', function() {
        if (fileInput3.files.length > 0) {
            const reader3 = new FileReader();
            reader3.onload = function(e) {
                imageDisplay3.src = e.target.result;
            };
            reader3.readAsDataURL(fileInput3.files[0]);
        }
    });

    const fileInput4 = document.getElementById('file_input4');
    const imageDisplay4 = document.getElementById('image_display4');

    fileInput4.addEventListener('change', function() {
        if (fileInput4.files.length > 0) {
            const reader4 = new FileReader();
            reader4.onload = function(e) {
                imageDisplay4.src = e.target.result;
            };
            reader4.readAsDataURL(fileInput4.files[0]);
        }
    });
</script>
@endsection