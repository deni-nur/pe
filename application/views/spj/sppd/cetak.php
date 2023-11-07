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
  <title>Surat Perintah Perjalanan Dinas</title>
  <style type="text/css" media="print">
    .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
  </style>
</head>
<body onload="print()">
  <img src="<?php echo base_url('assets/images/kuya.png') ?>" style="position: absolute ; width: 100px; height: 130px;">
    <table width="100%" border="1" cellspacing="0">
        <tr>
            <td align="center" colspan="3">
                    <font size="3" face="Times New Roman">P E M E R I N T A H &nbsp;K A B U P A T E N &nbsp;S U K A B U M I</font>
                    <br><font size="4" face="Times New Roman">DINAS &nbsp;TENAGA &nbsp;KERJA &nbsp;DAN &nbsp;TRANSMIGRASI
                    <br>(DISNAKERTRANS)</font>
                    <br><font size="3" face="Times New Roman">Jl. Pelabuhan II Km. 6 No. 703 Telp/Fax. (0266) 226088</font>
                    <br><font size="3" face="Times New Roman" color="blue">email : disnakertrans@sukabumikab.go.id</font>
                    <br><font size="3" face="Times New Roman">SUKABUMI - 43169</font>
                    <hr class="line-title">
            </td>
            <td width="1%" rowspan="11"></td>
            <td width="25%"></td>
            <td width="25%">
              I. Berangkat dari : <?=$datasppd->tempat_berangkat ?><br>&nbsp;&nbsp;&nbsp;ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$datasppd->tempat_tujuan ?><br>&nbsp;&nbsp;&nbsp;Pada tanggal &nbsp;&nbsp;&nbsp;&nbsp;: <?=$datasppd->tgl_berangkat ?><br><center><?=$ttd_keu->jabatan_ttd_keu ?></center><br><br><br><center style="line-height: 0px;"><b><?=$ttd_keu->ttd_keu_name ?></b></center><br><center style="line-height: 0px;">NIP. <?=$ttd_keu->ttd_keu_nip ?></center><br>
            </td>
        </tr>
        <?php $no=1; ?>
        <tr>
          <td valign="top" align="center" width="2%"><?=$no++ ?>.</td>
          <td valign="top" width="23%"><?=$ttd_keu->jabatan_ttd_keu ?></td>
          <td valign="top" width="25%"><b><?=$ttd_keu->ttd_keu_name ?></td>
          <td width="25%" rowspan="3">II. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$datasppd->tempat_tujuan ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada tanggal : <?=$datasppd->tgl_berangkat ?><br><br>Kepala<br><br><br><br>Nama<br>NIP.
          </td>
          <td rowspan="3" width="25%">Berangkat dari : <?=$datasppd->tempat_tujuan ?><br>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$datasppd->tempat_berangkat ?><br>Pada tanggal &nbsp;&nbsp;&nbsp;: <?=$datasppd->tgl_pulang ?><br>Kepala<br><br><br><br>Nama<br>NIP.
          </td>
        </tr>
        <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">Nama/NIP Pegawai yang melaksanakan Perjalanan Dinas</td>
        <td valign="top"><?=$datasppd->name ?> / <?=$datasppd->nip ?></td>
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">a. Pangkat dan Golongan<br>b. Jabatan dan Instansi<br>c. Tingkat Biaya Perjalanan</td>
        <td valign="top">a. <?=$datasppd->pangkat ?> <?=$datasppd->gol ?><br>b. <?=$datasppd->jabatan_name ?><br>c. <?=$datasppd->tingkat_biaya ?></td>
        
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">Maksud Perjalanan Dinas :</td>
        <td valign="top" style="text-align: justify;"><?=$datasppd->maksud ?></td>
        <td rowspan="2">III. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada tanggal :<br><br>Kepala<br><br><br>Nama<br>NIP.
        </td>
        <td rowspan="2">Berangkat dari :<br>Ke &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>Pada tanggal &nbsp;&nbsp;&nbsp;:<br>Kepala<br><br><br>Nama<br>NIP.
        </td>
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">Alat Angkutan yang dipergunakan</td>
        <td valign="top"><?=$datasppd->alat_angkutan ?></td>
        
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">a. Tempat Berangkat<br>b. Tempat Tujuan</td>
        <td valign="top">a. <?=$datasppd->tempat_berangkat ?><br>b. <?=$datasppd->tempat_tujuan ?></td>
        <td rowspan="3">IV. Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$datasppd->tempat_berangkat ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada tanggal : <?=$datasppd->tgl_pulang ?><br><br><br><center><?=$ttd_keu->jabatan_ttd_keu ?></center><br><br><br><b><center style="line-height: 0px;"><?=$ttd_keu->ttd_keu_name ?></center></b><br><center style="line-height: 0px;">NIP. <?=$ttd_keu->ttd_keu_nip ?></center><br>
        </td>
        <td style="text-align: justify" colspan="2" rowspan="3">Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata mata untuk kepentingan jabatan dalam waktu sesingkat singkatnya.<br><br><center style="line-height: 0px;"><?=$ttd_keu->jabatan_ttd_keu ?></center><br><br><br><b><center style="line-height: 0px;"><?=$ttd_keu->ttd_keu_name ?></center></b><br><center style="line-height: 0px;">NIP. <?=$ttd_keu->ttd_keu_nip ?></center><br>
        </td>
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">a. Lamanya Perjalanan Dinas<br>b. Tanggal Berangkat<br>c. Tanggal harus kembali/tiba di tempat baru</td>
        <td valign="top">a. (<?=$datasppd->lama_perjalanan ?>) hari<br>b. <?=$datasppd->tgl_berangkat ?><br>c. <?=$datasppd->tgl_pulang ?></td>
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">Pengikut : Nama<br><?php $n=1; 
        foreach ($pengikut as $pengikut) : ?>
        <?=$n++ ?>. <?=$pengikut->name ?><br><?php endforeach; ?></td>
        <td valign="top">Tanggal Lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan</td>
        
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">Pembebanan Anggaran<br>a. Instansi<br>b. Mata Anggaran</td>
        <td valign="top"><br>a. <?=$datasppd->instansi ?><br>b. <?=$datasppd->kode_urusan ?>.<?=$datasppd->kode_bidang_urusan ?>.<?=$datasppd->kode_program ?>.<?=$datasppd->kode_kegiatan ?>.<?=$datasppd->kode_subkeg ?>.<?=$datasppd->kode_akun ?>.<?=$datasppd->kode_kelompok ?>.<?=$datasppd->kode_jenis ?>.<?=$datasppd->kode_objek ?>.<?=$datasppd->kode_rincian_objek ?>.<?=$datasppd->kode_sub_rincian_objek ?></td>
        <td style="text-align: justify;" colspan="3" rowspan="3" valign="top">V. <?=$ttd_keu->jabatan_ttd_keu ?> yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat / tiba, serta bendahara pengeluaran bertanggungjawab berdasarkan peraturan-peraturan Keuangan Negara Apabila negara menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.
        </td>
      </tr>
      <tr>
        <td valign="top" align="center"><?=$no++ ?>.</td>
        <td valign="top">Keterangan Lain-lain</td>
        <td></td>
      </tr>
    </table>
    <table width="100%">
      <tbody>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td></td>
        </tr>
      <tr>
        <td width="2%"></td>
        <td width="23%"></td>
        <td align="right" valign="bottom">Dikeluarkan di </td>
        <td colspan="" rowspan="" headers="">:</td>
        <td colspan="" rowspan="" headers=""><?=$datasppd->alamat ?></td>
        <td width="1%"></td>
        <td width="50%" colspan="" rowspan="" headers=""></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td align="right" valign="top">Pada tanggal</td>
        <td colspan="" rowspan="" headers="">:</td>
        <td colspan="" rowspan="" headers=""><?=$datasppd->tgl_berangkat ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="" rowspan="" headers=""></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td align="center" colspan="3"><?=$ttd_keu->jabatan_ttd_keu ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td height="60px"></td>
        <td colspan="" rowspan="" headers=""></td>
        <td colspan="" rowspan="" headers=""></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td align="center" colspan="3"><b><?=$ttd_keu->ttd_keu_name ?></b></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td align="center" colspan="3">NIP. <?=$ttd_keu->ttd_keu_nip ?></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>

  

</body>
</html>

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