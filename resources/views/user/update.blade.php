@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-uppercase text-sm text-white font-weight-bolder bg-secondary p-3 rounded-start shadow"
                                    style="background: linear-gradient(45deg, #525151, #1c1c1c);border-radius:2rem">
                                    User
                                    Information</p>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-icon btn-3"
                                    style="background: linear-gradient(45deg, #525151, #1c1c1c);float:right"
                                    type="button">
                                    <a href="/user" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                            aria-hidden="true"></i></a>
                                    <a href="/user" class="btn-inner--text text-white ms-2">Kembali</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger m-2" style="color:white;font-weight:bold">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('user.update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color:black">Photo Profile</label>
                                    <div class="grid grid-cols-6">
                                        @if($user->photo_profile)
                                        <img id="image_display" class="object-contain items-center"
                                            style="width:10rem;height:10rem;object-fit:cover"
                                            src="{{asset($user->photo_profile)}}">
                                        @else
                                        <img id="image_display" class="object-contain items-center"
                                            style="width:10rem;height:10rem;object-fit:cover"
                                            src="{{ asset('assets/img/no-photo.png') }}">
                                        @endif
                                    </div>
                                    <input type="file" class="form-control mt-3" id="file_input" name="photo_profile"
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
                                    <label for="example-text-input" class="form-control-label">Username</label>
                                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email address</label>
                                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Address</label>
                                    <input class="form-control" type="text" name="address" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Phone Number</label>
                                    <input class="form-control" type="number" name="phone_number" value="{{$user->phone_number}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-icon btn-3 mx-2 text-white"
                                style="background: linear-gradient(45deg, #525151, #1c1c1c);float:right" type="submit">
                                <i class="fas fa-save text-sm mx-3 text-white" aria-hidden="true"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::id() == $user->id)
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="col-sm-6 py-4 px-4">
                    <p class="text-uppercase text-sm text-white font-weight-bolder bg-secondary p-3 rounded-start shadow"
                        style="background: linear-gradient(45deg, #525151, #1c1c1c);border-radius:2rem">
                        Change Password</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.changePassword', $user->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="current-password" class="col-md-4 col-form-label text-md-right">{{ __('Current
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" required autocomplete="current-password">

                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

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