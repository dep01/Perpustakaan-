<html>
<head>
</head>
<body>
<form action="" method="POST">
<table width="1000" border="2">
    <tr>
        <td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
    </tr>
    <tr>
        <td width = "200">
        <ul>
            <li><a href="">Anggota</a></li>
            <li><a href="">Buku</a></li>
            <li><a href="">Pinjam</a></li>
        <ul>
        </td>
        <td width="500">
            <a href="input.php?proses=<?php echo 'insert';?>">Input Buku</a>
            <table border="1" >
        <thead>  
          <tr>
            <th >No</th>
            <th >Judul Buku</th>
            <th >Jangka Waktu</th>
            <th >Denda Per-Hari</th>
            <th >Tanggal Terbit</th>
          </tr>
        </thead>
<tbody>
<?php 
include 'koneksi.php';
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM mbuku");
while($d = mysqli_fetch_array($data)){
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['judulBuku']; ?></td>
        <td><?php echo $d['jangkaWaktu']; ?></td>
	    <td><?php echo $d['dendaPerhari']; ?></td>
	    <td><?php echo $d['tglTerbit']; ?></td>
        <td>
            <a href="input.php?id=<?php echo $d["idBuku"];?>&proses=update">Ubah</a> | <a href="hapus.php">Hapus</a>
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