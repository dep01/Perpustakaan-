<?php
include 'koneksi.php';

$sql = "SELECT * FROM mjenisbuku";
$item = mysqli_query($conn, $sql);
$proses = $_GET['proses'];
if ($proses =="update"){
    $id = $_GET['idJenisBuku'];
    $qu =  "SELECT * FROM mjenisbuku WHERE id = $id";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $nama = $d['jenisBuku'];
    $status = $d['status'];
} else {
    $id ="";
    $nama = "";
    $status = "";   
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
            <form method="POST" action="proses_Jbuku.php">
            <table border="0">
            </td>
        <tr>
            <td>Jenis Buku</td>
            <td>:</td>
            <td><input type="text" name="jenis_buku" value=""></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $id ?>></td>
            <td><input type="hidden" name="proses" value=<?php echo $proses ?>></td>
        </tr>
        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
        </tr>
    </table>
</form>

    <tr>
        <td colspan="2" align="center"><br></script></td>
    </tr>
    
</table>

</body>
</html>