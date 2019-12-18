<?php
// File proses form
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
// $jenis = $_POST["jenis_buku"];
// $id = $_POST["id"];
// $proses = $_POST["proses"];
// if ($proses == "insert"){
//     $sql = "INSERT INTO mjenisbuku(jenisBuku,status) VALUES('$jenis',1)";
// } else {
//     $sql = "UPDATE mjenisbuku SET jenisBuku = '$jenis' WHERE idJenisBuku = '$id'";
// }

$id = $_POST["id"];
$Jbuku = $_POST["jenisBuku"];

if ($_POST["simpan"]=="Simpan"){
    $sql = "INSERT INTO mjenisbuku(jenisBuku, status) VALUES('$Jbuku',1)";
    $pesan = "Data berhasil ditambahkan!";
} else { 
    $sql = "UPDATE mjenisbuku SET status = 9 WHERE jenisBuku = '$Jbuku'";
    $pesan = "Data berhasil dihapus";
}

// Buat query insert datanya


// Jalankan query
// isset digunakan untuk jika salah satu inputan tidak ter-input data tidak masuk ke database
$hasil = mysqli_query($conn, $sql);
if ($hasil){
    echo "
        <script>
        alert('$pesan');
        document.location.href = 'index.php';
        </script>
        ";
        
    } else {
        echo "
        <script>
        alert('Data gagal di tambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
    
    }
?>