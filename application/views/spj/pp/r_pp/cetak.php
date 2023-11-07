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
    }
    body {        
      width: 100%;         
      height: 100%;        
      margin: 0;        
      padding: 0;         
      background-color: #FAFAFA;         
      font: 10pt "Tahoma";     
    }
    * {
      box-sizing: border-box;         
      -moz-box-sizing: border-box;15.     
    }
    .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
    }
  </style>
</head>

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
                <td colspan="2">Yth. Pengguna Anggaran</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>Nota Permintaan Dana</td>
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
        <?php foreach($pp->result() as $key => $data) { ?>
            <tr>
                <th align="left" colspan="9"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?> <?=$data->nama_program ?></th>
                <!-- <th align="right"><?=indo_bil($total_biaya) ?></th>
                <th align="right"><?=indo_bil($total_pajak) ?></th>
                <th align="right"><?=indo_bil($total_biaya - $total_pajak) ?></th>
                <th></th> -->
            </tr>
            <tr>
                <th align="left" colspan="9"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?> <?=$data->nama_kegiatan ?></th>
                <!-- <th align="right"><?=indo_bil($total_biaya) ?></th>
                <th align="right"><?=indo_bil($total_pajak) ?></th>
                <th align="right"><?=indo_bil($total_biaya - $total_pajak) ?></th>
                <th></th> -->
            </tr>
            <tr>
                <th align="left" colspan="9"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?>.<?=$data->kode_subkeg ?> <?=$data->nama_subkeg ?></th>
                <!-- <th align="right"><?=indo_bil($total_biaya) ?></th>
                <th align="right"><?=indo_bil($total_pajak) ?></th>
                <th align="right"><?=indo_bil($total_biaya - $total_pajak) ?></th>
                <th></th> -->
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
            <th align="left" colspan="9"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?>.<?=$data->kode_subkeg ?>.<?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?> <?=$data_belanja->nama_sub_rincian_objek ?></th>
            <!--<th align="right"><?=indo_bil($data_belanja->jumlah_biaya) ?></th>-->
            <!--<th align="right"><?=indo_bil($data_belanja->jumlah_pajak) ?></th>-->
            <!--<th align="right"><?=indo_bil($data_belanja->jumlah_biaya - $data_belanja->jumlah_pajak) ?></th>-->
            <!--<th></th>-->
        </tr>
        <?php } ?>
        <tr>
            <td align="center" valign="top"><?=$no++ ?>.</td>
            <td><?=$data_rpp->uraian ?></td>
            <td><?=$data_rpp->nama_pemilik ?></td>
            <td><?=$data_rpp->rek_bank ?></td>
            <td align="center"><?=$data_rpp->nama_bank ?></td>
            <td align="right"><?=indo_bil($data_rpp->biaya*$data_rpp->lama_perjalanan) ?></td>
            <td align="right"><?=indo_bil($data_rpp->h_pajak) ?></td>
            <td align="right"><?=indo_bil($data_rpp->biaya*$data_rpp->lama_perjalanan-$data_rpp->h_pajak) ?></td>
            <td></td>
        </tr>
        <?php }} $a=0; } ?>
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
      <td align="center">Sukabumi, <?=format_indo($data_rpp->tgl_rpp) ?></td>
    </tr>
    <tr>
      <th>Mengetahui,
        <br><center><?=$data_rpp->jabatan_pa ?></center></th>
        <th><br><center><?=$data_rpp->jabatan_ttd_keu ?></center></th>
        <th><br><center><?=$data_rpp->jabatan_bpp ?></center></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <br>
        <br>
        <br>
        <br>
        <b><center><?=$data_rpp->nama_pa ?></b>
        <br>NIP. <?=$data_rpp->nip_pa ?></center>
      </td>
      <td>
        <br>
        <br>
        <br>
        <br>
        <b><center><?=$data_rpp->ttd_keu_name ?></b>
        <br>NIP. <?=$data_rpp->nip ?></center>
      </td>
      <td>
        <br>
        <br>
        <br>
        <br>
        <b><center><?=$data_rpp->nama_bpp ?></b>
        <br>NIP. <?=$data_rpp->nip_bpp ?></center>
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