@extends('template_back.layout')
<title> Koleksi </title>
@section('isi')

 <!-- breadcrumb -->
 <div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Form Koleksi Buku</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('koleksi')}}">Koleksi Buku</a></li>
                <li class="breadcrumb-item text-white active">Form koleks Buku</li>
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
                        <h4 class="card-title mg-b-10">Koleksi Buku</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex my-auto btn-list justify-content-end">
                            <a href="{{ route('koleksi/input')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                        <label class="form-labe l mt-2 mb-0">Kategori Buku</label>
                        <select id="f1" class="form-control select2" onchange="reload_table()">
                            @php $db = DB::table('bukus')->select('*')->orderBy('judul','ASC')->get(); @endphp
                            <option value="">=== semua ===</option>
                            @foreach($db as $key => $val)
                            <option value="{{$val->id}}" @if(request()->get('f1')==$val->id) selected @endif>{{$val->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                <hr>
                <div class="table-responsive">
                    <table id="basic-datatable" class="table table-sm table-striped table-bordered tx-14" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Buku</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php $no=1; @endphp --}}
                            @foreach ($koleksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->user->username??''}}</td>
                                <td>{{$item->bukus->judul??''}}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
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

<script>
       $(function() {
                // formelement
                $('.select2').select2({ width: 'resolve' });

                // init datatable.
                $('#basic-datatable').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });

            });
</script>

@endsection
