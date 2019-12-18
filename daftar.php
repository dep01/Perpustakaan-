<?php

include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
header ("location:login.php");
}

$sql = "SELECT * FROM mstatususer WHERE status = 1";
$item = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM mpetugas WHERE status = 1";
$item1 = mysqli_query($conn, $sql1);

?>
<html>
<head>
    <title>Pendaftaran</title>
</head>
<body>
<form method="post" name="pendaftaran" action="proses_daftar.php">
<table border=0 align="center" cellpadding=5 cellspacing=0>
    <tr>
        <td colspan=3><center><font size=5>PENDAFTARAN</font></center></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td>
            <select name="nik" id="">
            <?php while ($row2 =  mysqli_fetch_array($item1)):;?>
            <option value=<?php echo $row2[0]; ?>><?php echo $row2[0]; ?></option>
            <?php endwhile; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Username</td> 
        <td>:</td>
        <td>
            <input type="text" name="username">
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>:</td>
        <td>
            <input type="text" name="password">
        </td>
    </tr>
    <tr>
        <td>Status User</td>
        <td>:</td>
        <td>
            <select name="status_user" id="">
            <?php while ($row1 =  mysqli_fetch_array($item)):;?>
            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
            <?php endwhile; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan=2>&nbsp;</td>
        <td><input type="submit" name="submit" value="Daftar"></td>
    </tr>
    <tr>
        <td colspan=3><a href="login.php" style="text-decoration:none;">LOGIN</a></td>
    </tr>
</table>
</form>
</body>
</html>