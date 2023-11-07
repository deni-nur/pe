<!DOCTYPE html>
<html>
<head>
	<title>Rekapitulasi Belanja Perkode Rekening</title>
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
  </style>
</head>
<body onload="print()">
	<table width="100%">
		<thead>
			<tr>
				<th><center><b>REKAPITULASI BELANJA PERKODE REKENING</b></center></th>
			</tr>
		</thead>
		<tbody>
    		<?php foreach($pp->result() as $key => $data) { ?>
  			<?php } ?>
			<tr>
				<td align="center">KODE REKENING <?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?>.<?=$data->kode_subkeg ?>
					<br><?=$data->nama_program ?>
					<br>Kegiatan <?=$data->nama_kegiatan ?>
					<br>Sub Kegiatan <?=$data->nama_subkeg ?>
					<br>DINAS TENAGA KERJA DAN TRANSMIGRASI KABUPATEN SUKABUMI
					<?php foreach($rincian->result() as $key => $data) { ?>
  					<?php } ?>
					<br>TAHUN ANGGARAN <?=year_date($data->tgl_kwitansi) ?>
					<br>Bulan : <?=format_bulan($data->tgl_kwitansi) ?>
				</td>
			</tr>
		</tbody>
	</table>
	<br>

	<table width="100%" border="1" cellpadding="0" cellspacing="0" id="nilai">
		<thead>
			<tr>
				<th>NO</th>
				<th width="10%">TANGGAL</th>
				<th>KODE REKENING</th>
				<th>URAIAN</th>
				<th>NO. BKU</th>
				<th>JUMLAH (Rp.)</th>
				<th>KETERANGAN</th>
			</tr>
            <?php $b=0;
            foreach ($akun->result() as $key => $data_akun) {
            foreach ($kelompok->result() as $key => $data_kelompok) {
            	if ($data_akun->akun_id == $data_kelompok->akun_id) {
					++$b;
                if($b==1) { ?>
            <?php }} $b=0; }} ?>
            <tr>
            	<th></th>
            	<th></th>
            	<th align="left"><?=$data_akun->kode_akun ?></th>
            	<th align="left"><?=$data_akun->nama_akun ?></th>
            	<th></th>
            	<th></th>
            	<th></th>
            </tr>
            <tr>
            	<th></th>
            	<th></th>
            	<th align="left"><?=$data_akun->kode_akun ?>.<?=$data_kelompok->kode_kelompok ?></th>
            	<th align="left"><?=$data_kelompok->nama_kelompok ?></th>
            	<th></th>
            	<th></th>
            	<th></th>
            </tr>
            <?php $c=0;
            foreach ($jenis->result() as $key => $data_jenis) {
            	if ($data_kelompok->kelompok_id == $data_jenis->kelompok_id) {
					++$c;
                if($c==1) { ?>
            <?php } $c=0; }} ?>
            <tr>
            	<th></th>
            	<th></th>
            	<th align="left"><?=$data_akun->kode_akun ?>.<?=$data_kelompok->kode_kelompok ?>.<?=$data_jenis->kode_jenis ?></th>
            	<th align="left"><?=$data_jenis->nama_jenis ?></th>
            	<th></th>
            	<th></th>
            	<th></th>
            </tr>
            
            
            <?php $no=0; $n=0; $a=0; 
			foreach ($sub_rincian_objek->result() as $key => $data_belanja) { 
			foreach ($rincian->result() as $key => $data_rincian) { 
				if ($data_belanja->belanja_id == $data_rincian->belanja_id) {
			$neto[]   = $data_rincian->biaya*$data_rincian->lama_perjalanan; $total_neto = array_sum($neto);
				
					++$a;
                if($a==1) { ?>
            
            <tr>
            	<th></th>
            	<th></th>
            	<th align="left"><?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?></th>
            	<th align="left"><?=$data_belanja->nama_objek ?></th>
            	<th></th>
            	<th></th>
            	<th></th>
            </tr>
            <tr>
            	<th></th>
            	<th></th>
            	<th align="left"><?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?></th>
            	<th align="left"><?=$data_belanja->nama_rincian_objek ?></th>
            	<th></th>
            	<th></th>
            	<th></th>
            </tr>
            <tr>
            	<th><?=++$n; ?>.</th>
            	<th></th>
            	<th align="left"><?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?></th>
            	<th align="left"><?=$data_belanja->nama_sub_rincian_objek ?></th>
            	<th></th>
            	<th align="right"></th>
            	<th></th>
            </tr>
            <?php } ?>
		</thead>
		<tbody>
			<tr>
				<td align="center"><?=++$no; ?>.</td>
				<td><?=indo_date($data_rincian->tgl_kwitansi) ?></td>
				<td></td>
				<td align="left"><?=$data_rincian->uraian_rpp ?></td>
				<td></td>
				<td align="right"><?=indo_bil($data_rincian->biaya * $data_rincian->lama_perjalanan) ?></td>
				<td></td>
			</tr>
		<?php }} $a=0; } ?>
		</tbody>
	</table>
	<br>
	<br>

	<table width="100%">
		<tbody>
			<tr>
				<td width="30%" align="center">Mengetahui :
					<br><?=$data_rincian->jabatan_ttd_keu ?>
					<br>
					<br>
					<br>
					<br>
					<br><b><?=$data_rincian->ttd_keu_name ?></b>
					<br>NIP. <?=$data_rincian->nip ?>
				</td>
				<td></td>
				<td width="30%" align="center"><br>
					<br><?=$data_rincian->jabatan_bpp ?>
					<br>
					<br>
					<br>
					<br>
					<br><b><?=$data_rincian->nama_bpp ?></b>
					<br>NIP. <?=$data_rincian->nip_bpp ?>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">Menyetujui :
					<br><?=$data_rincian->jabatan_pa ?>
					<br>
					<br>
					<br>
					<br>
					<br><b><?=$data_rincian->nama_pa ?></b>
					<br>NIP. <?=$data_rincian->nip_pa ?>
				</td>
			</tr>
		</tbody>
	</table>
</html>

<script>
    var table = document.getElementById("nilai"), sumHsl = 0;
    for(var t = 1; t < table.rows.length; t++)
    {
      sumHsl = sumHsl + parseInt(table.rows[t].cells[5].innerHTML);
    }
    document.getElementById("hasil").innerHTML = "Sum Value = "+ sumHsl;
    
  </script>