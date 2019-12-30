<?php
include '../koneksi.php';
$id = $_GET['id'];
// print_r($id); die;
$sql1 = "call spTrperpus('get','NIK','$id',0,0)";
$item1 = mysqli_query($conn, $sql1);
$rowData = mysqli_fetch_assoc($item1);
print_r(json_encode($rowData));
// print_r($rowData); 


?>