<?php include "template_atas.php" ?>
<h2>DATA PEMINJAMAN BUKU</h2>
<form action="sewabuku_simpan_transaksi.php" method="POST">
    <table border="0">
        <tr>
            <td>Tanggal</td>
            <td>: <input type="text" name="tanggal"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <input type="text" name="peminjam"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <input type="email" name="email"></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td>: <input type="text" name="notelp"></td>
        </tr>
        <tr>
            <td colspan="2" align="right">
            <input type="submit" name="Simpan"></td>
        </tr>
    </table>
</form>
<?php
    include_once("sewabuku_pinjam.php");
?>
<?php include "template_bawah.php" ?>
