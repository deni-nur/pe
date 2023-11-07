<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Disnakertrans | Perencanaan dan Evaluasi</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DATE PICKER -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logopemda.png">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap-select.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" type="text/css" href="">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/select2/dist/css/select2.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/select2/dist/css/select2.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2/animate.min.css">
  <style>
     .swal2-popup {
        font-size: 1.3rem !important;
     }
   </style>

</head>
<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">
  <header class="main-header">
    <a href="<?=base_url('dashboard')?>" class="logo">
      <span class="logo-mini"><b>P</b>E</span>
      <span class="logo-lg"><b>Perencanaan</b>Evaluasi</span>
    </a>
    <nav class="navbar navbar-default navbar-static-top  m-b-0">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>
      <p></p>
      <button class="btn btn-info"><a href="<?= site_url('portal') ?>" style="color: black"><i class="fa fa-database"> Portal - Tahun Log In <?= $this->fungsi->tahun_login()->tahun_perencanaan ?></i></button></a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown tasks-menu">
            
            
</li>
<!-- User Account -->
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" >
    <span class="hidden-xs"><?= $this->fungsi->user_login()->username ?></span>
  </a>
  <ul class="dropdown-menu">
    <li class="user-header">
      <img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" >
      <p><?= $this->fungsi->user_login()->name ?>
        <small><?= $this->fungsi->user_login()->address ?></small>
      </p>
    </li>
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="<?=site_url('auth/logout') ?>" class="btn btn-danger btn-flat">Sign out</a>
      </div>
    </li>
  </ul>
</li>
</ul>
</div>
</nav>
</header>

<!-- Left side column -->
<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
<div class="pull-left image">
  <img src="<?=base_url()?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" >
</div>
<div class="pull-left info">
  <p><?=ucfirst($this->fungsi->user_login()->username) ?></p>
  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<form action="#" method="get" class="sidebar-form">
<div class="input-group">
  <input type="text" name="q" class="form-control" placeholder="Search...">
  <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
</div>

</form>
<!-- sidebar menu -->
<ul class="sidebar-menu" data-widget="tree">
<li class="header">MAIN NAVIGATION</li>

