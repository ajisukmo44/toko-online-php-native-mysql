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
                        <h4 class="box-title">Data Pengiriman </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID Transaksi</th>
                                        <th>No Resi</th>
                                        <th>Nama Pengirim</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Keterangan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_pengiriman");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <td><?php echo $data['id_pengiriman']; ?></td>
                                            <td><?php echo $data['id_transaksi']; ?></td>
                                            <td><?php echo $data['no_resi']; ?></td>
                                            <td><?php echo $data['nama_pengirim']; ?></td>
                                            <td><?php echo $data['tanggal_kirim']; ?></td>
                                            <td><?php echo $data['keterangan']; ?></td>
                                            <td>
                                                <a href="komponen/pengirimanhapus.php?id_pengiriman=<?= $data['id_pengiriman']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm"><i class="menu-icon fa fa-trash"></i></a>
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