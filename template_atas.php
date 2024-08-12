<?php
@session_start();
$pengguna = isset($_SESSION["user"])?$_SESSION["user"]:"";
$nama_lengkap = isset($_SESSION["nama_lengkap"])?
            $_SESSION["nama_lengkap"]:"";
?>
<!DOCTYPE html>
<html>
<head>
    <title>PERPUSTAKAAN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="wrap">
        <div id="header">
            <h1>Perpustakaan "Isnaini"</h1>
        </div>
        <div style="clear: both;"></div>
        <div id="tengah">
            <div id="info_pengguna">
                <?php
                    if(!empty($pengguna)){
                        echo "Sedang Login Sebagai : $pengguna,
                        Nama Lengkap : $nama_lengkap<br>";
                        $tampil_login = "display:none";
                        $tampil_logout ="";
                    }else{
                        $tampil_login = "";
                        $tampil_logout = "display:none";
                    }
                ?>
            </div>
            <div id="menu">
                <div id="menu_header">Menu</div>
                <div id="menu_konten">
                    <ul>
                        <li><a style="<?php echo $tampil?>" href="sewabuku_tampil.php">Kelola Buku</a></li>
                        <li><a style="<?php echo $tampil?>" href="sewabuku_isi.php">Input Buku</a></li>
                        <li><a href="sewabuku_tersedia.php">Buku Tersedia</a></li>
                        <li><a href="sewabuku_pinjam.php">Peminjaman</a></li>
                        <li><a href="sewabuku_cari.php">Cari Buku</a></li>
                        <li><a style="<?php echo $tampil_login?>" href="login_form.php">Login</a></li>
                        <li><a style="<?php echo $tampil_logout?>" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div id="konten">
                
            