<li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
  <a href="<?= site_url('portal/'.$this->uri->segment(2).'/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'darhum' || $this->uri->segment(3) == 'pangkat' || $this->uri->segment(3) == 'golongan' || $this->uri->segment(3) == 'jabatan' || $this->uri->segment(3) == 'pegawai' || $this->uri->segment(3) == 'ttd' || $this->uri->segment(3) == 'ttd_keu' || $this->uri->segment(3) == 'rekening' || $this->uri->segment(3) == 'provinsi' || $this->uri->segment(3) == 'kabupaten' || $this->uri->segment(3) == 'kecamatan' || $this->uri->segment(3) == 'desa' || $this->uri->segment(3) == 'dd' || $this->uri->segment(3) == 'ld' || $this->uri->segment(3) == 'akun' || $this->uri->segment(3) == 'kelompok' || $this->uri->segment(3) == 'jenis' || $this->uri->segment(3) == 'objek' || $this->uri->segment(3) == 'rincian_objek' || $this->uri->segment(3) == 'sub_rincian_objek' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-database"></i> <span>Master</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
      <li <?=$this->uri->segment(3) == 'darhum' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/darhum') ?>"><i class="fa fa-bookmark-o"></i> Dasar Hukum</a></li>

        <li class="treeview <?=$this->uri->segment(3) == 'pangkat' || $this->uri->segment(3) == 'golongan' || $this->uri->segment(3) == 'jabatan' || $this->uri->segment(3) == 'pegawai' ? 'active' : '' ?>">
          <a href="#"><i class="fa fa-group"></i> Daftar Pegawai
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <li <?=$this->uri->segment(3) == 'pangkat' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pangkat') ?>"><i class="fa fa-circle-o"></i> Pangkat</a></li>
        <li <?=$this->uri->segment(3) == 'golongan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/golongan') ?>"><i class="fa fa-circle-o"></i> Golongan</a></li>
        <li <?=$this->uri->segment(3) == 'jabatan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/jabatan') ?>"><i class="fa fa-circle-o"></i> Jabatan</a></li>
        <li <?=$this->uri->segment(3) == 'pegawai' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pegawai') ?>"><i class="fa fa-circle-o"></i> Pegawai</a></li>   
          </ul>
        </li>

        <li class="treeview <?=$this->uri->segment(3) == 'ttd' || $this->uri->segment(3) == 'ttd_keu' ? 'active' : '' ?>">
          <a href="#"><i class="fa fa-male"></i> Pejabat Penandatangan
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li <?=$this->uri->segment(3) == 'ttd' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/ttd') ?>"><i class="fa fa-circle-o"></i> Administrasi</a></li>
        <li <?=$this->uri->segment(3) == 'ttd_keu' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/ttd_keu') ?>"><i class="fa fa-circle-o"></i> Keuangan</a></li> 
          </ul>
        </li>

        <li <?=$this->uri->segment(3) == 'rekening' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/rekening') ?>"><i class="fa fa-bank"></i> Rekening Bank</a></li>

        <li class="treeview <?=$this->uri->segment(3) == 'provinsi' || $this->uri->segment(3) == 'kabupaten' || $this->uri->segment(3) == 'kecamatan' || $this->uri->segment(3) == 'desa' ? 'active' : '' ?>">
          <a href="#"><i class="fa fa-list"></i> Daftar Wilayah
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(3) == 'provinsi' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/provinsi') ?>"><i class="fa fa-circle-o"></i> Provinsi</a></li>
            <li <?=$this->uri->segment(3) == 'kabupaten' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/kabupaten') ?>"><i class="fa fa-circle-o"></i> Kabupaten</a></li>
            <li <?=$this->uri->segment(3) == 'kecamatan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/kecamatan') ?>"><i class="fa fa-circle-o"></i> Kecamatan</a></li>
            <li <?=$this->uri->segment(3) == 'desa' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/desa') ?>"><i class="fa fa-circle-o"></i> Desa</a></li>  
          </ul>
        </li>

        <li class="treeview <?=$this->uri->segment(3) == 'dd' || $this->uri->segment(3) == 'ld' ? 'active' : '' ?>">
          <a href="#"><i class="fa fa-taxi"></i> Standar Biaya Perjadin
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(3) == 'dd' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/dd') ?>"><i class="fa fa-circle-o"></i> Dalam Daerah</a></li>
            <li <?=$this->uri->segment(3) == 'ld' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/ld') ?>"><i class="fa fa-circle-o"></i> Luar Daerah</a></li>   
          </ul>
        </li>

        <li class="treeview <?=$this->uri->segment(3) == 'akun' || $this->uri->segment(3) == 'kelompok' || $this->uri->segment(3) == 'jenis' || $this->uri->segment(3) == 'objek' || $this->uri->segment(3) == 'rincian_objek' || $this->uri->segment(3) == 'sub_rincian_objek' ? 'active' : '' ?>">
          <a href="#"><i class="fa fa-balance-scale"></i> Neraca Belanja
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(3) == 'akun' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/akun') ?>"><i class="fa fa-circle-o"></i> Akun</a></li>
            <li <?=$this->uri->segment(3) == 'kelompok' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/kelompok') ?>"><i class="fa fa-circle-o"></i> Kelompok</a></li>
            <li <?=$this->uri->segment(3) == 'jenis' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/jenis') ?>"><i class="fa fa-circle-o"></i> Jenis</a></li>
            <li <?=$this->uri->segment(3) == 'objek' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/objek') ?>"><i class="fa fa-circle-o"></i> Objek</a></li>
            <li <?=$this->uri->segment(3) == 'rincian_objek' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/rincian_objek') ?>"><i class="fa fa-circle-o"></i> Rincian</a></li>
            <li <?=$this->uri->segment(3) == 'sub_rincian_objek' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/sub_rincian_objek') ?>"><i class="fa fa-circle-o"></i> Sub Rincian Objek</a></li>   
          </ul>
        </li>

    </ul>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'sasaran_rpjmd' || $this->uri->segment(3) == 'urusan' || $this->uri->segment(3) == 'bidang_urusan' || $this->uri->segment(3) == 'tujuan' || $this->uri->segment(3) == 'sasaran' || $this->uri->segment(3) == 'program' || $this->uri->segment(3) == 'kegiatan' || $this->uri->segment(3) == 'subkeg' || $this->uri->segment(3) == 'iku' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-hourglass-start"></i> <span>Perencanaan</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
      <li <?=$this->uri->segment(3) == 'sasaran_rpjmd' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/sasaran_rpjmd') ?>"><i class="fa fa-line-chart"></i> Sasaran RPJMD</a></li>
      <li <?=$this->uri->segment(3) == 'urusan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/urusan') ?>"><i class="fa fa-hourglass-o"></i> Urusan</a></li>
      <li <?=$this->uri->segment(3) == 'bidang_urusan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/bidang_urusan') ?>"><i class="fa fa-hourglass-half"></i> Bidang Urusan</a></l>

