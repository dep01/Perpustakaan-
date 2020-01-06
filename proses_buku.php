<?php
// File proses form
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}
$proses = $_GET["proses"];
if ($proses=="delete"){
    $id = $_GET["id"];
} else {
    $penerbit = $_POST["penerbit"];
    $jenis = $_POST["jenis_buku"];
    $judul = $_POST["judul_buku"];
    $jangka = $_POST["jangka_waktu"];
    $denda = $_POST["denda"];
    $tanggal = $_POST["tgl_terbit"];
    $id = $_POST["id"];
}
$pesan = "";
if ($proses == "insert"){
    $sql = "INSERT INTO mbuku(idPenerbit, idJenisBuku, judulBuku, jangkaWaktu, dendaPerhari, tglTerbit,status) VALUES('$penerbit', '$jenis', '$judul', '$jangka', '$denda', '$tanggal',1)";
    $pesan = "Data berhasil ditambahkan!";
} elseif ($proses =="delete"){
    $sql = "UPDATE mbuku SET status = 9 where idBuku = '$id'";
    $pesan = "Data berhasil dihapus";
} else {
    $sql = "UPDATE mbuku SET idPenerbit = '$penerbit',idJenisBuku = '$jenis',judulBuku = '$judul',jangkaWaktu = '$jangka',dendaPerhari = '$denda',tglTerbit = '$tanggal' where idBuku = '$id'";
    $pesan ="Data berhasil di-Update";
}

$id = $_POST["id"];
$rak = $_POST["namaRak"];
$idRak = $_POST["lokasi_buku"];

if ($_POST["simpan"]=="Simpan"){
    if ($idRak == "add"){
        $sql = "INSERT INTO mrakbuku(namaRak, status) VALUES('$rak',1)";
        $pesan = "Data berhasil ditambahkan";
    }else{
        $sql = "UPDATE mrakbuku SET namaRak = '$rak' WHERE idRakBuku = '$idRak'";
        $pesan = "Data berhasil di Update";
    }

} else { 
    $sql = "UPDATE mrakbuku SET status = 9 WHERE namaRak = '$rak'";
    $pesan = "Data berhasil dihapus";
}

// Buat query insert datanya


// Jalankan query
// isset digunakan untuk jika salah satu inputan tidak ter-input data tidak masuk ke database
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