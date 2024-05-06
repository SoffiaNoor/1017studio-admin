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
                    <h5 class="font-weight-bolder" style="color:black">Update Contact</h5>
                    <hr style="background-color:#1c1c1c;height:10px;border-radius:40px;width:25%">
                </div>
                @if(session('error'))
                <div class="alert alert-danger m-2" style="color:white;font-weight:bold">
                    {{ session('error') }}
                </div>
                @endif
                <form class="p-3" method="POST" action="{{ route('contact.update', $contact->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <td class="text-default text-xs font-weight-bolder">
                        <div class="d-flex align-items-center">
                            <select class="form-select form-select-sm" aria-label="Status" id="status{{$contact->id}}" name="status">
                                <option value="0" {{$contact->status == 0 ? 'selected' : ''}}>PENDING</option>
                                <option value="1" {{$contact->status == 1 ? 'selected' : ''}}>DONE</option>
                                <option value="2" {{$contact->status == 2 ? 'selected' : ''}}>ON PROGRESS</option>
                                <option value="-1" {{$contact->status != 0 && $contact->status != 1 && $contact->status
                                    != 2 ? 'selected'
                                    : ''}}>UNKNOWN STATUS</option>
                            </select>
                        </div>
                    </td>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $contact->first_name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="color:black">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="first_name"
                                    value="{{ $contact->last_name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $contact->email }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Whatsapp Number</label>
                                <input type="text" class="form-control" id="nomor_wa" name="nomor_wa"
                                    value="{{ $contact->nomor_wa }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color:black">Message</label>
                                <textarea type="text" class="form-control" style="height:300px" id="pesan" name="pesan"
                                    readonly>{{ $contact->pesan }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/contact" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i></a>
                                <a href="/contact" class="btn-inner--text text-white ms-2">Kembali</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-success"
                                style="background: linear-gradient(45deg, #525151, #1c1c1c)" type="submit">
                                <a class="btn-inner--icon text-white"><i class="fa fa-save" aria-hidden="true"></i></a>
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