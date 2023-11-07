<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Perjanjian Kinerja Esselon II</title>
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
<body onload="print()">

<table cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td width="15%">Perangkat Daerah</td>
			<td width="1%">:</td>
			<td>Dinas Tenaga Kerja dan Transmigrasi</td>
		</tr>
		<tr>
			<td>Tahun Anggaran</td>
			<td>:</td>
			<td><?=year_date($pk_kadis->tanggal_pk) ?></td>
		</tr>
	</tbody>
</table>
<br>

<table border="1" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th height="35px">No</th>
			<th>Sasaran Strategis</th>
			<th>Indikator Kinerja</th>
			<th>Satuan</th>
			<th>Target Tahunan</th>
			<th>Triwulan</th>
			<th>Target</th>
		</tr>
		<tr>
			<th>(1)</th>
			<th>(2)</th>
			<th>(3)</th>
			<th>(4)</th>
			<th>(5)</th>
			<th>(6)</th>
			<th>(7)</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($lampiran_pk_kadis->result() as $key => $data) { ?>
		<tr>
			<td align="center" rowspan="4" valign="top"><?=$no++; ?>.</td>
			<td rowspan="4" valign="top"><?=$data->uraian_sasaran ?></td>
			<td rowspan="4" valign="top"><?=$data->uraian_indikator_sasaran ?></td>
			<td align="center" rowspan="4" valign="top"><?=$data->satuan ?></td>
			<td align="center" rowspan="4" valign="top"><?=$data->target_tahunan ?></td>
			<td>Triwulan I</td>
			<td align="center"><?=$data->triwulan_1 ?></td>
			<tr>
				<td>Triwulan II</td>
				<td align="center"><?=$data->triwulan_2 ?></td>
			</tr>
			<tr>
				<td>Triwulan III</td>
				<td align="center"><?=$data->triwulan_3 ?></td>
			</tr>
			<tr>
				<td>Triwulan IV</td>
				<td align="center"><?=$data->triwulan_4 ?></td>
			</tr>
		</tr>
	<?php } ?>
	</tbody>
</table>
<br>

<table cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td colspan="2"><b>Jumlah Anggaran</b></td>
			<td><b>Rp.</b></td>
			<?php foreach($jumlah_pagu_anggaran->result() as $key => $data) { ?>
				<?php } ?>
			<td align="right"><b><?=indo_bil($data->total_pagu_anggaran) ?></b></td>
			<td width="28%"></td>
		</tr>
		<?php $no=1; foreach($program_pk_kadis->result() as $key => $data) { ?>
		<tr>
			<td width="1%"><?=$no++; ?>.</td>
			<td width="55%"><?=$data->nama_program ?></td>
			<td width="1%">Rp.</td>
			<td align="right"><?=indo_bil($data->pagu_anggaran) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>

<br>

<table cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td width="49%" align="center">
				<br>
				<br>Pihak Kedua,
				<br><?=$pk_kadis->jabatan_pihak_kedua ?>,
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br><b><?=$pk_kadis->nama_pihak_kedua ?></b>
			</td>
			<td></td>
			<td width="49%" align="center" >Palabuhanratu, <?=format_indo($pk_kadis->tanggal_pk) ?>
				<br>
				<br>Pihak Pertama,
				<br><?=$pk_kadis->jabatan_pihak_pertama ?>,
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br><b><?=$pk_kadis->nama_pihak_pertama ?></b>
			</td>
		</tr>
	</tbody>
	</tbody>
</table>
</body>
</html>