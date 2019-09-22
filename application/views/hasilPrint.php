<!DOCTYPE html>
<head>
<style>
	h1{
		text-align:center;
	}
	table{
		margin:0 auto;
		
	}
	td{
		padding:5px 10px;
	}
</style>
</head>
<body>
	<h1>Print Anggota</h1>
	<table border=1>
		<tbody>
			<tr>
				<td>Nama</td>
				<td><?= $nama ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?= $alamat ?></td>
			</tr>
			<tr>
				<td>Ktp</td>
				<td><?= $ktp ?></td>
			</tr>
			<tr>
				<td>KK</td>
				<td><?= $kk ?></td>
			</tr>
		</tbody>
	</table>
</body>
</html>