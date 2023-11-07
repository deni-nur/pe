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
  <img src="<?php echo base_url('assets/images/kuya.png') ?>" style="position: absolute ; width: 90px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                    <font size="3" face="Times New Roman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P E M E R I N T A H &nbsp;&nbsp;K A B U P A T E N &nbsp;&nbsp;S U K A B U M I</font>
                    <br><font size="5" face="Times New Roman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DINAS TENAGA KERJA DAN TRANSMIGRASI
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(DISNAKERTRANS)</font>
                    <br><font size="3" face="Times New Roman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jl. Pelabuhan II Km. 6 No. 703 Telp/Fax. (0266) 226088</font>
                    <br><font size="3" face="Times New Roman" color="blue">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;email : disnakertrans@sukabumikab.go.id</font>
                    <br><font size="3" face="Times New Roman">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUKABUMI - 43169</font>
                    <hr class="line-title">  
            </td>
        </tr>
    </table>
<br>

<table width="100%">
  <tr>
    <td colspan="3" align="center"><b>RINCIAN BIAYA PERJALANAN DINAS</b></td>
  </tr>
</table>
<br>  

<table width="100%">
  <tbody>
    <tr>
      <td width="20%">Lampiran SPPD Nomor</td>
      <td width="1%">:</td>
      <td></td>
    </tr>
    <tr>
      <td width="20%">Tanggal</td>
      <td width="1%">:</td>
      <td><?=format_indo($kwitansi->tanggal) ?></td>
    </tr>
  </tbody>
</table>
<br>

<table border="1" width="100%" id="nilai" cellpadding="0" cellspacing="0">
  <thead>
    <?php $neto[]   = $kwitansi->biaya*$kwitansi->lama_perjalanan; $total_neto=array_sum($neto) ?>
    <tr>
      <th height="40px" width="3%">NO</th>
      <th>PERINCIAN BIAYA</th>
      <th>JUMLAH (RP)</th>
      <th>KETERANGAN</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td align="center">1.</td>
      <td>Uang Harian</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td><!-- <?=$kwitansi->uraian ?> --> (<?=$kwitansi->lama_perjalanan ?> hari X <?=indo_bil($kwitansi->biaya) ?>)</td>
      <td align="center"><?=indo_bil($kwitansi->biaya*$kwitansi->lama_perjalanan) ?></td>
      <td><?=$kwitansi->tempat_tujuan ?></td>
    </tr>
    <tr>
      <td align="center">2.</td>
      <td>Biaya Penginapan</td>
      <td align="center"></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td height="18px"></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td align="center">3.</td>
      <td>Biaya Transport</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td height="18px"></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><b>JUMLAH</b></td>
      <td align="center"><b><?=indo_bil($total_neto) ?></td>
      <td></td>
    </tr>
  </tbody>
</table>
<span id="hasil"></span>
<br>

<table width="100%">
  <tbody>
    <tr>
      <td width="35%" align="center">
        <br>Telah dibayar sejumlah
        <br><b><?=indo_currency($total_neto) ?></b>
        <br><?=$kwitansi->jabatan_bpp ?>
        <br>
        <br>
        <br>
        <br>
        <br><b><?=$kwitansi->nama_bpp ?></b>
        <br>NIP. <?=$kwitansi->nip_bpp ?>
      </td>
      <td>
      </td>
      <td width="35%" align="center">Sukabumi, <?=format_indo($kwitansi->tanggal) ?>
        <br>Telah menerima jumlah uang sebesar
        <br><b><?=indo_currency($total_neto) ?></b>
        <br>Yang menerima,
        <br>
        <br>
        <br>
        <br>
        <br><b><?=$kwitansi->name ?></b>
        <br>NIP. <?=$kwitansi->nip ?>
      </td>
    </tr>
    <tr>
      <td colspan="3" align="center">PERHITUNGAN SPD RAMPUNG</td>
    </tr>
    <tr>
      <td>Ditetapkan sejumlah
        <br>Yang telah dibayar semula
        <br>Sisa kurang/lebih
      </td>
      <td></td>
      <td>Rp. -
        <br>Rp. -
        <br>Rp. -
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td align="center"><?=$kwitansi->jabatan_pa ?>
        <br>
        <br>
        <br>
        <br>
        <br><b><?=$kwitansi->nama_pa ?></b>
        <br>NIP. <?=$kwitansi->nip_pa ?>
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
      sumHsl = sumHsl + parseInt(table.rows[t].cells[3].innerHTML);
    }
    document.getElementById("hasil").innerHTML = "Sum Value = "+ sumHsl;
    
  </script>