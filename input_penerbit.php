<?php
include 'koneksi.php';

$sql = "SELECT * FROM mpenerbit";
$item = mysqli_query($conn, $sql);
$proses = $_GET['proses'];
if ($proses =="update"){
    $id = $_GET['idPenerbit'];
    $qu =  "SELECT * FROM mpenerbit WHERE id = $id";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $nama = $d['namaPenerbit'];
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
    <table width="700" border="1">
        <tr>
            <td colspan="2" align="center"><h1>Selamat Datang Di Sistem Perpustakaan</h1></td>
        </tr>
        <tr>
            <td width = "200">
                <ul>
                    <li><a href="">Anggota</a></li>
                    <li><a href="buku.php">Buku</a></li>
                    <li><a href="">Pinjam</a></li>
                    <li><a href="petugas.php">Petugas</a></li>
                <ul>
            </td>
            <td width="500">
            <form method="POST" action="proses_penerbit.php">
            <table border="0">
            </td>
        <tr>
            <td>Penerbit</td>
            <td>:</td>
            <td><input type="text" name="penerbit" value=""></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $id ?>></td>
            <td><input type="hidden" name="proses" value=<?php echo $proses ?>></td>
        </tr>
        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
    </table>
</form>

    <tr>
        <td colspan="2" align="center"><br></script></td>
    </tr>
    
</table>

</body>
</html>