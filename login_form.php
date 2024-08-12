<?php include "template_atas.php" ?>
<h2>LOGIN</h2>
<form action="login_proses.php" method="post">
    <table border="0">
        <tr>
            <td>USER</td>
            <td><input type="text" name="pengguna"></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="password" name="kata_kunci"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="LOGIN"></td>
        </tr>
    </table>
    <p>Anda belum punya akun? </p><a href="register.php">Register</a>
</form>
<?php include "template_bawah.php" ?>
