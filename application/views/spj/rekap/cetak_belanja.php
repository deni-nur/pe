<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$title ?></title>
	<link rel="stylesheet" href="">
</head>
<body onload="print()">
	<h2><center>Rekapitulasi Realisasi Belanja Anggaran Tahun <?= $this->fungsi->tahun_login()->tahun_perencanaan ?></center></h2>
    <table border="1" width="100%" id="nilai">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th>Program / Kegiatan / Sub Kegiatan / Belanja</th>
                <th>Pagu Anggaran</th>
                <th>Realisasi</th>
                <th>Sisa</th>
            </tr>
            <?php $no=0; $a=0; $b=0;
                    foreach($pp->result() as $key => $data) { 
                    foreach($realisasi->result() as $key => $data_realisasi) {
                    if($data->pp_id == $data_realisasi->pp_id) {
                    ++$b;
                    if($b==1) { ?>
            <?php } ?>
            <tr>
                <th align="left" colspan="2"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?> <?=$data->nama_program ?></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th align="left" colspan="2"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?> <?=$data->nama_kegiatan ?></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th align="left" colspan="2"><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?>.<?=$data->kode_subkeg ?> <?=$data->nama_subkeg ?></th>
                <th align="right"><?=indo_bil($data->jumlah_pagu_subkeg) ?></th>
                <th align="right"><?=indo_bil($data_realisasi->jumlah_realisasi_subkeg) ?></th>
                <th align="right"><?=indo_bil($data->jumlah_pagu_subkeg - $data_realisasi->jumlah_realisasi_subkeg) ?></th>
            </tr>
            <?php foreach ($belanja->result() as $key => $data_belanja) { 
                    foreach($r_pp->result() as $key => $data_rpp) {
                    if($data_belanja->belanja_id == $data_rpp->belanja_id) { 
                    $jumlah_realisasi_belanja[]   = $data_rpp->jumlah_realisasi_belanja; $total_realisasi_belanja = array_sum($jumlah_realisasi_belanja);
                    ++$a;
                    if($a==1) { ?>
            <?php } ?>
            <tbody>
              <tr>
                  <td align="center"><?=++$no; ?>.</td>
                  <td><?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?> <?=$data_belanja->nama_sub_rincian_objek ?></td>
                  <td align="right"><?=indo_bil($data_belanja->pagu_belanja) ?></td> 
                  <td align="right"><?=indo_bil($data_rpp->jumlah_realisasi_belanja) ?></td>
                  <td align="right"><?=indo_bil($data_belanja->pagu_belanja - $data_rpp->jumlah_realisasi_belanja) ?></td>
              </tr>
          <?php }} $a=0; }} $b=0; }} ?>
        </tbody>
    </table>
</body>
</html>