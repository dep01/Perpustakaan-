<?php
include 'koneksi.php';
$sql = "SELECT * FROM manggota WHERE status = 1";
$item = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM mbuku WHERE status = 1";
$item1 = mysqli_query($conn, $sql1);
$proses = $_GET['proses'];
if ($proses =="update"){
    $id = $_GET['nomorPeminjaman'];
    $qu =  "SELECT * FROM tblpeminjaman WHERE nomorPeminjaman = $id";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $anggota = $d['idAnggota'];
    $buku = $d['idBuku'];
    $tanggal = $d['tglPinjam'];
    $NIK = $d['NIK'];
} else {
    $id ="";
    $anggota = "";
    $buku = "";
    $tanggal = "";
    $NIK = "";     
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
                
                <option value=""></option>

                </select>
            </td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><input type="text" name="buku" value=""></td>
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
                <a href="logout.php">Logout</a>
            </button>
        </td>
    </tr>
    
</table>

</body>
</html>