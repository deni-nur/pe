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
  <title><?=$title ?></title>
  <style type="text/css" media="print">
    .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
          }
    .upper {
          text-transform: uppercase;
          }
    span{
      font-weight: bold;
      margin-left: 170px;
    }
    body {        
      width: 100%;         
      height: 50%;        
      margin: 0;        
      padding: 0;         
      background-color: #FAFAFA;         
      font: 8pt "Tahoma";     
    }
    * {
      box-sizing: border-box;         
      -moz-box-sizing: border-box;15.     
    }
  </style>
</head>
<body onload="print()">
  
<table border="1" rules="none" cellpadding="0" cellspacing="0" width="100%" height="400px">
  <tbody>
    <tr>
      <td width="15%"></td>
      <td width="1%"></td>
      <td align="right" valign="top">Tahun Anggaran</td>
      <td align="center" valign="top">:</td>
      <td width="20%" align="left" valign="top"><?=year_date($kwitansi->tanggal) ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td align="right" width="30%" valign="top">Nomor Bukti</td>
      <td align="center" width="1%" valign="top">:</td>
      <td align="left" valign="top">Kwitansi. <?= $kwitansi->nomor_bukti ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td align="right" width="30%" valign="top">Mata Anggaran</td>
      <td align="center" width="1%" valign="top">:</td>
      <td align="left" valign="top"><?=$kwitansi->kode_urusan ?>.<?=$kwitansi->kode ?>.<?=$kwitansi->kode_program ?>.<?=$kwitansi->kode_kegiatan ?>.<?=$kwitansi->kode_subkeg ?>.<?=$kwitansi->kode_akun ?>.<?=$kwitansi->kode_kelompok ?>.<?=$kwitansi->kode_jenis ?>.<?=$kwitansi->kode_objek ?>.<?=$kwitansi->kode_rincian_objek ?>.<?=$kwitansi->kode_sub_rincian_objek ?></td>
    </tr>
    <tr>
      <td height="25px" colspan="5"></td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;&nbsp;&nbsp;<b>KWITANSI / BUKTI PEMBAYARAN</b></td>
    </tr>
    <tr>
      <td height="10px" colspan="5"></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;&nbsp;&nbsp;Sudah terima dari</td>
      <td valign="top">:</td>
      <td valign="top" colspan="3"><?=$kwitansi->jabatan_pa ?> DINAS TENAGA KERJA DAN TRANSMIGRASI
        <br>KABUPATEN SUKABUMI TAHUN ANGGARAN <?=year_date($kwitansi->tanggal) ?></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;&nbsp;&nbsp;Jumlah Uang</td>
      <td valign="top">:</td>
      <td valign="top" colspan="3"><?=indo_currency($kwitansi->biaya*$kwitansi->lama_perjalanan-$kwitansi->h_pajak) ?> ( <?=ucwords(number_to_words($kwitansi->biaya*$kwitansi->lama_perjalanan-$kwitansi->h_pajak)) ?> Rupiah )</td>
    </tr>
    <tr>
      <td valign="top">&nbsp;&nbsp;&nbsp;Untuk Pembayaran</td>
      <td valign="top">:</td>
      <td valign="top" colspan="3"><?=$kwitansi->uraian ?></td>
    </tr>
    <tr>
      <td height="25px" colspan="5"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><center>Sukabumi, <?=format_indo($kwitansi->tanggal) ?>
        <br>Yang menerima,
        <br>
        <br>
        <br>
        <br>
        <br><?=$kwitansi->name ?></center></td>
    </tr>
  </tbody>
</table>

<table border="1" rules="none" cellspacing="0" width="100%" height="400px">
  <tbody>
    <tr>
      <td align="top" colspan="3">&nbsp;&nbsp;&nbsp;Setuju dibebankan pada mata anggaran berkenaan.</td>
    </tr>
    <tr>
      <td align="center" colspan="3" valign="down">Lunas dibayar tanggal, <?=format_indo($kwitansi->tanggal) ?></td>
    </tr>
    <tr>
      <td width="30%" ><center><?=$kwitansi->jabatan_pptk ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><b><?=$kwitansi->ttd_pptk_name ?></b>
        <br>NIP. <?=$kwitansi->ttd_pptk_nip ?>
      </center></td>
      <td width="40%"><center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </center></td>
      <td width="30%" ><center><?=$kwitansi->jabatan_bpp ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br><b><?=$kwitansi->nama_bpp ?></b>
        <br>NIP. <?=$kwitansi->nip_bpp ?>
      </center></td>
    </tr>
    <tr>
      <td><center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </center></td>
      <td valign="top"><center>Mengetahui :
        <br><?=$kwitansi->jabatan_pa ?>
        <br>
        <br>
        <br>
        <br>
        <br><b><?=$kwitansi->nama_pa ?></b>
        <br>NIP. <?=$kwitansi->nip_pa ?>
      </center></td>
      <td><center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </center></td>
    </tr>
  </tbody>
</table>
</body>
</html>