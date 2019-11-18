<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbperpustakaan");

function tambah($data){
    global $conn;
    // ambi data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["namaAnggota"]);
    $JKelamin = htmlspecialchars($data["idJkelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telp = htmlspecialchars($data["noHP"]);

    // query insert data
    $query = "INSERT INTO manggota VALUES('','$nama','$JKelamin','$alamat','$telp')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}
?>