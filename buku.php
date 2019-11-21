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
            <li><a href="">Buku</a></li>
            <li><a href="">Pinjam</a></li>
            <li><a href="petugas.php">Petugas</a></li>
        <ul>
        </td>
        <td width="500">
            <a href="input_buku.php?proses=<?php echo 'insert';?>">Input Buku</a>
            <table border="1" >
        <thead>  
          <tr>
            <th>No</th>
            <th>Penerbit</th>
            <th>Jenis Buku</th>
            <th>Judul Buku</th>
            <th>Jangka Waktu</th>
            <th>Denda Per-Hari</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
          </tr>
        </thead>
<tbody>
<?php 
include 'koneksi.php';
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM mbuku A INNER JOIN mpenerbit B ON A.idPenerbit = B.idPenerbit INNER JOIN mjenisbuku C ON A.idJenisBuku = C.idJenisBuku where A.status = 1");
while($d = mysqli_fetch_array($data)){
?>
	<tr>
		<td><?php echo $no++; ?></td>
        <td><?php echo $d['namaPenerbit'];?></td>
        <td><?php echo $d['jenisBuku'];?></td>
		<td><?php echo $d['judulBuku']; ?></td>
        <td><?php echo $d['jangkaWaktu']; ?></td>
	    <td><?php echo $d['dendaPerhari']; ?></td>
	    <td><?php echo $d['tglTerbit']; ?></td>
        <td>
            <a href="input_buku.php?id=<?php echo $d["idBuku"];?>&proses=update">Ubah</a> | <a href="hapus.php">Hapus</a>
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