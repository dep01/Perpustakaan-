<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi Anggota</title>
</head>
<body>
    <h2>Formulir Pendaftaran</h2>
    <form method="POST" action="proses.php">
    <table>
        <tr>
            <td>Nama Anggota</td>
            <td>:</td>
            <td>
                <input type="text" name="nama" value="">
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
                <select name="jenis_kelamin" id="">
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                <textarea rows="4" cols="50" name="alamat"></textarea>
            </td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td>:</td>
            <td>
                <input type="text" name="noHP" value="">
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td>
                <input type="submit" value="Simpan">
                <input type="reset" value="Batal">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>