<?php include 'header2.php';

$nama = $_SESSION['nama_pelanggan'];
$alamat = $_SESSION['alamat'];
$no_hp = $_SESSION['no_hp'];
?>


<!-- BREADCRUMB -->
<div id="breadcrumb" class="bg-light">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Invoice </li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<div class="section" style="background-color: #D5B487;">
    <div class="container">
        <div class="row bg-white mt-4 mb-4" style="border-radius: 1%;">
            <div id="main" class="col-md-12">
                <div class="row">
                    <?php
                    $idp = $_SESSION['id_pelanggan'];
                    $id = $_GET['id'];
                    $invoice = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_pelanggan='$idp' AND id_transaksi='$id' order by id_transaksi desc");
                    while ($i = mysqli_fetch_array($invoice)) {
                    ?>

                        <div class="col-lg-12">
                            <div>
                                <center>
                                    <h4>
                                        <p> <img src="frontend/img/logo1.png" alt="" style="width:150px"> </p> INVOICE TRANSAKSI | ID : <?php echo $i['id_transaksi'] ?>
                                    </h4>
                                </center>
                            </div>
                            <HR>
                            <div class="pull-right">
                                <a href="pelanggan_invoice_cetak.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-default btn-sm mr-4"><i class="fa fa-print"></i>&nbsp; CETAK</a>
                            </div>
                            <strong>Nama &nbsp;&nbsp;&nbsp;</strong>: <?= $nama ?><br />
                            <strong>Alamat </strong>: <?= $alamat ?><br />
                            <strong>No Hp &nbsp;&nbsp;:</strong> <?= $no_hp ?><br />
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th class="text-center" width="1%">NO</th>
                                        <th colspan="2">Nama Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Berat</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Total Berat</th>
                                        <th class="text-center">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $total = 0;

                                        $transaksi = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi a, tb_produk b WHERE a.id_produk = b.id_produk AND a.id_transaksi='$id' ");

                                        while ($d = mysqli_fetch_array($transaksi)) {
                                            $jml = $d['jumlah'];
                                            $total += $d['harga'];
                                            $berat = $d['berat'] * $d['jumlah'];;
                                        ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no++; ?></td>
                                                <td colspan="2"><?php echo $d['nama_produk']; ?></td>
                                                <td class="text-center"><?php echo "Rp. " . number_format($d['harga']) . ",-"; ?></td>
                                                <td class="text-center"><?= $d['berat']; ?> Gram</td>
                                                <td class="text-center"><?php echo number_format($d['jumlah']); ?></td>
                                                <td class="text-center"><?php echo $berat; ?> Gram</td>
                                                <td class="text-center"><?php echo "Rp. " . number_format($d['jumlah'] * $d['harga']) . " ,-"; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" style="border: none"></td>
                                            <th>Ongkir (<?php echo $i['kurir']; ?> - <?= $i['total_berat']; ?> Gram)</th>
                                            <td class="text-center"><?php echo "Rp. " . number_format($i['ongkir']) . " ,-"; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="border: none"></td>
                                            <th>Total Bayar</th>
                                            <td class="text-center"><?php echo "Rp. " . number_format($i['total_bayar']) . " ,-"; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <h5>Status :</h5>
                            <?php
                            if ($i['status_transaksi'] == 0) {
                                echo "<a href='#' ><span class='label label-danger'>Pesanan Gagal</span></a>";
                            } elseif ($i['status_transaksi'] == 1) {
                                echo "<a href='#' ><span class='label label-danger'>Belum Di Bayar</span></a>";
                            } elseif ($i['status_transaksi'] == 2) {
                                echo "<a href='#' ><span class='label label-warning'>Menunggu Validasi Pembayaran</span></a>";
                            } elseif ($i['status_transaksi'] == 3) {
                                echo "<a href='#' ><span class='label label-success'>Pemesanan Tervalidasi</span></a>";
                            } elseif ($i['status_transaksi'] == 4) {
                                echo "<a href='#' ><span class='label label-info'>Pesanan Telah DiKirim</span></a>";
                            } elseif ($i['status_transaksi'] == 5) {
                                echo "<a href='#' ><span class='label label-success'>Selesai</span></a>";
                            }
                            ?>



                        <?php
                    }
                        ?>
                        <div class="mt-4 mb-4">
                            <hr>
                            <b>PEMBAYARAN DI TUJUKAN KEPADA :</b>

                            <p><img src="gambar/bni1.png" alt="" style="width:100px;  margin-top:4px; margin-bottom:4px"> </p>
                            <p>34578634654 - an: mukidi </p>
                            <hr>
                            <img src="gambar/bri.png" alt="" style="width:130px;  margin-top:4px; margin-bottom:4px">
                            <p class="mt-3">34578634654 - an: mukidi </p>
                            <hr>
                            <p>Jika sudah melakukan pembayaran silahkan kirim konfirmasi pembayaran : <a href="konfirpembayaran.php?id=<?php echo $id; ?>" style="color:blue;">Klik Di Sini</a></p>
                        </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>