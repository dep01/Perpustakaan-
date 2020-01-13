
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
    
        <a href="input_anggota.php?proses=<?php echo 'insert';?>"  style="text-decoration: none;">+Input Anggota</a>

        <br>
        <br>

        <table class="table table-bordered" border="2">     
          <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
            <th>Aksi</th>
          </tr>
<?php 

include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
    header ("location:login.php");
    }
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM manggota A INNER JOIN mjkelamin B ON A.idJkelamin = B.idJkelamin where A.status = 1");
while($d = mysqli_fetch_array($data)){
?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['namaAnggota']; ?></td>
        <td><?php echo $d['jenisKelamin']; ?></td>
	    <td><?php echo $d['alamat']; ?></td>
	    <td><?php echo $d['noHP']; ?></td>
        <td>
            <a class="btn btn-warning btn-sm" href="input_anggota.php?id=<?php echo $d["idAnggota"];?>&proses=update" style="text-decoration: none;">Ubah</a> 
            <a class="btn btn-danger btn-sm" href="proses_anggota.php?id=<?php echo $d["idAnggota"];?>&proses=delete" style="text-decoration: none;">Hapus</a>
        </td> 
	</tr>
<?php }	?>

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
</body>
</html>