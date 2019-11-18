<?php
// 3. File proses form
include "koneksi.php";

$nama = $_POST["nama"];
$JKelamin = $_POST["jenis_kelamin"];
$alamat = $_POST["alamat"];
$telp = $_POST["noHP"];

// 4. Buat query insert datanya
$sql = "INSERT INTO manggota(namaAnggota, idJkelamin, alamat, noHP) VALUES('$nama', '$JKelamin', '$alamat', '$telp')";

// 5. Jalankan query
// isset digunakan untuk jika salah satu inputan tidak ter-input data tidak masuk ke database
$hasil = mysqli_query($conn, $sql);
if ($hasil){
    echo "
        <script>
        alert('Data berhasil di tambahkan!');
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