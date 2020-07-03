<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Kopi Mukidi Temanggung</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="kopi/css/bootstrap.min.css">
	<link rel="stylesheet" href="kopi/css/jquery-ui.css">
	<link rel="stylesheet" href="kopi/css/owl.carousel.min.css">
	<link rel="stylesheet" href="kopi/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="kopi/css/owl.theme.default.min.css">

	<link rel="stylesheet" href="kopi/css/jquery.fancybox.min.css">

	<link rel="stylesheet" href="kopi/css/bootstrap-datepicker.css">

	<link rel="stylesheet" href="kopi/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="kopi/css/aos.css">

	<link rel="stylesheet" href="kopi/css/style.css">

	<link href="gambar/logo1.ico" rel="shortcut icon" />


	<link type="text/css" rel="stylesheet" href="frontend/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="frontend/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="frontend/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="frontend/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="frontend/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="frontend/css/style8.css" />
</head>

<?php
include 'koneksi.php';

session_start();

$file = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['status'])) {

	// halaman yg dilindungi jika customer belum login
	$lindungi = array('pelanggan.php', 'logout.php');

	// periksa halaman, jika belum login ke halaman di atas, maka alihkan halaman
	if (in_array($file, $lindungi)) {
		header("location:index.php");
	}

	if ($file == "checkout.php") {
		header("location:login.php?alert=login-dulu");
	}
} else {

	// halaman yg tidak boleh diakses jika customer sudah login
	$lindungi = array('login.php', 'daftar.php');

	// periksa halaman, jika sudah dan mengakses halaman di atas, maka alihkan halaman
	if (in_array($file, $lindungi)) {
		header("location:pelanggan.php");
	}
}

if ($file == "checkout.php") {
	if (!isset($_SESSION['keranjang']) || count($_SESSION['keranjang']) == 0) {
		header("location:keranjang.php?alert=keranjang_kosong");
	}
}

?>

