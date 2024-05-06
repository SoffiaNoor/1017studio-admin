@extends('layouts.master')

@section('content')
<div class="container-fluid px-3 pt-1">
    @if($loggedInUser)
    <h4 class="text-white font-weight-bolder">Selamat Datang, <span style="color:#d4bd0b">{{ ucfirst($loggedInUser->name) }}</span></h4>
    @endif
    {{-- <div class="row">
        <div class="col-sm-4 mt-2" data-aos="fade-up" data-aos-delay="300" data-aos-easing="ease-in-sine">
            <div class="info-horizontal border-radius-xl p-3" style="background: linear-gradient(45deg, #525151, #2a2a2a)">
                <div class="icon">
                    <i class="fa fa-book text-2xl text-white mt-1"></i>
                </div>
                <div class="description ps-5">
                    <h6 class="text-white font-weight-bolder">Jumlah Mahasiswa RUNGKAD</h6>
                    <h2 class="text-white"
                        style="background: linear-gradient(to right, #ffffffc9, #f1f8ff);-webkit-text-fill-color: transparent;-webkit-background-clip: text;">
                        {{ \App\Models\User::count() }}
                    </h2>
                    <hr class="m-0" style="background-color:#ffffff;height:10px;border-radius:40px;width:50%">
                    <a href="/mahasiswa" class="text-light icon-move-right font-weight-bolder"
                        style="font-style:italic">
                        Lihat lebih lanjut
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-2" data-aos="fade-up" data-aos-delay="300" data-aos-easing="ease-in-sine">
            <div class="info-horizontal border-radius-xl p-3" style="background: linear-gradient(45deg, #525151, #2a2a2a)">
                <div class="icon">
                    <i class="fa fa-book text-2xl text-white mt-1"></i>
                </div>
                <div class="description ps-5">
                    <h6 class="text-white font-weight-bolder">Jumlah Mahasiswa RUNGKAD</h6>
                    <h2 class="text-white"
                        style="background: linear-gradient(to right, #ffffffc9, #f1f8ff);-webkit-text-fill-color: transparent;-webkit-background-clip: text;">
                        {{ \App\Models\User::count() }}
                    </h2>
                    <hr class="m-0" style="background-color:#ffffff;height:10px;border-radius:40px;width:50%">
                    <a href="/mahasiswa" class="text-light icon-move-right font-weight-bolder"
                        style="font-style:italic">
                        Lihat lebih lanjut
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-2" data-aos="fade-up" data-aos-delay="300" data-aos-easing="ease-in-sine">
            <div class="info-horizontal border-radius-xl p-3" style="background: linear-gradient(45deg, #525151, #2a2a2a)">
                <div class="icon">
                    <i class="fa fa-book text-2xl text-white mt-1"></i>
                </div>
                <div class="description ps-5">
                    <h6 class="text-white font-weight-bolder">Jumlah Mahasiswa RUNGKAD</h6>
                    <h2 class="text-white"
                        style="background: linear-gradient(to right, #ffffffc9, #f1f8ff);-webkit-text-fill-color: transparent;-webkit-background-clip: text;">
                        {{ \App\Models\User::count() }}
                    </h2>
                    <hr class="m-0" style="background-color:#ffffff;height:10px;border-radius:40px;width:50%">
                    <a href="/mahasiswa" class="text-light icon-move-right font-weight-bolder"
                        style="font-style:italic">
                        Lihat lebih lanjut
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@endsection

@section('jquery')

@endsection