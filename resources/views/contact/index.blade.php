@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="px-3" style="color:black">Contact
                        </h3>
                        <hr class="ms-3 mt-0" style="background-color:#1c1c1c;height:10px;border-radius:40px;width:50%">
                    </div>
                </div>
                @if (count($contact) > 0)
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
                    <table class="table align-items-center mb-0" style="color:black">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">No.</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Name</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Email</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Message</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody style="color:black">
                            @foreach ($contact as $p)
                            <tr>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ ($contact->currentPage() - 1) * $contact->perPage() +
                                            $loop->iteration }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{$p->first_name}}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{$p->email}}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {!! substr($p->pesan,0,30).'...' !!}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        @if($p->status == 0)
                                        <span class="ms-3 text-xs alert alert-warning text-white" role="alert">PENDING</span>
                                        @elseif($p->status == 1)
                                        <span class="ms-3 text-xs alert alert-success text-white" role="alert">DONE</span>
                                        @elseif($p->status == 2)
                                        <span class="ms-3 text-xs alert alert-info text-white" role="alert">ON PROGRESS</span>
                                        @else
                                        <span class="ms-3 text-xs alert alert-danger text-white" role="alert">UNKNOWN STATUS</span>
                                        @endif
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="{{ route('contact.show', $p->id) }}"
                                        class="text-gray-400 hover:text-amber-400  mr-2" style="color:black">
                                        <i class="fa fa-eye text-sm"></i>
                                    </a>
                                    <a href="{{ route('contact.update', $p->id) }}"
                                        class="text-gray-400 hover:text-amber-400 mx-2" style="color:black">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end pt-4">
                            @if ($contact->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $contact->previousPageUrl() }}" tabindex="-1">
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

                            @for ($i = 1; $i <= $contact->lastPage(); $i++)
                                <li class="page-item {{ $i == $contact->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $contact->url($i) }}"
                                        style="{{ $i == $contact->currentPage() ? 'color:white;background-color:#1c1c1c;border:none' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor

                                @if ($contact->currentPage() < $contact->lastPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $contact->nextPageUrl() }}">
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
                <div class="alert alert-info shadow border-radius-xl font-weight-bolder"
                    style="background: linear-gradient(45deg, #ffe200, #d4bd0b);color:#1c1c1c">
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