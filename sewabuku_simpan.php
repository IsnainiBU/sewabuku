<?php
$kode = $_POST['kode'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$stok = $_POST['stok'];

$foto       = $_FILES['foto']['name'];
$tmpName    = $_FILES['foto']['tmp_name'];
$size       = $_FILES['foto']['size'];
$type       = $_FILES['foto']['type'];

$maxsize    = 1500000;
$typeYgBoleh= array("image/jpeg", "image/png", "image/pjpeg");

$dirFoto    = "fotobuku";
if(!is_dir($dirFoto))
    mkdir($dirFoto);
$fileTujuanFoto = $dirFoto."/".$foto;

$dirThumb   = "thumb_buku";
if(!is_dir($dirThumb))
    mkdir($dirThumb);
$fileTujuanThumb    = $dirThumb."/t_".$foto;


$dataValid = "YA";
if($size>0){
    if($size>$maxsize){
        echo " Ukuran File Terlalu Besar <br/>";
        $dataValid ="TIDAK";
    }
    if(!in_array($type, $typeYgBoleh)){
        echo " Type File Tidak Dikeknal <br/>";
        $dataValid ="TIDAK";
    }
}

if (strlen(trim($kode)) == 0) {
    echo "Kode barang harus diisi! <br>";
    $dataValid = "TIDAK";
}if (strlen(trim($judul)) == 0) {
    echo "Judul Buku harus diisi! <br>";
    $dataValid = "TIDAK";
}if (strlen(trim($pengarang)) == 0) {
    echo "Pengarang harus diisi! <br>";
    $dataValid = "TIDAK";
}if (strlen(trim($penerbit)) == 0) {
    echo "Penerbit harus diisi! <br>";
    $dataValid = "TIDAK";
}if (strlen(trim($stok)) == 0) {
    echo "Jumlah Stok harus diisi! <br>";
    $dataValid = "TIDAK";
}if ($dataValid == "TIDAK") {
    echo "Masih ada kesalahan, silahkan perbaiki!<br>";
    echo "<input type='button' value='kembali' 
    onClick='self.history.back()'>";
    exit;
}

include "koneksi_sewabuku.php";

$sql = "insert into buku
            (kode, judul, pengarang, penerbit, stok, foto) 
            values
            ('$kode','$judul', '$pengarang','$penerbit', $stok, '$foto')";
$hasil = mysqli_query($kon, $sql);

if (!$hasil) {
    echo "Gagal Simpan, Silahkan Diulangi<br>";
    echo mysqli_error($kon);
    echo "<br> <input type='buttton' value='Kembali'
            onClick='self.history.back()'>";
    exit;
} else {
    echo "Simpan Data Berhasil";
}

if($size>0){
    if(!move_uploaded_file($tmpName, $fileTujuanFoto)){
        echo "Gagal Upload Gambar...<br/>";
        echo "<a href= 'barang_tampil.php'>Daftar Barang</a>";
        exit;
    } else {
        buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
    }
}

echo "<br/> File Sudah Diupload.<br/>";

function buat_thumbnail($file_src, $file_dst){
    //hapus jika thumbnail sebelumnya sudah ada
    list($w_src, $h_src, $type) = getImagesize($file_src);

    switch($type){
        case 1: //gif -> jpg
            $img_src = imagecreatefromgif($file_src);
            break;
        case 2 :  //jpeg -> jpg
            $img_src = imagecreatefromjpeg($file_src);
            break;
        case 3 : //png -> jpg
            $img_src = imagecreatefrompng($file_src);
            break;
    }

    $thumb =100; //max. size untuk thumb
    if ($w_src>$h_src){
        $w_dst = $thumb; //landscape
        $h_dst = round($thumb/$w_src*$h_src);
    } else {
        $w_dst = round($thumb/$h_src*$w_src); //potrait
        $h_dst = $thumb;
    }

    $img_dst = imagecreatetruecolor($w_dst, $h_dst); //resample

    imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, 
            $w_dst, $h_dst, $w_src, $h_src);
    imagejpeg($img_dst, $file_dst); //simpan thumbnail
    //bersikan memori
    imagedestroy($img_src);
    imagedestroy($img_dst);
}
?>