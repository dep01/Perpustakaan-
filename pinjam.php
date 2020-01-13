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

        <a href="input_peminjaman.php?proses=<?php echo 'insert';?>" style="text-decoration: none;">+Input Peminjaman</a>

        <br>
        <br>

        <table class="table table-bordered" border="3">
          <tr>
            <th>No</th>
            <th>Nomor Peminjaman</th>
            <th>Nama Anggota</th>
            <th>Nama Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>NIK Petugas</th>
            <td>Status</td>
          </tr>

<tbody>
<?php 
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$no = 1;
$data = mysqli_query($conn, "SELECT *,A.status as statusPinjam FROM tblpeminjaman A INNER JOIN manggota B ON A.idAnggota = B.idAnggota INNER JOIN mbuku C ON A.idBuku = C.idBuku");
while($d = mysqli_fetch_array($data)){
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d["nomorPinjaman"]; ?></td>
        <td><?php echo $d['namaAnggota']; ?></td>
	    <td><?php echo $d['judulBuku']; ?></td>
        <td><?php echo $d['tglPinjam'] ?></td>
	    <td><?php echo $d['NIK']; ?></td>
        <td><?php echo $d["statusPinjam"]; ?></td>
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