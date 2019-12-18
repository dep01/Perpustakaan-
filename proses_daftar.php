<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}

$nik = $_POST['nik'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status_user'];

$sql = "INSERT INTO muser(NIK,idUser,password,idStatusUser,status) VALUES('$nik','$username','$password','$status',1)";
$pesan = "Data Berhasil di-Tambahkan";


$hasil = mysqli_query($conn, $sql);
if (!$hasil) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
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