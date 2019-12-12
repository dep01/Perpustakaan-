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
            <a href="anggota.php">Anggota</a> ||
            <a href="buku.php">Buku</a> ||
            <a href="petugas.php">Petugas</a> ||
            <a href="pinjam.php">Peminjaman Buku</a> ||
            <a href="pengembalian.php">Pengembalian Buku</a>
        <ul>
        </td>
    </tr>
    <tr>
        <td width="500" align="center">
            <a href="input_peminjaman.php?proses=<?php echo 'insert';?>">Input Peminjaman</a>
            <table border="1" >
        <thead>  
          <tr>
            <th>No</th>
            <th>Nomor Peminjaman</th>
            <th>Nama Anggota</th>
            <th>Nama Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>NIK</th>
            <td>Status</td>
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
    </td>
    </tr>
        <tr>
            <td colspan="2" align="right">
                <button>
                    <a href="logout.php">Logout</a>
                </button>
            </td>
        </tr>
</table>
</form>
</body>
</html>