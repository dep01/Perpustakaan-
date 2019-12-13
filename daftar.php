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
            <input type="text" name="nama">
        </td>
    </tr>
    <tr>
        <td>Username</td> 
        <td>:</td>
        <td>
            <input type="text" name="email">
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>:</td>
        <td>
            <input type="text" name="username">
        </td>
    </tr>
    <tr>
        <td>Status User</td>
        <td>:</td>
        <td>
            <select name="status_user" id="">
            
            <option value=""></option>
            
            </select>
        </td>
    </tr>
    <tr>
        <td colspan=2>&nbsp;</td>
        <td><input type="submit" name="submit" value="DAFTAR"></td>
    </tr>
    <tr>
        <td colspan=3><a href="login.php" style="text-decoration:none;">LOGIN</a></td>
    </tr>
</table>
</form>
</body>
</html>