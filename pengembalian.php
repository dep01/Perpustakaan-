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
            <a href="input_pengembalian.php?proses=<?php echo 'insert';?>" style="text-decoration: none;">Input Pengembalian</a>
            <table border="1" >
        <thead>  
          <tr>
            <th>No</th>
            <th>Nomor Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Lama Peminjaman</th>
            <th>Telat</th>
            <th>Denda</th>
            <th>Total Denda</th>
            <th>NIK Petugas</th>
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
$data = mysqli_query($conn, "SELECT * FROM tblpengembalian");
while($d = mysqli_fetch_array($data)){
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d["nomorPinjaman"]; ?></td>
        <td><?php echo $d['tglPengembalian']; ?></td>
	    <td><?php echo $d['lamaPinjam']; ?></td>
        <td><?php echo $d['telat'] ?></td>
        <td><?php echo $d["denda"] ?></td>
        <td><?php echo $d["totalDenda"] ?></td>
	    <td><?php echo $d['NIK']; ?></td>
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