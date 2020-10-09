<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/icon.png">
    <title>APB-MADRASAHKU</title>
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="main">
        <header>
        </header>
        
        <div id="tanggal" align="right">
            <span><?php
                $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
                $hr = $array_hr[date('N')];
                $tgl= date('j');
                $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
                $bln = $array_bln[date('n')];
                $thn = date('Y');
                echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " ";
                ?>
            </span>
        </div>
        <div class="sidebar-container">
            
            <ul class="sidebar-navigation">
                <li>
                <a href="<?php echo base_url('dashboard'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                </a>
                </li>

                <li class="header">Transaksi</li>
                <li>
                <a href="<?php echo base_url('transaksi'); ?>">
                    <i class="fa fa-user" aria-hidden="true"></i> Peminjaman Individu
                </a>
                </li>
                <li>
                <a href="<?php echo base_url('transaksi_kelas'); ?>">
                    <i class="fa fa-users" aria-hidden="true"></i> Peminjaman Kelas
                </a>
                </li>
                <li class="header">Laporan</li>
                <li>
                <a href="<?php echo base_url('transaksi/laporan'); ?>">
                    <i class="fa fa-folder-open" aria-hidden="true"></i> Pengembalian Individu
                </a>
                </li>
                <li>
                <a href="<?php echo base_url('transaksi_kelas/laporan'); ?>">
                    <i class="fa fa-folder-open" aria-hidden="true"></i> Pengembalian Kelas
                </a>
                </li>
                <li>
                <a href="<?php echo base_url('buku'); ?>">
                    <i class="fa fa-book" aria-hidden="true"></i> Data Buku
                </a>
                </li>
                    <li>
                <a href="<?php echo base_url('anggota'); ?>">
                    <i class="fa fa-male" aria-hidden="true"></i> Data Anggota
                </a>
                </li>
                <li class="header">
                    <a href="<?php echo base_url('login/logout'); ?>">
                    <i class="fa fa-power-off fa-fw" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
        </div>
      