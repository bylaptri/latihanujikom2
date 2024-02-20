<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pengguna</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
		table tr th{
			font-weight:bold;
			text-align:center;
			background:#f4f4f4;
		}
	</style>
	<center>
		<h4>DATA PENGGUNA</h4>
		<p>Waktu Export : {{date('d-m-Y H:i')}}</p>
	</center>
 
	<table class='table table-bordered'>
		<thead>
		<tr>
            <th width="20px">No</th>
            <th width="20px">Username</th>
            <th width="180px">Email</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Hak Akses</th>
		</tr>
		</thead>
		<tbody>
		@php $no=1; @endphp
		@if(count($user))
		@foreach($user as $dt)
			<tr>
				<td>{{$no++}}</td>
                <td>{{$dt->username??''}}</td>
                <td>{{$dt->email??''}}</td>
                <td>{{$dt->namaLengkap??''}}</td>
                <td>{{$dt->alamat??''}}</td>
                <td>{{$dt->role??''}}</td>
			</tr>
		@endforeach
		@endif
		</tbody>
	</table>
 
</body>
</html>