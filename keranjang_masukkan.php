<?php
include 'koneksi.php';

$id_produk = $_GET['id'];
$redirect = $_GET['redirect'];

$data = mysqli_query($koneksi, "SELECT * FROM tb_produk, tb_kategori b WHERE a.id_kategori=b.id_kategori AND a.id_produk='$id_produk'");
$d = mysqli_fetch_assoc($data);

session_start();

// session_destroy();

if (isset($_SESSION['keranjang'])) {
	$jumlah_isi_keranjang = count($_SESSION['keranjang']);

	$sudah_ada = 0;
	for ($a = 0; $a < $jumlah_isi_keranjang; $a++) {

		// cek apakah produk sudah ada dalam keranjang
		if ($_SESSION['keranjang'][$a]['produk'] == $id_produk) {

			$sudah_ada = 1;
		}
	}

	if ($sudah_ada == 0) {
		$_SESSION['keranjang'][$jumlah_isi_keranjang] = array(
			'produk' => $id_produk,
			'jumlah' => 1
		);
	}
} else {
	// $_SESSION['keranjang'] = array();
	// array_push($_SESSION['keranjang'], $id_produk);

	$_SESSION['keranjang'][0] = array(
		'produk' => $id_produk,
		'jumlah' => 1
	);
}


if ($redirect == "index") {
	$r = "index.php";
} elseif ($redirect == "detail") {
	$r = "produk_detail.php?id=" . $id_produk;
} elseif ($redirect == "keranjang") {
	$r = "keranjang.php";
}

header("location:" . $r);
