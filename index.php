<html>
<head>
</head>
<body>
<form action="" method="POST">
<table width="1400" border="2">
    <tr>
        <td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
    </tr>
    <tr>
        <td width = "100">
        <ul>
            <li><a href="">Anggota</a></li>
            <li><a href="buku.php">Buku</a></li>
            <li><a href="">Pinjam</a></li>
            <li><a href="petugas.php">Petugas</a></li>
        <ul>
        </td>
        <td width="500">
            <a href="input_anggota.php?proses=<?php echo 'insert';?>">Input Anggota</a>
            <table border="1" >
        <thead>  
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Aksi</th>
          </tr>
        </thead>
<tbody>
<?php 
include 'koneksi.php';
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM manggota A INNER JOIN mjkelamin B ON A.idJkelamin = B.idJkelamin");
while($d = mysqli_fetch_array($data)){
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['namaAnggota']; ?></td>
        <td><?php echo $d['jenisKelamin']; ?></td>
	    <td><?php echo $d['alamat']; ?></td>
	    <td><?php echo $d['noHP']; ?></td>
        <td>
            <a href="input_anggota.php?id=<?php echo $d["idAnggota"];?>&proses=update">Ubah</a> | <a href="hapus.php">Hapus</a>
        </td> 
	</tr>
<?php }	?>
</tbody>
</table>
    </td>
    </tr>
        <tr>
            <td colspan="2" align="center"><br></td>
        </tr>
</table>
</form>
</body>
</html>