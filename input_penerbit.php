<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$sql = "SELECT * FROM mpenerbit WHERE status = 1";
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
    <title>PERPUSTAKAAN</title>
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
    </form>

        <a href="anggota.php" class="btn btn-primary ml-1" style="text-decoration: none;">Anggota</a>
        <a href="buku.php" class="btn btn-primary ml-1" style="text-decoration: none;">Buku</a>
        <a href="petugas.php" class="btn btn-primary ml-1" style="text-decoration: none;">Petugas</a>
        <a href="pinjam.php" class="btn btn-primary ml-1" style="text-decoration: none;">Peminjaman Buku</a>
        <a href="pengembalian.php" class="btn btn-primary ml-1" style="text-decoration: none;">Pengembalian Buku</a>
        
        <br>
        <br>

        <tr>
            <td width="500" align="center">
            <form method="POST" action="proses_penerbit.php">
            <table border="0">
            </td>
        </tr>
        <tr>
            <td>Penerbit</td>
            <td>:</td>
            <td>
                <select name="penerbit" id="" onchange="changeValue(this.value)">
                <option value="add" selected="">--Tambah Penerbit--</option>
                     <?php 
                     $jsArray = "var prdName = new Array();\n";
                     while ($data=mysqli_fetch_array($item)) {
                    echo '<option value="'.$data['idPenerbit'].'">'.$data['namaPenerbit'].'</option> ';
                     $jsArray .= "prdName['" . $data['idPenerbit'] . "'] = {nama:'" . addslashes($data['namaPenerbit']) . "'};\n";
       }
      ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="text" name="namaPenerbit" id="namaPenerbit"></td>
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
    document.getElementById('namaPenerbit').value = prdName[x].nama;   
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