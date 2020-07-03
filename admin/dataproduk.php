<?php
include 'koneksi.php'

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Kopi Mukidi</title>
    <meta name="description" content="Kopi Mukidi - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include 'style.php'
    ?>

</head>

<body>
    <?php

    include 'sidebar.php';

    ?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php
        include 'header.php'
        ?>
        <!-- /#header -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">

                <!-- Orders -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Data Produk <a href="tambahproduk.php" class="badge badge-success badge-xs">Tambah Produk</a></h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Foto</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Berat</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Deskripsi</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM tb_produk a JOIN tb_kategori b ON a.id_kategori = b.id_kategori ORDER BY a.id_produk");
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <td><?php echo $data['id_produk']; ?></td>
                                                    <td style='text-align: center'><img src='images/produk/<?= $data['foto_produk'] ?>' width='50px' height='30px'></td>
                                                    <td><?php echo $data['nama_produk']; ?></td>
                                                    <td><?php echo $data['nama_kategori']; ?></td>
                                                    <td><?php echo $data['berat']; ?> Gram </td>
                                                    <td><?php echo $data['harga']; ?></td>
                                                    <td><?php echo $data['stok']; ?></td>
                                                    <?php echo "<td><a href='#myModal' class='badge badge-secondary' id='custId' data-toggle='modal' data-id=" . $data['id_produk'] . "> deskripsi </a></td>"; ?>

                                                    <td>
                                                        <a href="editproduk.php?id_produk=<?= $data['id_produk']; ?>" class="btn btn-info btn-sm"><i class="menu-icon fa fa-edit"></i></a> <a href="komponen/produkhapus.php?id_produk=<?= $data['id_produk']; ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-danger btn-sm"><i class="menu-icon fa fa-trash"></i></a>
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

        </div>

        <div class="clearfix"></div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p><b>DESKRIPSI PRODUK</b></p> <button type="button" class="badge badge-light" data-dismiss="modal"><i class="fa fa-times"> </i></button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- /#right-panel -->
    <?php
    include 'script.php';
    ?>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModal').on('show.bs.modal', function(e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'post',
                    url: 'deskripsiproduk.php',
                    data: 'rowid=' + rowid,
                    success: function(data) {
                        $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>