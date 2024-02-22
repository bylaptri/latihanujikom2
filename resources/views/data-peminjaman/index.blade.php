@extends('template_back.layout')
<title> Data Peminjam </title>
@section('isi')

 <!-- breadcrumb -->
 <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Form Data peminjaman</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('data-peminjaman')}}">Data peminjaman</a></li>
                <li class="breadcrumb-item text-white active">Form Data Peminjaman</li>
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
                        <h4 class="card-title mg-b-10">Data peminjaman</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex my-auto btn-list justify-content-end">
                            {{-- memanggil data dari controller class input --}}
                            <a href="{{ route('data-peminjaman/input')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label mt-2 mb-0">Kategori Buku</label> 
                        <select id="f1" class="form-control select2" onchange="reload_table()">
                            @php $db = DB::table('buku')->select('*')->orderBy('judul','ASC')->get(); @endphp
                            <option value="">=== semua ===</option>
                            @foreach($db as $key => $val)
                            <option value="{{$val->id}}" @if(request()->get('f1')==$val->id) selected @endif>{{$val->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                <hr>
                <div class="table-responsive">
                    <table id="tbl_list" class="table table-sm table-striped table-bordered tx-14" width="100%">
                        <thead>
                            <tr>
                                {{-- penaman kolom di index --}}
                                <th width="20px">No</th>
                                <th style="text-align:center">Nama</th>
                                <th style="text-align:center">Buku</th>
                                <th style="text-align:center">Tanggal Peminjaman</th>
                                <th style="text-align:center">Tanggal Pengembalian</th>
                                <th style="text-align:center">Status Peminjaman</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php $no=1; @endphp --}}
                            @foreach ($peminjaman as $item)
                            {{-- @php 
                             $peminjaman = DB::table('users')->select('*')->orderBy('username','ASC')->get(); 
                            @endphp --}}
                            {{-- @php 
                             $buku = DB::table('buku')->select('*')->orderBy('judul','ASC')->get(); 
                            @endphp --}}
                            <tr>
                                {{-- memanggil data base ke halaman colom index --}}
                                <td>{{ $loop->iteration }}</td>
                                <td style="text-align:center">{{$item->user->namaLengkap}}</td>
                                <td style="text-align:center">{{$item->buku->judul}}</td>
                                <td style="text-align:center">{{ $item->TaggalPeminjaman}}</td>
                                <td style="text-align:center">{{ $item->TaggalPengembalian}}</td>
                                <td style="text-align:center">{{ $item->StatusPeminjaman}}</td>
                                <td>
                                    {{-- penghapus data --}}
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('data-peminjaman_destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {{-- untuk mengedit --}}
                                        <a href="{{ route('data-peminjaman_edit', $item->id)}}" title="Edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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