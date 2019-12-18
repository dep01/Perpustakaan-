<?php

include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$sql = "SELECT * FROM mjkelamin";
$item = mysqli_query($conn, $sql);
$proses = $_GET['proses'];
if ($proses =="update"){
    $id = $_GET['id'];
    $qu =  "SELECT * FROM manggota WHERE idAnggota = $id";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $nama = $d['namaAnggota'];
    $hp = $d['noHP'];
    $alamat = $d['alamat'];
    $jk = $d['idJkelamin'];
} else {
    $id ="";
    $nama = "";
    $hp = "";
    $alamat = "";
    $jk = "";     
}

?>

<html>
<head>
</head>
<body>
    <table width="1200" border="2" align="center">
        <tr>
            <td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
        </tr>
        <tr>
            <td width = "200" align="center">
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
            <form method="post" action="proses_anggota.php?proses=<?php echo $proses ?>">
            <table border="0">
            </td>
        <tr>
            <td>Nama Anggota</td>
            <td>:</td>
            <td><input type="text" name="nama" value=<?php echo $nama ?>></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select name="jenis_kelamin" id="">
                <?php while ($row1 =  mysqli_fetch_array($item)):;?>
                <option value=<?php echo $row1[0]; ?>><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" value=<?php echo $alamat ?>></td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td><input type="text" name="noHP" value=<?php echo $hp ?>></td>
            <td><input type="hidden" name="id" value=<?php echo $id ?>></td>
        </tr>
        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
        </tr>
    </table>
</form>    
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