@extends('template_back.layout')
<title> Form Update Kategori </title>
@section('isi')

<!-- container opened -->
<div class="container">

    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div>
            <h4 class="content-title mb-2">Form Input Buku</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('kategori')}}">Kategori Buku </a></li>
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
                        Form Input Data Buku
                    </div>
                    <p class="mg-b-20">Silahkan isi form di bawah ini dengan lengkap.</p>
                    <!-- message info -->
                    @include('_component.message')
                    <div class="pd-10 pd-sm-20 bg-gray-100">
                        <form action="{{ route('kategori_update')}}" method="post" enctype="multipart/form-data">

                            @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row row-xs align-items-center mg-b-20">
                                        <div class="col-md-3">
                                            <label class="form-label mg-b-0">Nama Kategori</label>
                                        </div>
                                        <div class="col-md-9 mg-t-5 mg-md-t-0">
                                            <input class="form-control" placeholder="" type="text" name="nama_kategori" value="{{old('nama_kategori')}}">
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <button type="submit" class="float-right btn btn-primary pd-x-30 mg-e-5 mg-t-5">
                            <i class='fa fa-save'></i> Simpan</button>
                        <a href="{{route('data-buku')}}" class="btn btn-secondary pd-x-30 mg-t-5">
                            <i class='fa fa-chevron-left'></i> Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /container -->

@endsection
