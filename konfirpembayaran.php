<?php include 'header2.php';
$id  = mysqli_real_escape_string($koneksi, $_GET['id']);

?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="bg-light">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">konfirmasi pembayaran</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section" style="background-color: #D5B487; margin:auto;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row bg-light col-md-8 mt-4 mb-4 konfirpembayaran">
            <div class="col-md-12">
                <div class="order-summary clearfix">
                    <div class="section-title" style="text-align:center">
                        <h3 class="title">KONFIRMASI PEMBAYARAN</h3>
                    </div>

                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "duplikat") {
                            echo "<div class='alert alert-danger text-center'>Maaf id_bayar ini sudah digunakan, silahkan gunakan email yang lain.</div>";
                        }
                    }
                    ?>


                    <form action="konfirpembayaran_act.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">NO INVOICE</label>
                            <input type="text" class="input" required="required" name="id_transaksi" value="<?= $id ?> " readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Rekening</label>
                            <input type="text" class="input" required="required" name="nama_rekening" placeholder="Masukkan nama rekenning ..">
                        </div>
                        <div class="form-group">
                            <label for="">Bank</label>
                            <input type="text" class="input" required="required" name="bank" placeholder="Masukkan nama bank ..">
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Transfer</label>
                            <input type="number" class="input" required="required" name="jumlah_transfer" placeholder="Masukkan jumlah transfer ..">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Transfer</label>
                            <input type="date" class="input" required="required" name="tanggal_transfer">
                        </div>
                        <div class="form-group">
                            <label for="">Bukti Transfer</label>
                            <input type="file" class="input" required="required" name="bukti_transfer">
                            <small class="text-muted">File yang diperbolehkan hanya file gambar.</small>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="primary-btn btn-block mb-3" value="Kirim Konfirmasi Pembayaran">
                        </div>
                    </form>

                </div>

            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->



<?php include 'footer.php'; ?>