<li class="treeview <?=$this->uri->segment(3) == 'tujuan' || $this->uri->segment(3) == 'sasaran' || $this->uri->segment(3) == 'program' || $this->uri->segment(3) == 'kegiatan' || $this->uri->segment(3) == 'subkeg' ? 'active' : '' ?>">
  <a href="#"><i class="fa fa-angle-double-down"></i> Cascading RENSTRA
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?=$this->uri->segment(3) == 'tujuan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/tujuan') ?>"><i class="fa fa-circle-o"></i> Tujuan PD</a></li>
    <li <?=$this->uri->segment(3) == 'sasaran' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/sasaran') ?>"><i class="fa fa-circle-o"></i> Sasaran PD</a></li>
    <li <?=$this->uri->segment(3) == 'program' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/program') ?>"><i class="fa fa-circle-o"></i> Program</a></li>
    <li <?=$this->uri->segment(3) == 'kegiatan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/kegiatan') ?>"><i class="fa fa-circle-o"></i> Kegiatan</a></li>
    <li <?=$this->uri->segment(3) == 'subkeg' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/subkeg') ?>"><i class="fa fa-circle-o"></i> Sub Kegiatan</a></li>  
  </ul>
</li>

<li <?=$this->uri->segment(3) == 'iku' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/iku') ?>"><i class="fa fa-list-alt"></i> IKU SKPD</a>
</li>

</ul>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'pad' || $this->uri->segment(3) == 'dpa' || $this->uri->segment(3) == 'pk_kadis' || $this->uri->segment(3) == 'pk_kabid' || $this->uri->segment(3) == 'pk_kasi' || $this->uri->segment(3) == 'pk_kadis_perubahan' || $this->uri->segment(3) == 'pk_kabid_perubahan' || $this->uri->segment(3) == 'pk_kasi_perubahan' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-hourglass-half"></i> <span>Penganggaran</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">

<li class="treeview <?=$this->uri->segment(3) == 'pad' || $this->uri->segment(3) == 'dpa' ? 'active' : '' ?>">
  <a href="#"><i class="fa fa-copy"></i> DPA
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?=$this->uri->segment(3) == 'pad' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pad') ?>"><i class="fa fa-circle-o"></i> PAD</a></li>
    <li <?=$this->uri->segment(3) == 'dpa' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/dpa') ?>"><i class="fa fa-circle-o"></i> Sub Kegiatan</a></li>

  </ul>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'pk_kadis' || $this->uri->segment(3) == 'pk_kabid' || $this->uri->segment(3) == 'pk_kasi' ? 'active' : '' ?>">
  <a href="#"><i class="fa fa-hand-peace-o"></i> Perjanjian Kinerja
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?=$this->uri->segment(3) == 'pk_kadis' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pk_kadis') ?>"><i class="fa fa-circle-o"></i> Esselon II</a></li>
    <li <?=$this->uri->segment(3) == 'pk_kabid' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pk_kabid') ?>"><i class="fa fa-circle-o"></i> Esselon III</a></li>
    <li <?=$this->uri->segment(3) == 'pk_kasi' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pk_kasi') ?>"><i class="fa fa-circle-o"></i> Esselon IV</a></li>   
  </ul>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'pk_kadis_perubahan' || $this->uri->segment(3) == 'pk_kabid_perubahan' || $this->uri->segment(3) == 'pk_kasi_perubahan' ? 'active' : '' ?>">
  <a href="#"><i class="fa fa-hand-peace-o"></i> Perjanjian Kinerja Perubahan
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li <?=$this->uri->segment(3) == 'pk_kadis_perubahan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pk_kadis_perubahan') ?>"><i class="fa fa-circle-o"></i> Esselon II</a></li>
    <li <?=$this->uri->segment(3) == 'pk_kabid_perubahan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pk_kabid_perubahan') ?>"><i class="fa fa-circle-o"></i> Esselon III</a></li>
    <li <?=$this->uri->segment(3) == 'pk_kasi_perubahan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pk_kasi_perubahan') ?>"><i class="fa fa-circle-o"></i> Esselon IV</a></li>   
  </ul>
</li>
</ul>

