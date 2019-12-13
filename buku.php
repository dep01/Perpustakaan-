<html>
<head>
</head>
<body>
<form action="" method="POST">
<table width="1200" border="2" align="center">
    <tr>
        <td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
    </tr>
    <tr>
        <td width = "100" align="center">
        <ul>
            <a href="anggota.php" style="text-decoration: none;">Anggota</a> ||
            <a href="buku.php" style="text-decoration: none;">Buku</a> ||
            <a href="petugas.php" style="text-decoration: none;">Petugas</a> ||
            <a href="pinjam.php" style="text-decoration: none;">Peminjaman Buku</a> ||
            <a href="pengembalian.php" style="text-decoration: none;">Pengembalian Buku</a> 
        <ul>
        </td>
    </tr>
    <tr>
        <td width="500" align="center">
            <a href="input_buku.php?proses=<?php echo 'insert'; ?>" style="text-decoration: none;">Input Buku</a> ||
            <a href="input_penerbit.php?proses=<?php echo 'insert'; ?>" style="text-decoration: none;">Input Penerbit</a> || 
            <a href="input_Jbuku.php?proses=<?php echo 'insert'; ?>" style="text-decoration: none;">Input Jenis Buku</a>
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
    </tr>
<tbody>
<?php

include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
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
            <a href="input_buku.php?id=<?php echo $d["idBuku"];?>&proses=update" style="text-decoration: none;">Ubah</a> | 
            <a href="proses_buku.php?id=<?php echo $d["idBuku"];?>&proses=delete" style="text-decoration: none;">Hapus</a>
        </td> 
	</tr>
<?php }	?>
</tbody>
</table>
    <tr>
        <td colspan="2" align="right">
            <button>
                <a href="daftar.php" style="text-decoration:none;">Daftar</a>
            </button>
            <button>
                <a href="logout.php" style="text-decoration:none;">Logout</a>
            </button>
        </td>
    </tr>
</table>
</form>
</body>
</html>