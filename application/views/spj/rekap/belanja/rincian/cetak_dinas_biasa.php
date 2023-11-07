<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rekapitulasi Biaya </title>
	<link rel="stylesheet" href="">
</head>
<body>
  
  <?php foreach($objekbelanja->result() as $key => $data) { ?>
    <?php } ?>    
	<h3><center>Rekapitulasi Biaya <?=$data->nama_sub_rincian_objek ?>
  <?php foreach($pp->result() as $key => $data) { ?>
  <?php } ?> 
    <br>Sub Kegiatan <?=$data->nama_subkeg ?> 
  <br>Kegiatan <?=$data->nama_kegiatan ?>
  <br><?=$data->nama_program ?>
  <br>Dinas Tenaga Kerja dan Transmigrasi
        <br>Kabupaten Sukabumi
        <br>Tahun Anggaran <?= $this->fungsi->tahun_login()->tahun_perencanaan ?></center></h3>
  

  <?php foreach($rincian->result() as $key => $data) { ?>
  <?php } ?>
    Dibayar, <?=format_indo($data->tgl_kwitansi) ?>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" id="nilai">
        <thead>
          <tr>
            <th rowspan="3"><center>No</center></th>
            <th rowspan="3"><center>No. Bukti</center></th>
            <th rowspan="3"><center>Tanggal</center></th>
            <th rowspan="3"><center>Nama</center></th>
            <th rowspan="3"><center>No ST</center></th>
            <th rowspan="2" colspan="2"><center>Tanggal di ST</center></th>
            <th rowspan="3"><center>Jumlah Dibayarkan</center></th>
            <th rowspan="3"><center>Gol. Peg</center></th>
            <th rowspan="3"><center>Tujuan</center></th>
            <th colspan="3"><center>SPPD</center></th>
            <th colspan="5"><center>Rincian Biaya</center></th>
            <th colspan="6"><center>Tiket</center></th>
          </tr>
          <tr>
            <th colspan="2"><center>Tanggal</center></th>
            <th rowspan="2"><center>Lama Hari</center></th>
            <th colspan="2"><center>Lumsum</center></th>
            <th rowspan="2"><center>Transport</center></th>
            <th rowspan="2"><center>Kontribusi</center></th>
            <th rowspan="2"><center>Representasi</center></th>
            <th rowspan="2"><center>Jumlah</center></th>
            <th rowspan="2"><center>Tujuan</center></th>
            <th colspan="2"><center>Berangkat</center></th>
            <th colspan="2"><center>Kembali</center></th>
          </tr>
         <tr>
            <th ><center>Mulai</center></th>
            <th><center>Selesai</center></th>
            <th ><center>Berangkat</center></th>
            <th ><center>Kembali</center></th>
            <th ><center>Per Hari</center></th>
            <th ><center>Total</center></th>
            <th ><center>Tanggal</center></th>
            <th ><center>Pswt</center></th>
            <th ><center>Tanggal</center></th>
            <th ><center>Pswt</center></th>
         </tr>
         <tr>
          	<th ><center>1</center></th>
            <th ><center>2</center></th>
            <th ><center>3</center></th>
            <th ><center>4</center></th>
            <th ><center>5</center></th>
            <th ><center>6</center></th>
            <th><center>7</center></th>
            <th ><center>8</center></th>
            <th ><center>9</center></th>
            <th ><center>10</center></th>
            <th ><center>11</center></th>
            <th ><center>12</center></th>
            <th ><center>13=12-11</center></th>
            <th ><center>14</center></th>
            <th ><center>15=13x14</center></th>
            <th ><center>16</center></th>
            <th ><center>17</center></th>
            <th ><center>18=15+16+17</center></th>
            <th ><center>19=15+16+17+18</center></th>
            <th ><center>20</center></th>
            <th ><center>21</center></th>
            <th ><center>22</center></th>
            <th ><center>23</center></th>
            <th ><center>24</center></th>
         </tr>
        </thead>
        <tbody>
        <?php $no=0; $a=0;
            foreach($belanja->result() as $key => $data_belanja) {
            foreach($r_pp->result() as $key => $data_rpp) {
            if($data_belanja->belanja_id == $data_rpp->belanja_id) {
            $neto[]   = $data_rpp->biaya*$data_rpp->lama_perjalanan; $total_neto = array_sum($neto);
            $jumlah[]   = $data_rpp->biaya*$data_rpp->lama_perjalanan; $total = array_sum($jumlah);
                ++$a;
                if($a==1) { ?>
          <?php } ?>
          <tr>
            <td align="center"><?=++$no; ?>.</td>
            <td></td>
            <td><?=indo_date($data_rpp->tgl_kwitansi) ?></td>
            <td><?=$data_rpp->name ?></td>
            <td><?=$data_rpp->no_st ?></td>
            <td><?=$data_rpp->tgl_berangkat ?></td>
            <td><?=$data_rpp->tgl_pulang ?></td>
            <td><?=indo_currency($data_rpp->biaya * $data_rpp->lama_perjalanan) ?></td>
            <td><?=$data_rpp->golongan ?></td>
            <td><?=$data_rpp->tempat_tujuan ?></td>
            <td><?=$data_rpp->tgl_berangkat ?></td>
            <td><?=$data_rpp->tgl_pulang ?></td>
            <td><?=$data_rpp->lama_perjalanan ?> hari</td>
            <td><?=indo_currency($data_rpp->biaya) ?></td>
            <td><?=indo_currency($data_rpp->biaya * $data_rpp->lama_perjalanan) ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?=indo_currency($data_rpp->biaya * $data_rpp->lama_perjalanan) ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        <?php }} $a=0; } ?>
        	<tr>
            <td align="center" colspan="7" ><b>Jumlah</b></td>
            <td><b><?=indo_currency($total_neto) ?></b></td>
            <td colspan="10"></td>
            <td><b><?=indo_currency($total) ?></b></td>
            <td colspan="5"></td>
          </tr>
        </tbody>
      </table>
      <span id="hasil"></span>

</table>
<br>
<table width="100%">
  <thead>
    <tr>
      <td></td>
      <td></td>
      <td align="center">Sukabumi, <?=format_indo($data_rpp->tgl_kwitansi) ?></td>
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