<li class="treeview <?=$this->uri->segment(3) == 'st' || $this->uri->segment(3) == 'lhpd' || $this->uri->segment(3) == 'sppd' || $this->uri->segment(3) == 'pp' || $this->uri->segment(3) == 'kwitansi' || $this->uri->segment(3) == 'rekap' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-balance-scale"></i> <span>SPJ</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>

   <ul class="treeview-menu">
      <li <?=$this->uri->segment(3) == 'st' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/st') ?>"><i class="fa fa-clone"></i> Surat Tugas</a></li>
      <li <?=$this->uri->segment(3) == 'sppd' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/sppd') ?>"><i class="fa fa-sticky-note-o"></i> Surat Perintah Perjalan Dinas</a></li>
      <li <?=$this->uri->segment(3) == 'lhpd' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/lhpd') ?>"><i class="fa fa-file-o"></i> Laporan Hasil Perjalan Dinas</a></li>
      <li <?=$this->uri->segment(3) == 'pp' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pp') ?>"><i class="fa fa-dollar"></i> Permintaan Pembayaran</a></li>
    <!-- <li class="treeview <?=$this->uri->segment(3) == 'pp' ? 'active' : '' ?>">
      <a href="#"><i class="fa fa-circle-o"></i> Nota Permintaan Dana
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li <?=$this->uri->segment(3) == 'pp' ? 'class="active"' : '' ?>><a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp') ?>"><i class="fa fa-circle-o"></i> Permintaan Pembayaran</a></li>   
      </ul>
    </li> -->
    <li <?=$this->uri->segment(3) == 'kwitansi' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/kwitansi') ?>"><i class="fa fa-list-alt"></i> Kwitansi</a></li>
    <li <?=$this->uri->segment(3) == 'rekap' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/rekap') ?>"><i class="fa fa-paste"></i> Rekap Biaya</a></li>
    </ul>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'pelatihan' || $this->uri->segment(3) == 'kelembagaan' || $this->uri->segment(3) == 'bkk' || $this->uri->segment(3) == 'padat_karya' || $this->uri->segment(3) == 'tkm' || $this->uri->segment(3) == 'pmi' || $this->uri->segment(3) == 'pmi_kasus' || $this->uri->segment(3) == 'tka' || $this->uri->segment(3) == 'perusahaan' || $this->uri->segment(3) == 'umk' || $this->uri->segment(3) == 'spsb' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-area-chart"></i> <span>Data Tenaga Kerja</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
      <li <?=$this->uri->segment(3) == 'pelatihan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pelatihan') ?>"><i class="fa fa-graduation-cap"></i> Pelatihan Kerja</a></li>
      <li <?=$this->uri->segment(3) == 'kelembagaan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/kelembagaan') ?>"><i class="fa fa-university"></i> Kelembagaan</a></li>
      <li <?=$this->uri->segment(3) == 'bkk' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/bkk') ?>"><i class="fa fa-cubes"></i> Bursa Kerja Khusus</a></li>

      <li class="treeview <?=$this->uri->segment(3) == 'padat_karya' || $this->uri->segment(3) == 'tkm' ? 'active' : '' ?>">
          <a href="#"><i class="fa fa-object-ungroup"></i> Perluasan
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <li <?=$this->uri->segment(3) == 'padat_karya' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/padat_karya') ?>"><i class="fa fa-circle-o"></i> Padat Karya Infrastruktur</a></li>
        <li <?=$this->uri->segment(3) == 'tkm' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/tkm') ?>"><i class="fa fa-circle-o"></i> Tenaga Kerja Mandiri</a></li>   
          </ul>
        </li>

      <li <?=$this->uri->segment(3) == 'pmi' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pmi') ?>"><i class="fa fa-sign-out"></i> Penempatan PMI</a></li>
      <li <?=$this->uri->segment(3) == 'pmi_kasus' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pmi_kasus') ?>"><i class="fa fa-unlink"></i> PMI Bermasalah</a></li>
      <li <?=$this->uri->segment(3) == 'tka' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/tka') ?>"><i class="fa fa-user-plus"></i> Tenaga Kerja Asing</a></li>
      <li <?=$this->uri->segment(3) == 'perusahaan' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/perusahaan') ?>"><i class="fa fa-building-o"></i> Perusahaan</a></li>
      <li <?=$this->uri->segment(3) == 'umk' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/umk') ?>"><i class="fa fa-line-chart"></i> UMK</a></li>
      <li <?=$this->uri->segment(3) == 'spsb' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/spsb') ?>"><i class="fa fa-users"></i> SP/SB</a></li>
