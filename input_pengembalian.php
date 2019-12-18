<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}

$sql = "SELECT * FROM tblpeminjaman";
$item = mysqli_query($conn, $sql);

$proses = $_GET['proses'];
if ($proses =="update"){
    $id = $_GET['nomorPeminjaman'];
    $qu =  "SELECT * FROM tblpengembalian WHERE nomorPeminjaman = $id";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $nik = $d["nik"];
} else {
    $nik = "";
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
            <form method="POST" action="proses_peminjaman.php?proses=<?php echo $proses ?>">
            <table border="0">
            </td>
         <tr>
            <td>Nomor Peminjaman</td>
            <td>:</td>
            <td>
                <select name="nomor_pinjam" id="">
                    <?php while ($row2 =  mysqli_fetch_array($item)):;?>
                        <option value=<?php echo $row2[0]; ?>><?php echo $row2[0]; ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tanggal Peminjaman</td>
            <td>:</td>
            <td><input type="text" name="tgl_pinjam" value="" disabled="true"></td>
        </tr>
        <tr>
            <td>Lama Peminjaman</td>
            <td>:</td>
            <td><input type="text" name="lama_pinjam" value="" disabled="true"></td>
        </tr>
        <tr>
            <td>Telat</td>
            <td>:</td>
            <td><input type="text" name="telat" value="" disabled="true"></td>
        </tr>
        <tr>
            <td>Denda</td>
            <td>:</td>
            <td><input type="text" name="denda" value="" disabled="true"></td>
        </tr>
        <tr>
            <td>Total Denda</td>
            <td>:</td>
            <td><input type="text" name="total_denda" value="" disabled="true"></td>
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