<?php include "template_atas.php" ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    session_destroy();
    echo "Anda Sudah Logout<br/>";
?>
<?php include "template_bawah.php" ?>
