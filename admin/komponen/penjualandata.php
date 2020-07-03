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
                        <h4 class="box-title">Data Penjualan </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Tanggal Checkout</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total Bayar</th>
                                        <th>status Transaksi</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_transaksi");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <td><?php echo $data['id_transaksi']; ?></td>
                                            <td><?php echo $data['tanggal_checkout']; ?></td>
                                            <td><?php echo $data['id_pelanggan']; ?></td>
                                            <td><?php echo $data['total_bayar']; ?></td>
                                            <td><?php echo $data['status_transaksi']; ?></td>
                                            <td>
                                                <a href="komponen/penjualanhapus.php?id_transaksi=<?= $data['id_transaksi']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm"><i class="menu-icon fa fa-trash"></i></a>
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