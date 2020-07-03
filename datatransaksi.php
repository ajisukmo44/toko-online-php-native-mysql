<?php
include 'header2.php';
?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="bg-light">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Data Transaksi</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<div class="section" style="background-color: #D5B487;">
    <div class="container mb-5">

        <div class="row bg-light mb-5 mt-5" style="border-radius: 1%;">
            <?php
            include 'psidebar.php';
            ?>
            <div class="col-lg-9 mt-4 mb-4">

                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == "gagal") {
                        echo "<div class='alert alert-danger'>Gambar gagal diupload!</div>";
                    } elseif ($_GET['alert'] == "sukses") {
                        echo "<div class='alert alert-success'>Transaksi berhasil dibuat, silahkan melakukan pembayaran!</div>";
                    } elseif ($_GET['alert'] == "terkirim") {
                        echo "<div class='alert alert-success'>Konfirmasi pembayaran berhasil terkirim, silahkan menunggu konfirmasi dari admin!</div>";
                    }
                }
                ?>
                <div class="form-group">
                    <h3 class="title" for="">RIWAYAT DATA TRANSAKSI</h3>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Detail</th>
                                <th>Tgl Checkout</th>
                                <th class="text-center">Status Transaksi</th>
                                <th class="text-center">No Resi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = $_SESSION['id_pelanggan'];
                            $invoice = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi a JOIN tb_transaksi b ON a.id_transaksi = b.id_transaksi WHERE id_pelanggan= '$id' GROUP BY  a.id_transaksi ORDER BY b.id_transaksi ASC");

                            while ($i = mysqli_fetch_array($invoice)) {
                                $tanggal = date('d-m-Y', strtotime($i['tanggal_checkout']));
                            ?>
                                <tr>
                                    <td> <?php echo $i['id_transaksi']; ?> </td>
                                    <td> <a class='btn btn-sm btn-default btn-xs' href="invoice.php?id=<?php echo $i['id_transaksi']; ?>"><i class="fa fa-file"></i> detail</a> </td>
                                    <td><?= $tanggal ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($i['status_transaksi'] == 0) {
                                            echo "<a href='#' ><span class='label label-danger'>Pesanan Gagal</span></a>";
                                        } elseif ($i['status_transaksi'] == 1) {
                                            echo "<a href='#' ><span class='label label-danger'>Belum Di Bayar</span></a>";
                                        } elseif ($i['status_transaksi'] == 2) {
                                            echo "<a href='#' ><span class='label label-warning'>Menunggu Validasi Pembayaran</span></a>";
                                        } elseif ($i['status_transaksi'] == 3) {
                                            echo "<a href='#' ><span class='label label-primary'>Pemesanan Berhasil</span></a>";
                                        } elseif ($i['status_transaksi'] == 4) {
                                            echo "<a href='#' ><span class='label label-info'>Pesanan Telah DiKirim</span></a>";
                                        } elseif ($i['status_transaksi'] == 5) {
                                            echo "<a href='#' ><span class='label label-success'>Selesai</span></a>";
                                        }
                                        ?>
                                    </td>

                                    <?php
                                    $ido = $i['id_transaksi'];
                                    $sql = "select * from tb_pengiriman where id_transaksi= '$ido' ";
                                    $query = mysqli_query($koneksi, $sql);
                                    $data = mysqli_fetch_array($query);
                                    $no_resi = $data['no_resi'];

                                    ?>

                                    <td class="text-center">
                                        <?php
                                        if ($i['status_transaksi'] == 4) {
                                            echo $no_resi;
                                        } elseif ($i['status_transaksi'] == 5) {
                                            echo $no_resi;
                                        } elseif ($i['status_transaksi'] == 3) {
                                            echo "-";
                                        } elseif ($i['status_transaksi'] == 2) {
                                            echo "-";
                                        } elseif ($i['status_transaksi'] == 1) {
                                            echo "-";
                                        };
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $ido = $i['id_transaksi'];
                                        $Status = $i['status_transaksi'];
                                        $a1 = "<a class='btn btn-sm btn-primary btn-xs' href='konfirpembayaran.php?id=$ido'><i class='fa fa-dollar'></i> Konfir Pembayaran</a>";

                                        $a2 = "<a class='btn btn-sm btn-success btn-xs' href='selesai_act.php?id=$ido'><i class='fa fa-check'></i> Selesai</a>";

                                        if ($Status  == 1) {
                                            echo $a1;
                                        } else if ($Status  == 2) {
                                            echo '-';
                                        } else if ($Status  == 3) {
                                            echo $a2;
                                        } else if ($Status  == 4) {
                                            echo $a2;
                                        } else {
                                            echo '-';
                                        };

                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>