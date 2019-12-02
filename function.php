<?php
function registrasi($data){
    global $conn;
    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT idUser FROM muser WHERE idUser = '$username'");
    if( mysqli_fetch_assoc($result) ){
        echo "<script>
        alert('Username Sudah Terdaftar');
        </script>";
        return false;
    }

    // Cek konfirmasi password
    if( $password !== $password2 ){
        echo "<script>
        alert('Konfirmasi Password Tidak Sesuai');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
?>