@extends('template_back.layout')

@section('isi')

<!-- container opened -->
<div class="container">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Form Edit Peminjaman</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('data-peminjaman')}}">Data Peminjaman</a></li>
                    <li class="breadcrumb-item text-white active">Form Input Pengguna</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /breadcrumb -->
    <div class="row row-sm">
        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Form Edit Data Peminjaman
                    </div>
                    <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                    <!-- message info -->
                    @include('_component.message')
                    <div class="pd-10 pd-sm-20 bg-gray-100">
                    <form action="{{ route('data-peminjaman_update', $peminjaman->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Nama</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <select class="form-control select2" name="user_id">
                                                @php 
                                                $peminjaman = DB::table('users')->select('*')->orderBy('username','ASC')->get(); 
                                                @endphp
                                                <option value="">=== pilih ===</option>
                                                @foreach($peminjaman as $key => $val)
                                                <option value="{{$val->id}}" @if(old("user_id")==$val->id) selected @endif>{{$val->username}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" placeholder="" type="text" name="user_id" value="{{old('user_id')}}">
                                        </div> --}}
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Buku</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <select class="form-control select2" name="buku_id">
                                                @php 
                                                $buku = DB::table('buku')->select('*')->orderBy('judul','ASC')->get(); 
                                                @endphp
                                                <option value="">=== pilih ===</option>
                                                @foreach($buku as $key => $val)
                                                <option value="{{$val->id}}" @if(old("buku_id")==$val->id) selected @endif>{{$val->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" placeholder="" type="text" name="buku_id" value="{{old('buku_id')}}">
                                        </div> --}}
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Tanggal Peminjaman </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" placeholder="" type="date" name="TaggalPeminjaman" value="{{old('TaggalPeminjaman')}}">
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Tanggal Pengembalian </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" placeholder="" type="date" name="TaggalPengembalian" value="{{old('TaggalPengembalian')}}">
                                        </div>
                                    </div>
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Status Peminjaman </label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" placeholder="" type="text" name="StatusPeminjaman" value="{{old('StatusPeminjaman')}}">
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <button type="submit" class="float-right btn btn-primary pd-x-30 mg-e-5 mg-t-5"><i id="msg_formEdit"></i>&nbsp;&nbsp;<i class='fa fa-save'></i> Simpan</button>
                        <a href="{{route('data-peminjaman')}}" class="btn btn-secondary pd-x-30 mg-t-5"><i class='fa fa-chevron-left'></i> Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection