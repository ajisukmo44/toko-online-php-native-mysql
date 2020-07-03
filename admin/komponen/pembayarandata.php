<!-- query -->
<?php
include 'koneksi.php';
?>

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">

        <!-- Orders -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Data Pembayaran </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Nama Rekening</th>
                                        <th>Nama Bank</th>
                                        <th>Jumlah Transfer</th>
                                        <th>Tanggal Transfer</th>
                                        <th>Bukti Transfer</th>
                                        <th>status Pembayaran</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_pembayaran");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <td><?php echo $data['id_transaksi']; ?></td>
                                            <td><?php echo $data['nama_rekening']; ?></td>
                                            <td><?php echo $data['nama_bank']; ?></td>
                                            <td><?php echo $data['jumlah_transfer']; ?></td>
                                            <td><?php echo $data['tanggal_transfer']; ?></td>
                                            <td><?php echo $data['bukti_transfer']; ?></td>
                                            <td><?php echo $data['status_pembayaran']; ?></td>
                                            <td>
                                                <a href="komponen/pembayaranhapus.php?id_pembayaran=<?= $data['id_pembayaran']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm"><i class="menu-icon fa fa-trash"></i></a>
                                            </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-8 -->
            <!-- /.orders -->
            <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->