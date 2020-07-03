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
                        <h4 class="box-title">Data Kategori <a href="tambahkategori.php" class="badge badge-success badge-xs">Tambah Kategori</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tb_kategori");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <td><?php echo $data['id_kategori']; ?></td>
                                            <td><?php echo $data['nama_kategori']; ?></td>
                                            <td>
                                                <a href="editkategori.php?id_kategori=<?= $data['id_kategori']; ?>" class="btn btn-info btn-sm"><i class="menu-icon fa fa-edit"></i></a> <a href="komponen/kategorihapus.php?id_kategori=<?= $data['id_kategori']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm"><i class="menu-icon fa fa-trash"></i></a>
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