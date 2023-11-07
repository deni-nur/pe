<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DATE PICKER -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap-select.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap-select/dist/css/bootstrap-select.min.css">
  <title>Laporan Hasil Perjalanan Dinas</title>
  <style type="text/css" media="print"></style>
</head>
<body onload="print()">
<table style="width: 100%; font-family: Times New Roman; font-size: 11;">
    <tr>
        <td align="center" colspan="4"><font style="font-weight: bold;">LAPORAN HASIL PERJALAN DINAS</td>
    </tr>
</table>
<br>
<br>

<table border="1" cellspacing="0">
    <thead>
        <tr>
            <th style="text-align: center;" width="3%">NO</th>
            <th style="text-align: center;" width="36%">JENIS KEGIATAN</th>
            <th style="text-align: center;" width="36%">HASIL KEGIATAN</th>
            <th style="text-align: center;" width="25">KETERANGAN</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <tr>
            <td valign="top" style="text-align: center;"><?=$no++ ?></td>
            <td valign="top" style="text-align: justify;"><?=$datalhpd->maksud ?></td>
            <td valign="top" style="text-align: justify;"><?=$datalhpd->hasil_keg ?></td>
            <td valign="top" style="text-align: justify;">Surat Tugas Nomor : <br><?=$datalhpd->no_st ?> tanggal <br><?=$datalhpd->bln_surat ?> <?=$datalhpd->tahun_perencanaan ?></td>
        </tr>
        <?php ?>
    </tbody>
</table>

<table>
  <thead>
    <br>
    <tr>
      <td width="3%"></td>
      <td width="20%"></td>
      <td width="18%"></td>
      <td width="20%" style="text-align: center;"><?=$datalhpd->alamat ?>, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$datalhpd->bln_surat ?> <?=$datalhpd->tahun_perencanaan ?></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td align="center">Mengetahui dan Menyetujui :</td>
      <td colspan="" rowspan="" headers=""></td>
      <td colspan="" rowspan="" headers=""></td>
    </tr>
    <tr>
      <td colspan="" rowspan="" headers=""></td>
      <td align="center">Atasan Langsung</td>
      <td colspan="" rowspan="" headers=""></td>
      <td align="center">Pegawai yang mengajukan</td>
    </tr>
    <tr>
      <td height="60px"></td>
      <td></td>
    <tr>
      <td colspan="" rowspan="" headers=""></td>
      <td align="center"><?=$ttd->ttd_name ?></td>
      <td colspan="" rowspan="" headers=""></td>
      <td align="center"><?=$datalhpd->name ?></td>
    </tr>
    
    <tr>
      <td colspan="" rowspan="" headers=""></td>
      <td align="center">NIP. <?=$ttd->ttd_nip ?></td>
      <td colspan="" rowspan="" headers=""></td>
      <?php if(!empty($datalhpd->nip)) { ?>
      <td align="center">NIP. <?=$datalhpd->nip ?></td>
    </tr>
    <?php } ?>
     <tr>
      <td height="5px"></td>
    </tr>
    <?php foreach ($pengikut as $pengikut) { ?>
    <tr>
      <td></td>
      <td colspan="" rowspan="" headers=""></td>
      <td colspan="" rowspan="" headers=""></td>
      <td align="center">Pegawai yang mengajukan</td>
    </tr>
     <tr>
      <td height="60px"></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="" rowspan="" headers=""></td>
      <td colspan="" rowspan="" headers=""></td>
      <td align="center"><?=$pengikut->name ?></td>
    </tr>
    <?php if(!empty($pengikut->nip)) { ?>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td align="center">NIP. <?=$pengikut->nip ?></td>
    </tr>
    <?php } ?>
    <tr>
      <td height="5px"></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

</body>
</html>