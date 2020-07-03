<?php session_start();
include 'koneksi.php';              // Panggil koneksi ke database
include 'fungsi/cek_login.php';    // Panggil fungsi cek sudah login/belum
include 'fungsi/cek_session.php';      // session
?>

<!doctype html>
<html class="no-js" lang="">

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

        <?php
        include 'content.php';
        ?>

        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->
    <?php
    include 'script.php';
    ?>