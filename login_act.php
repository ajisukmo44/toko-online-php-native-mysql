<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	session_start();
	$data = mysqli_fetch_assoc($login);

	// hapus session yg lain, agar tidak bentrok dengan session customer
	unset($_SESSION['id_pelanggan']);
	unset($_SESSION['nama_pelanggan']);
	unset($_SESSION['username']);
	unset($_SESSION['status']);

	// buat session customer
	$_SESSION['id_pelanggan'] = $data['id_pelanggan'];
	$_SESSION['nama_pelanggan'] = $data['nama_pelanggan'];
	$_SESSION['alamat'] = $data['alamat'];
	$_SESSION['email'] = $data['email'];
	$_SESSION['no_hp'] = $data['no_hp'];
	$_SESSION['status'] = "login";
	header("location:index.php");
} else {
	header("location:login.php?alert=gagal");
}
