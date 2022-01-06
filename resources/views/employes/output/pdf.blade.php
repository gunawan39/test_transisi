<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Employees</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Company</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($employes as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $p->nama }}</td>
				<td>{{ $p->email }}</td>
				<td>{{ $p->company }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>