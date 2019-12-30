<?php
// 1. Koneksi Database

    $server = "localhost";
    $username = "root";
    $password = "144144";
    $db_name = "dbperpustakaan";

    $conn = mysqli_connect($server, $username, $password, $db_name);

    if (!$conn){
        echo "Koneksi Server Gagal";
    } else {
        // echo "Koneksi Sukses";
    }
?>