</ul>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'translok' || $this->uri->segment(3) == 'pnp_trans' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-bar-chart"></i> <span>Data Transmigrasi</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
      <li <?=$this->uri->segment(3) == 'pnp_trans' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/pnp_trans') ?>"><i class="fa fa-arrow-circle-down"></i> Penempatan Transmigrasi</a></li>
      <li <?=$this->uri->segment(3) == 'translok' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/translok') ?>"><i class="fa fa-th"></i> Transmigrasi Lokal</a></li>    
</ul>
</li>

<li class="treeview <?=$this->uri->segment(3) == 'dokren' || $this->uri->segment(3) == 'dokev' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-folder-open"></i> <span>Dokumen</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
    
      <li <?=$this->uri->segment(3) == 'dokren' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/dokren') ?>"><i class="fa fa-hourglass-start"></i> Perencanaan</a></li>
      <li <?=$this->uri->segment(3) == 'dokev' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/dokev') ?>"><i class="fa fa-hourglass-end"></i> Evaluasi</a></li>   
    </ul>
  </li>

<li class="treeview <?=$this->uri->segment(3) == 'report' || $this->uri->segment(3) == 'report_padat_karya' ? 'active' : '' ?>">
    <a href="#">
    <i class="fa fa-print"></i> <span>Report Dokumen</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
      <li <?=$this->uri->segment(3) == 'report' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/report') ?>"><i class="fa fa-file-text-o"></i> Renstra</a></li>

      <li class="treeview <?=$this->uri->segment(3) == 'report_padat_karya' || $this->uri->segment(3) == 'report_tkm' ? 'active' : '' ?>">
          <a href="#"><i class="fa fa-object-ungroup"></i> Perluasan
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <li <?=$this->uri->segment(3) == 'report_padat_karya' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/report_padat_karya') ?>"><i class="fa fa-circle-o"></i> Padat Karya Infrastruktur</a></li>
        <li <?=$this->uri->segment(3) == 'report_tkm' ? 'class="active"' : '' ?>><a href="<?= site_url('portal/'.$this->uri->segment(2).'/report_tkm') ?>"><i class="fa fa-circle-o"></i> Tenaga Kerja Mandiri</a></li>   
  </ul>
</li>

</ul>
</li>

<?php if($this->fungsi->user_login()->level == 1) { ?>
<li class="header">SETTINGS</li>
<li><a href="<?= site_url('portal/'.$this->uri->segment(2).'/portal_data') ?>"><i class="fa fa-ban"></i> <span> Portal</span></a></li>
<li><a href="<?= site_url('portal/'.$this->uri->segment(2).'/konfigurasi') ?>"><i class="fa fa-wrench"></i> <span> Konfigurasi</span></a></li>
<li><a href="<?= site_url('portal/'.$this->uri->segment(2).'/user') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
<!-- <li><a href="<?= site_url('portal/'.$this->uri->segment(2).'/userdetails') ?>"><i class="fa fa-user"></i> <span>IP</span></a></li> -->
  <?php } ?>
</ul>
</section>
</aside>

  <script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Content -->
  <div class="content-wrapper">
  	<?php echo $contents ?>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://disnakertrans.sukabumikab.go.id">Disnakertrans</a>.</strong> Perencanaan dan Evaluasi.
  </footer>

</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
<!-- date picker -->
<script src="<?php echo base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<!-- <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/jquery-3.4.1.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap.bundle.js"></script> -->
<script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap-select/dist/js/bootstrap-select.js"></script>

<script src="<?php echo base_url() ?>assets/select2/dist/js/select2.js"></script>
<script src="<?php echo base_url() ?>assets/select2/dist/js/select2.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script> -->

<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  var flash = $('#flash').data('flash');
  if(flash) {
    Swal.fire({
      icon : 'success',
      title : 'Success',
      text : flash,
      showClass : {
          popup : 'animate__animated animate__fadeInDown'
      },
      hideClass : {
          popup : 'animate__animated animate__fadeOutUp'
      }
    })
  }

  $(document).on('click', '#btn-hapus', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      showClass : {
          popup : 'animate__animated animate__jackInTheBox'
      },
      hideClass : {
          popup : 'animate__animated animate__zoomOut'
      }
    }).then((result) => {
      if (result.isConfirmed) {
          window.location = link;
      }
    })
  })
</script>

<script>
  $(function () {
    $('#table1').DataTable()
    $('#table2').DataTable()
    $('#table3').DataTable()
    $('#table4').DataTable()
    $('#table5').DataTable()
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  
</script>

</body>
</html>
