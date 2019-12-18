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

if (empty($nik)){
    echo "<script>alert('NIK belum di isi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
} else if (empty($username)){
    echo "<script>alert('Username belum di isi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
} else if(empty($password)){
    echo "<script>alert('Password belum di isi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
} else if (empty($status)){
    echo "<script>alert('Status User belum di isi')</script>";
    echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
} else {
$daftar = mysqli_query("INSERT INTO muser (nik,idUser,password,idStatus,status) values('$nik','$username','$password','$status',1)");
if (!$daftar) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
if ($daftar){
    echo "<script>alert('Berhasil Mendaftar')</script>";
    echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
} else {
echo "<script>alert('Gagal Mendaftar')</script>";
echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
}}
?>