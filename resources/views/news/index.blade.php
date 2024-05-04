@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="px-3" style="color:black">Content News
                        </h3>
                        <hr class="ms-3 mt-0" style="background-color:#1c1c1c;height:10px;border-radius:40px;width:50%">
                    </div>
                    <div class="col-sm-6"> <a class="btn btn-warning text-white" href="{{route('news.create')}}"
                            style="float:right;background: linear-gradient(45deg, #525151, #1c1c1c)">
                            <span>Tambah Data</span>
                            <i class="fa fa-plus ms-2"></i>
                        </a>
                    </div>
                </div>
                @if (count($berita) > 0)
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
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Title</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Description</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody style="color:black">
                            @foreach ($berita as $p)
                            <tr>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ ($berita->currentPage() - 1) * $berita->perPage() +
                                            $loop->iteration }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ $p->title }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {!! substr($p->description,0,30).'...' !!}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        @if($p->image)
                                            <img class="object-contain items-center" style="width:8rem;height:8rem;object-fit:cover" src="{{ $p->image }}">
                                        @else
                                            <img class="object-contain items-center" style="width:8rem;height:8rem;object-fit:cover" src="{{ asset('assets/img/no-photo.png') }}">
                                        @endif
                                    </div>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="{{ route('portfolio.show', $p->id) }}"
                                        class="text-gray-400 hover:text-amber-400  mr-2" style="color:black">
                                        <i class="fa fa-eye text-sm"></i>
                                    </a>
                                    <a href="{{ route('portfolio.edit', $p->id) }}"
                                        class="text-gray-400 hover:text-amber-400 mx-2" style="color:black">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                    <a href="#" class="text-gray-400 hover:text-amber-400" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{$p->id}}" style="color:black">
                                        <i class="fa fa-trash text-sm"></i>
                                    </a>

                                    <div class="modal fade" id="deleteModal{{$p->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bolder" id="deleteModalLabel">
                                                        Delete Confirmation
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-sm">
                                                    Apakah anda yakin menghapus <span
                                                        class="font-weight-bolder">{{$p->name}}</span>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <form action="{{ route('portfolio.destroy', $p->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end pt-4">
                            @if ($berita->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $berita->previousPageUrl() }}" tabindex="-1">
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

                            @for ($i = 1; $i <= $berita->lastPage(); $i++)
                                <li class="page-item {{ $i == $berita->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $berita->url($i) }}"
                                        style="{{ $i == $berita->currentPage() ? 'color:white;background-color:#1c1c1c;border:none' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor

                                @if ($berita->currentPage() < $berita->lastPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $berita->nextPageUrl() }}">
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
                <div class="alert alert-info shadow border-radius-xl font-weight-bolder" style="background: linear-gradient(45deg, #ffe200, #d4bd0b);color:#1c1c1c">
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