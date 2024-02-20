@extends('template_back.layout')

<title> Kategori Buku </title>
@section('isi')

 <!-- breadcrumb -->
 <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Kategori</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('kategori')}}">Kategori Buku</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- /breadcrumb -->
<div class="row row-sm">
    <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
        <div class="card">

            <div class="pd-t-10 pd-s-10 pd-e-10 bg-white bd-b">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title mg-b-10">Kategori Buku</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex my-auto btn-list justify-content-end">
                            <a href="{{ route('kategori_input')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                             <button onclick="formImport()" class="btn btn-sm btn-secondary"><i class="fa fa-upload me-2"></i> Import</button>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-download me-2"></i>Export
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="exportExcel()">Excel</a>
                                    <a class="dropdown-item" href="javascript:void(0)" onclick="exportPdf()">PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- message info -->
                @include('_component.message')
                {{-- <div class="row">
                    <div class="col-md-3">
                        <label class="form-label mt-2 mb-0">Pilih Kategori</label>
                        <select id="f1" class="form-control select2" onchange="reload_table()">
                            <option value="">=== semua ===</option>
                            <option value="1" @if(request()->get('f1')==1) selected @endif>administrator</option>
                            <option value="2" @if(request()->get('f1')==2) selected @endif>operator</option>
                        </select>
                    </div>
                </div> --}}
                <hr>
                <div class="table-responsive">
                    <table id="tbl_list" class="table table-sm table-striped table-bordered tx-14" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriBuku as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_kategori}}</td>
                                <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori_destroy', $item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('kategori_update', $item->id)}}" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" title="Edit"></i></button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
