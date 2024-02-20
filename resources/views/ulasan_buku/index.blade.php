@extends('template_back.layout')

@section('isi')

	<!-- main-content-body -->
    <div class="main-content-body">
        <!-- row -->
        <div class="row row-sm ">
            <div class="col-md-12 col-xl-12">
                <div class="card overflow-hidden review-project">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-10">Ulasan Buku</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                            <div class="col-md-6">
                            <div class="d-flex my-auto btn-list justify-content-end">
                                <a href="{{ route('ulasan_buku/input')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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

                        <div class="table-responsive mb-0">
                            <table class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Buku</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($ulasanbuku as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->user->username}}</td>
                                <td>{{$item->buku->judul}}</td>
                                <td>{{$item->ulasan}}</td>
                                <td>{{$item->rating}}</td>
                                <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('ulasan_buku_destroy', $item->id) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
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
        <!-- /row -->

        <!-- row -->

    </div>
    <!-- /row -->

@endsection
