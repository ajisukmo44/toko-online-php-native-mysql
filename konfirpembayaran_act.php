<?php
include 'koneksi.php';

$id  = $_POST['id_transaksi'];
$nb = $_POST['nama_rekening'];
$bnk = $_POST['bank'];
$jt = $_POST['jumlah_transfer'];
$tt = $_POST['tanggal_transfer'];

$rand = rand();
$allowed =  array('gif', 'png', 'jpg', 'jpeg');

$filename1 = $_FILES['bukti_transfer']['name'];

mysqli_query($koneksi, "INSERT INTO tb_pembayaran values ('','$id','$nb','$bnk','$jt','','$tt','1')");

if ($filename1 != "") {
    $ext = pathinfo($filename1, PATHINFO_EXTENSION);

    if (in_array($ext, $allowed)) {
        move_uploaded_file($_FILES['bukti_transfer']['tmp_name'], 'gambar/bukti_pembayaran/' . $rand . '_' . $filename1);
        $file_gambar = $rand . '_' . $filename1;

        mysqli_query($koneksi, "UPDATE tb_pembayaran SET bukti_transfer='$file_gambar' WHERE id_transaksi='$id'");
    }

    if (in_array($ext, $allowed)) {

        mysqli_query($koneksi, "UPDATE tb_transaksi SET status_transaksi='2' WHERE id_transaksi='$id'");
    }
}


header("location:datatransaksi.php?alert=terkirim");
