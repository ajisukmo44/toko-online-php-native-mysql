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
                        <h4 class="box-title">Data User <a href="tambahuser.php" class="badge badge-success badge-xs">Tambah User</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Jabatan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_user");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <td><?php echo $data['id_user']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['jabatan']; ?></td>
                                            <td>
                                                <a href="edituser.php?id_user=<?= $data['id_user']; ?>" class="btn btn-info btn-sm"><i class="menu-icon fa fa-edit"></i></a> <a href="komponen/userhapus.php?id_user=<?= $data['id_user']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm"><i class="menu-icon fa fa-trash"></i></a>
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