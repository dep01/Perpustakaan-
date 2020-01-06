<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$sql = "SELECT * FROM mrakbuku WHERE status = 1";
$item = mysqli_query($conn, $sql);

$proses = $_GET['proses'];
if ($proses =="update"){
    $id = $_GET['idRakBuku'];
    $qu =  "SELECT * FROM mrakbuku WHERE id = $id";
    $data = mysqli_query($conn, $qu);
    $d = mysqli_fetch_array($data);
    $nama = $d['namaRak'];
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
            <form method="POST" action="proses_rakbuku.php">
            <table border="0">
            </td>
        </tr>
        <tr>
            <td>Lokasi Buku</td>
            <td>:</td>
            <td>
            <select name="lokasi_buku" id="" onchange="changeValue(this.value)">
                <option value="add" selected="">--Lokasi Buku--</option>
                     <?php 
                     $jsArray = "var prdName = new Array();\n";
                     while ($data=mysqli_fetch_array($item)) {
                    echo '<option value="'.$data['idRakBuku'].'">'.$data['namaRak'].'</option> ';
                     $jsArray .= "prdName['" . $data['idRakBuku'] . "'] = {nama:'" . addslashes($data['namaRak']) . "'};\n";
       }
      ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="text" name="namaRak" id="namaRak" value=""></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $id ?>></td>
            <td><input type="hidden" name="proses" value=<?php echo $proses ?>></td>
        </tr>
        <tr>
            <td><input type="submit" name="simpan" value="Simpan"></td>
            <td></td>
            <td><input type="submit" name="simpan" value="Hapus"></td>
        </tr>
        </tr>

    </table>
    <script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(x){  
    document.getElementById('namaRak').value = prdName[x].nama;   
    };  
    </script> 
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