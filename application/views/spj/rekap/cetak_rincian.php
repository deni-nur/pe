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
<h2 align="center">Rekapitulasi Realisasi Rincian Belanja Tahun <?= $this->fungsi->tahun_login()->tahun_perencanaan ?></h2>
<table class="table table-bordered table-striped" id="nilai" border="1" cellspacing="0">
    <br>
    <br>
<thead>
    <tr>
        <th rowspan="2"><center>No</center></th>
        <th rowspan="2"><center>Program, Kegiatan, Sub Kegiatan, Belanja dan Rincian Belanja</center></th>
        <th rowspan="2" width="17%">Nama</th>
        <th colspan="3" width="22%"><center>Realisasi</center></th>
    </tr>
    <tr>
        <th>Neto</th>
        <th>Pajak</th>
        <th>Jumlah</th>
    </tr>
</thead>
<tbody>
        <?php foreach($pp->result() as $key => $data) { ?>
            <tr>
                <th align="left" colspan="3"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?> <?=$data->nama_program ?></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th align="left" colspan="3"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?> <?=$data->nama_kegiatan ?></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th align="left" colspan="3"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?>.<?=$data->kode_subkeg ?> <?=$data->nama_subkeg ?></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        <?php } ?>
        <?php $no=1; $a=0;
            foreach($belanja->result() as $key => $data_belanja) {
            foreach($r_pp->result() as $key => $data_rpp) {
            if($data_belanja->belanja_id == $data_rpp->belanja_id) {
            $neto[]   = $data_rpp->biaya*$data_rpp->lama_perjalanan; $total_neto = array_sum($neto);
            $pajak[]  = $data_rpp->h_pajak; $total_pajak = array_sum($pajak);
                ++$a;
                if($a==1) { ?>
        <tr>
            <th align="left" colspan="3"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?>.<?=$data->kode_subkeg ?>.<?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?> <?=$data_belanja->nama_sub_rincian_objek ?></th>
            <th align="right"></th>
            <th></th>
            <th></th>
        </tr>
        <?php } ?>
        <tr>
            <td align="center" valign="top"><?=$no++ ?>.</td>
            <td><?=$data_rpp->uraian ?></td>
            <td><?=$data_rpp->nama_pemilik ?></td>
            <td align="right"><?=indo_bil($data_rpp->biaya*$data_rpp->lama_perjalanan) ?></td>
            <td align="right"><?=indo_bil($data_rpp->h_pajak) ?></td>
            <td align="right"><?=indo_bil($data_rpp->biaya*$data_rpp->lama_perjalanan-$data_rpp->h_pajak) ?></td>
        </tr>
        <?php }} $a=0; } ?>
       <tr>
           <td colspan="3" align="center"><b>TOTAL</td>
           <td align="right"><b><?=indo_bil($total_neto) ?></td>
           <td align="right"><b><?=indo_bil($total_pajak) ?></td>
           <td align="right"><b><?=indo_bil($total_neto-$total_pajak) ?></td>
        </tr>
</tbody>
</table>

<span id="hasil"></span>

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