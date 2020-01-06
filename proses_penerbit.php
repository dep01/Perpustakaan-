<?php
// File proses form
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])){
header ("location:login.php");
}

// $penerbit = $_POST["penerbit"];
// $id = $_POST["id"];
// $proses = $_POST["proses"];
// if ($proses == "insert"){
//     $sql = "INSERT INTO mpenerbit(namaPenerbit,status) VALUES('$penerbit',1)";
// } else {
//     $sql = "UPDATE mpenerbit SET namaPenerbit = '$penerbit' WHERE idPenerbit = '$id'";
// }

// Buat query insert datanya
$id = $_POST["id"];
$penerbit = $_POST["namaPenerbit"];
$idPenerbit = $_POST["penerbit"];

if ($_POST["simpan"]=="Simpan"){
    if ($idPenerbit == "add"){
        $sql = "INSERT INTO mpenerbit(namaPenerbit, status) VALUES('$penerbit',1)";
        $pesan = "Data berhasil ditambahkan";
    }else{
        $sql = "UPDATE mpenerbit SET namaPenerbit = '$penerbit' WHERE idPenerbit = '$idPenerbit'";
        $pesan = "Data berhasil di Update";
    }

} else { 
    $sql = "UPDATE mpenerbit SET status = 9 WHERE namaPenerbit = '$penerbit'";
    $pesan = "Data berhasil dihapus";
}
 

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