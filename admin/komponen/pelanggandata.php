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
                        <h4 class="box-title">Data Pelanggan </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th>Alamat</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_pelanggan");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <td><?php echo $data['id_pelanggan']; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['nama_pelanggan']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['no_hp']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td></td>
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