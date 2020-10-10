<html>
<head>
	<title>IMPORT EXCEL CI 3</title>
</head>
<body>
	<h1>Data Siswa</h1><hr>
	<a href="<?php print_r base_url("Siswa/form"); ?>">Import Data</a><br><br>

	<table border="1" cellpadding="8">
	<tr>
		<th>NIS</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
	</tr>

	<?php
	if( ! empty($siswa)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa dari controller
			print_r "<tr>";
			print_r "<td>".$data->nis."</td>";
			print_r "<td>".$data->nama."</td>";
			print_r "<td>".$data->jenis_kelamin."</td>";
			print_r "<td>".$data->alamat."</td>";
			print_r "</tr>";
		}
	}else{ // Jika data tidak ada
		print_r "<tr><td colspan='4'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</body>
</html>
