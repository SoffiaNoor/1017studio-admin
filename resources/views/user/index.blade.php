@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="px-3" style="color:black">User
                        </h3>
                        <hr class="ms-3 mt-0" style="background-color:#1c1c1c;height:10px;border-radius:40px;width:50%">
                    </div>
                </div>
                @if (count($user) > 0)
                <div class="table-responsive">
                    @if (count($errors) > 0)
                    <div
                        class="alert alert-danger shadow border-radius-xl p-2 border-none text-white font-weight-bolder flex flex-col ">
                        <strong>Sorry ! There were some problems with your input.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success shadow border-radius-xl text-white font-weight-bolder">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger shadow border-radius-xl text-white font-weight-bolder">
                        {{ session('error') }}
                    </div>
                    @endif
                    <table class="table align-items-center mb-0" style="color:black">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">No.</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Photo Profile</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Username</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody style="color:black">
                            @foreach ($user as $u)
                            <tr>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ ($user->currentPage() - 1) * $user->perPage() +
                                            $loop->iteration }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($u->photo_profile)
                                        <img class="object-contain items-center"
                                            style="width:4rem;height:4rem;object-fit:cover;border-radius:50%"
                                            src="{{ $u->photo_profile }}">
                                        @else
                                        <img class="object-contain items-center"
                                            style="width:4rem;height:4rem;object-fit:cover;border-radius:50%"
                                            src="{{ asset('assets/img/no-photo.png') }}">
                                        @endif
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ $u->name }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ $u->email }}
                                        </span>
                                    </div>
                                </td>
                                @if(Auth::id() == $u->id)
                                <td class="text-right">
                                    <a href="{{ route('user.show', $u->id) }}"><i
                                            class="fa fa-eye text-sm"></i></a>
                                    <a href="{{ route('user.edit', $u->id) }}"><i class="fas fa-edit text-sm mx-3"></i></a>
                                </td>
                                @else
                                <td>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end pt-4">
                            @if ($user->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $user->previousPageUrl() }}" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:;" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @endif

                            @for ($i = 1; $i <= $user->lastPage(); $i++)
                                <li class="page-item {{ $i == $user->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $user->url($i) }}"
                                        style="{{ $i == $user->currentPage() ? 'color:white;background-color:#1c1c1c;border:none' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor

                                @if ($user->currentPage() < $user->lastPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $user->nextPageUrl() }}">
                                            <i class="fa fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript:;">
                                            <i class="fa fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    @endif
                        </ul>
                    </nav>
                </div>
                @else
                <div class="alert alert-info shadow border-radius-xl text-white font-weight-bolder">
                    Tabel masih kosong.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection

@section('jquery')

@endsection