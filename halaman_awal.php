<?php include "template_atas.php" ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user"])) {
    echo "Sesi Sudah Habis !<br/>
            <a href='login_form.php'>LOGIN LAGI</a>";
    exit;
}
echo "SELAMAT DATANG <br/>";
echo "USER  : " . $_SESSION["user"] . "<br/>";
echo "NAMA  : " . $_SESSION["nama_lengkap"] . "<br/>";
?>
<hr>

<?php include "template_bawah.php" ?>