<body>

	<style>
		.product-name {
			height: 5px;
		}
	</style>
	<!-- HEADER -->
	<header class="bg-light">

		<!-- header -->
		<div id="header">
			<div class="container bg-light">
				<div class="pull-left">

					<!-- Search -->
					<!-- <div class="header-search">
						<a href="index.php"> <img src="kopi/images/logo1.png" style="width: 200px;" alt=""></a>
					</div> -->
					<!-- Search -->
					<div class="header-search">
						<form action="" method="get">
							<input class="input" type="text" name="cari" placeholder="Masukkan Pencarian ..">
							<button class="search-btn "><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<?php
							if (isset($_SESSION['keranjang'])) {
								$jumlah_isi_keranjang = count($_SESSION['keranjang']);
							} else {
								$jumlah_isi_keranjang = 0;
							}
							?>
							<a aria-expanded="true">
								<div>
									<strong class="text-uppercase"> <a href="keranjang.php" class="main-btn"> <i class="fa fa-shopping-cart"></i> Keranjang : </strong>
									<span class="qty"><?php echo $jumlah_isi_keranjang; ?></span>
							</a>
							<div class="custom-menu">

								<a class="main-btn" href="keranjang.php">Keranjang</a>
								<a class="primary-btn" href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
							</div>
				</div>
				</li>
				<!-- /Cart -->

				<?php
				if (isset($_SESSION['status'])) {
					$id_pelanggan = $_SESSION['id_pelanggan'];
					$pelanggan = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
					$c = mysqli_fetch_assoc($pelanggan);
				?>
					<!-- Account -->
					<li class="header-account dropdown default-dropdown">
						<div class="dropdown-toggle primary-btn" role="button" data-toggle="dropdown" aria-expanded="true">
							<i class="fa fa-user-o"></i>
							<span class="ml-2"><?php echo $c['username']; ?></span>
						</div>
						<ul class="custom-menu">
							<li><a href="pelanggan.php"><i class="fa fa-user-o"></i> Akun Saya</a></li>
							<li><a href="datatransaksi.php"><i class="fa fa-list"></i>Transaksi Saya</a></li>
							<li><a href="gantipassword.php"><i class="fa fa-lock"></i> Ganti Password</a></li>
							<li><a href="pelanggan_logout.php"><i class="fa fa-sign-out"></i> Keluar</a></li>
						</ul>
					</li>
					<!-- /Account -->
				<?php
				} else {
				?>
					<li class="header-account dropdown default-dropdown">
						<a href="login.php" class="text-uppercase primary-btn btn-sm">Login</a>
						<a href="daftar.php" class="text-uppercase main-btn btn-sm">Daftar</a>
					</li>
				<?php
				}
				?>

				<!-- Mobile nav toggle-->
				<li class="nav-toggle">
					<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
				</li>
				<!-- / Mobile nav toggle -->
				</ul>
			</div>
		</div>
		<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- section -->
	<div class="site-section mt-4 bg-white" id="products-section">
		<div class="container">
			<div class="row">
				<div id="main" class="col-md-12">
					<!-- <?php
							$data = mysqli_query($koneksi, "SELECT * FROM kategori");
							while ($d = mysqli_fetch_array($data)) {
							?>
			<li><a href="produk_kategori.php?id=<?php echo $d['kategori_id']; ?>"><?php echo $d['kategori_nama']; ?></a></li>
			<?php
							}
			?> -->
					<!-- store top filter -->
					<div class="pull-left">
						<div class="header-search p-0">
							<form action="" method="get">
								<input class="input" type="text" name="cari" placeholder="Masukkan Pencarian ..">
								<button class="search-btn "><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
					<div class="pull-right">
						<form action="" method="get">
							<div class="sort-filter">
								<span class="text-uppercase">Kategori :</span>
								<select name="formal" onchange="handleSelect(this)" class="input show-on-click" required>
									<?php
									$data = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
									while ($d = mysqli_fetch_array($data)) {
									?>
										<option value=""><?php echo $d['nama_kategori']; ?></option>
									<?php
									}
									?>
								</select>
							</div>
					</div>
					<div class="pull-right">
						<div class="sort-filter">
							<span class="text-uppercase">Urutkan :</span>
							<select class="input" name="urutan" onchange="this.form.submit()">
								<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "terbaru") {
											echo "selected='selected'";
										} ?> value="terbaru">Terbaru</option>
								<option <?php if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
											echo "selected='selected'";
										} ?> value="harga">Harga</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			</form>
			<hr>

			<!-- /store top filter -->

			<!-- STORE -->
			<!-- row -->
			<div class="row mt-4">
				<?php
				$halaman = 12;
				$page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
				$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
				$result = mysqli_query($koneksi, "SELECT * FROM tb_produk");
				$total = mysqli_num_rows($result);
				$pages = ceil($total / $halaman);
				if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
					if (isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						$data = mysqli_query($koneksi, "SELECT * FROM tb_produk a, tb_ kategori b WHERE a.id_kategori=b.id_kategori AND nama_produk LIKE '%$cari%' ORDER BY harga ASC LIMIT $mulai, $halaman");
					} else {
						$data = mysqli_query($koneksi, "SELECT * FROM tb_produk a, tb_kategori b WHERE a.id_kategori=b.id_kategori ORDER BY harga ASC LIMIT $mulai, $halaman");
					}
				} else {
					if (isset($_GET['cari'])) {
						$cari = $_GET['cari'];
						$data = mysqli_query($koneksi, "SELECT * FROM tb_produk a, tb_kategori b WHERE a.id_kategori= b.id_kategori AND nama_produk LIKE '%$cari%' ORDER BY id_produk DESC LIMIT $mulai, $halaman");
					} else {
						$data = mysqli_query($koneksi, "SELECT * FROM tb_produk a, tb_kategori b WHERE a.id_kategori= b.id_kategori order by id_produk DESC LIMIT $mulai, $halaman");
					}
				}
				$no = $mulai + 1;

				while ($d = mysqli_fetch_array($data)) {
				?>

					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label" style="border-radius:1%">
									<!-- <span><?php echo $d['kategori_nama'] ?></span> -->
								</div>

								<a href="produk_detail.php?id=<?php echo $d['id_produk'] ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i>Detail</a>

								<?php if ($d['foto_produk'] == "") { ?>
									<img src="admin/images/produk/produk.png" style="height: 250px">
								<?php } else { ?>
									<img src="admin/images/produk/<?php echo $d['foto_produk'] ?>" style="height: 250px">
								<?php } ?>
							</div>
							<div class="product-body">
								<h3 class="product-price"><?php echo "Rp. " . number_format($d['harga']) . ",-"; ?> <?php if ($d['stok'] == 0) { ?> <del class="product-old-price">Kosong</del> <?php } ?></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="produk_detail.php?id=<?php echo $d['id_produk'] ?>"><?php echo $d['nama_produk']; ?></a></h2>
								<div class="product-btns">
									<a class="primary-btn add-to-cart btn-block text-center" href="keranjang_masukkan.php?id=<?php echo $d['id_produk']; ?>&redirect=index"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->

				<?php
				}
				?>

			</div>
			<!-- /row -->

			<!-- /STORE -->


			<div class="store-filter clearfix">
				<div class="pull-right">
					<ul class="store-pages">
						<li><span class="text-uppercase">Page:</span></li>
						<?php for ($i = 1; $i <= $pages; $i++) { ?>
							<?php if ($page == $i) { ?>
								<li class="active"><?php echo $i; ?></li>
							<?php } else { ?>

								<?php
								if (isset($_GET['cari'])) {
									$cari = $_GET['cari'];
									$c = "&cari=" . $cari;
								}
								if (isset($_GET['urutan']) && $_GET['urutan'] == "harga") {
								?>
									<li><a href="?halaman=<?php echo $i; ?>&urutan=harga<?php echo $c ?>"><?php echo $i; ?></a></li>
								<?php
								} else {
								?>
									<li><a href="?halaman=<?php echo $i; ?><?php echo $c ?>"><?php echo $i; ?></a></li>
								<?php
								}
								?>

							<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>

			<hr>
		</div>

		<div class="site-section bg-white" id="services-section">
			<div class="container">
				<div class="row mb-5 mt-4">
					<div class="col-md-12 text-center">
						<h2 class="section-sub-title">Tentang Kami</h2>
					</div>
				</div>

				<div class="row align-items-stretch">
					<div class="col-md-6 col-lg-3 mb-4 mb-lg-4" data-aos="fade-up">
						<div class="unit-4 d-flex">
						</div>
						<h4 class="text-center">Semarang TV</h4>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/w5xa-twuSiE" allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-lg-4" data-aos="fade-up">
						<div class="unit-4 d-flex ">
						</div>
						<h4 class="text-center">Hitam Putih</h4>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/B-jofe4PhaA" allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-lg-4" data-aos="fade-up">
						<div class="unit-4 d-flex">
						</div>
						<h4 class="text-center">CNN</h4>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/F3-s8ED3SJM" allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-lg-4" data-aos="fade-up">
						<div class="unit-4 d-flex">
						</div>
						<h4 class="text-center">Kompas TV</h4>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/icNr-MGajPs" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- /section -->
	<?php include 'footer.php'; ?>