<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
</head>
<body>

    
        <div class="card">
            <div class="card-body">

    <style type="text/css">
        .pagination li{
            float: left;
            list-style-type: none;
            margin: 5px;
        }
    </style>

    <h1>Sistem Informasi Perpustakaan</h1>
    <div class="form-grup"></div>
    <form action="" method="POST" class="form-inline">
    </form>

        <a href="anggota.php" class="btn btn-primary ml-1" style="text-decoration: none;">Anggota</a>
        <a href="buku.php" class="btn btn-primary ml-1" style="text-decoration: none;">Buku</a>
        <a href="petugas.php" class="btn btn-primary ml-1" style="text-decoration: none;">Petugas</a>
        <a href="pinjam.php" class="btn btn-primary ml-1" style="text-decoration: none;">Peminjaman Buku</a>
        <a href="pengembalian.php" class="btn btn-primary ml-1" style="text-decoration: none;">Pengembalian Buku</a>

        <br>
        <br>
    
        <a href="input_buku.php?proses=<?php echo 'insert'; ?>" style="text-decoration: none;">+Input Buku</a><br>
        <a href="input_penerbit.php?proses=<?php echo 'insert'; ?>" style="text-decoration: none;">+Input Penerbit</a><br>
        <a href="input_Jbuku.php?proses=<?php echo 'insert'; ?>" style="text-decoration: none;">+Input Jenis Buku</a><br>
        <a href="input_rakbuku.php?proses=<?php echo 'insert'; ?>" style="text-decoration: none;">+Input Rak Buku</a>

        <br>
        <br>

        <table class="table table-bordered" border="3"> 
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
            <a class="btn btn-warning btn-sm" href="input_buku.php?id=<?php echo $d["idBuku"];?>&proses=update" style="text-decoration: none;">Ubah</a>
            <a class="btn btn-danger btn-sm" href="proses_buku.php?id=<?php echo $d["idBuku"];?>&proses=delete" style="text-decoration: none;">Hapus</a>
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