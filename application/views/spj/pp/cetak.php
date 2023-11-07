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
    span{
      font-weight: bold;
      margin-left: 170px;
  </style>
</head>
<body onload="print()">
    <table>
        <tbody>
            <tr>
                <td width="5%">No</td>
                <td width="2%">:</td>
                <td width="60%"></td>
                <td width="20%">Kepada :</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td></td>
                <td colspan="2">Yth. Bendahara Pengeluaran</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>Permintaan Pembayaran</td>
                <td colspan="2">Di</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2">Tempat</td>
            </tr>
        </tbody>
    </table>
<table class="table table-bordered table-striped" id="nilai" border="1" cellspacing="0">
    <br>
    <br>
<thead>
    <tr>
        <th rowspan="2"><center>No</center></th>
        <th rowspan="2" width="30%"><center>Program, Kegiatan, Sub Kegiatan dan Kode Rekening</center></th>
        <th colspan="3"><center>Rekening Tujuan</center></th>
        <th colspan="3"><center>Nilai</center></th>
        <th rowspan="2"><center>Keterangan</center></th>
    </tr>
    <tr>
        <th>Nama</th>
        <th>No. Rekening</th>
        <th>Bank</th>
        <th>Neto</th>
        <th>Pajak</th>
        <th>Jumlah</th>
    </tr>
</thead>
<tbody>
        <tr>
            <td colspan="7"><b><?=$pp->kode_urusan ?>.<?=$pp->kode ?>.<?=$pp->kode_program ?> <?=$pp->nama_program ?>
              <br><?=$pp->kode_urusan ?>.<?=$pp->kode ?>.<?=$pp->kode_program ?>.<?=$pp->kode_kegiatan ?> <?=$pp->nama_kegiatan ?></b>
              <br><?=$pp->kode_urusan ?>.<?=$pp->kode ?>.<?=$pp->kode_program ?>.<?=$pp->kode_kegiatan ?>.<?=$pp->kode_subkeg ?> <?=$pp->nama_subkeg ?>
            </td>
            <td></td>
            <td></td>
        </tr>
    <?php $no = 1; foreach($r_pp->result() as $key => $data_pp) {
          $neto[]   = $data_pp->biaya*$data_pp->lama_perjalanan; $total_neto = array_sum($neto);
          $pajak[]  = $data_pp->h_pajak; $total_pajak = array_sum($pajak);
         ?>
        <tr>
            <td colspan="7"><?=$pp->kode_urusan ?>.<?=$pp->kode ?>.<?=$pp->kode_program ?>.<?=$pp->kode_kegiatan ?>.<?=$pp->kode_subkeg ?>.<?=$data_pp->kode_rek ?> <?=$data_pp->nama_rek ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td align="center" valign="top"><?=$no++ ?>.</td>
            <td><?=$data_pp->uraian ?></td>
            <td><?=$data_pp->nama_pemilik ?></td>
            <td><?=$data_pp->rek_bank ?></td>
            <td align="center"><?=$data_pp->nama_bank ?></td>
            <td align="right"><?=indo_bil($data_pp->biaya*$data_pp->lama_perjalanan) ?></td>
            <td align="right"><?=indo_bil($data_pp->h_pajak) ?></td>
            <td align="right"><?=indo_bil($data_pp->biaya*$data_pp->lama_perjalanan-$data_pp->h_pajak) ?></td>
            <td></td>
        </tr>
     <?php } ?>
       <tr>
           <td colspan="5" align="center"><b>TOTAL</td>
           <td align="right"><b><?=indo_bil($total_neto) ?></td>
           <td align="right"><b><?=indo_bil($total_pajak) ?></td>
           <td align="right"><b><?=indo_bil($total_neto-$total_pajak) ?></td>
           <td></td>
        </tr>
</tbody>
</table>
<span id="hasil"></span>
<table>
  <tbody>
    <tr>
      <td><br>Demikian atas bantuan dan kerjasama kami ucapkan terimakasih.</td>
    </tr>
  </tbody>
</table>
<br>
<table width="100%">
  <thead>
    <tr>
      <td></td>
      <td></td>
      <td align="center">Sukabumi, <?=format_indo($pp->tgl_pp) ?></td>
    </tr>
    <tr>
      <th>Mengetahui,
        <br><center><?=$pp->jabatan_pa ?></center></th>
        <th></th>
        <th><center><?=$pp->jabatan_ttd_keu ?></center></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <br>
        <br>
        <br>
        <br>
        <b><center><?=$pp->nama_pa ?></b>
        <br>NIP. <?=$pp->nip_pa ?></center>
      </td>
      <td></td>
      <td>
        <br>
        <br>
        <br>
        <br>
        <b><center><?=$pp->ttd_keu_name ?></b>
        <br>NIP. <?=$pp->nip ?></center>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>

<script>
    var table = document.getElementById("nilai"), sumHsl = 0;
    for(var t = 1; t < table.rows.length; t++)
    {
      sumHsl = sumHsl + parseInt(table.rows[t].cells[7].innerHTML);
    }
    document.getElementById("hasil").innerHTML = "Sum Value = "+ sumHsl;
    
  </script>