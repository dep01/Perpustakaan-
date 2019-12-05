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
            <a href="input_petugas.php?proses=<?php echo 'insert';?>">Input Pengembalian</a>
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
            <th>NIK</th>
          </tr>
        </thead>
    </tr>
<tbody>
<?php 
include 'koneksi.php';
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
    </td>
    </tr>
        <tr>
            <td colspan="2" align="center"><br></td>
        </tr>
</table>
</form>
</body>
</html>