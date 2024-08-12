<?php include "template_atas.php" ?>
<h2>INPUT BUKU</h2>
<hr>
<form action="sewabuku_simpan.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode" size="4" maxlength="4"></td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td><input type="text" name="judul"></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td><input type="text" name="pengarang"></td>
        </tr>
        <tr>
            <td>Penerbit</td>
            <td><input type="text" name="penerbit"></td>
        </tr>
        <tr>
            <td>Jumlah Stok</td>
            <td><input type="text" name="stok"></td>
        </tr>
        <tr>
            <td>Foto Sampul</td>
            <td><input type="file" name="foto" ></td>
        </tr>
    </table>
    <hr>
    <input type="submit" value="Simpan" name="proses">
    <input type="reset" value="Reset" name="reset">
</form>
<?php include "template_bawah.php" ?>
