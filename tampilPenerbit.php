<?php
include "koneksi.php";
$id = $_POST['penerbit'];
$namaP ="";
if ($id =="add"){
    $namaP ="";
    echo "
        <script>
        document.location.href = 'input_penerbit.php';
        </script>
        ";
    exit;
}else{
    $sql = "select namaPenerbit from mpenerbit where idPenerbit = '$id'";
    $data = mysqli_query($conn, $sql);
    $d = mysqli_fetch_array($data);
    $namaP = $d['namaPenerbit'];
    echo "
        <script>
        document.location.href = 'input_penerbit.php';
        </script>
        ";
}
?>