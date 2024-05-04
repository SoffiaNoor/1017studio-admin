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
                                <button class="btn btn-icon btn-3 mx-2"
                                    style="background: linear-gradient(45deg, #525151, #1c1c1c);float:right"
                                    type="button">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn-inner--icon text-white"><i class="fas fa-edit text-sm mx-3"
                                            aria-hidden="true"></i></a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn-inner--text text-white">Edit</a>
                                </button>
                            </div>
                        </div>
                    </div>
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input class="form-control" type="text" value="{{$user->name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email address</label>
                                <input class="form-control" type="email" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Address</label>
                                <input class="form-control" type="text" value="{{$user->address}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Phone Number</label>
                                <input class="form-control" type="number" value="{{$user->phone_number}}" readonly>
                            </div>
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