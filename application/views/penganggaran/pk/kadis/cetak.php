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
			<th colspan="3">PERNYATAAN PERJANJIAN KINERJA</th>
		</tr>
		<tr>
			<th colspan="3">PEMERINTAH KABUPATEN SUKABUMI</th>
		</tr>
		<tr>
			<th colspan="3"><br><img src="<?php echo base_url('assets/images/kuya.png') ?>" style="position: center; width: 90px; height: auto;"></th>
		</tr>
		<tr>
			<th colspan="3"><br>PERJANJIAN KINERJA TAHUN <?=year_date($pk_kadis->tanggal_pk) ?></th>
		</tr>
		<tr>
			<td colspan="3" style="text-align: justify;" ><br><br>Dalam rangka mewujudkan manajemen pemerintahan yang efektif, transparan dan akuntabel serta berorientasi pada hasil, kami yang bertanda tangan di bawah ini:</td>
		</tr>
		<tr>
			<td width="5%" align="left" valign="top"><br>Nama</td>
			<td width="1%" align="center" valign="top"><br>:</td>
			<th align="left" valign="top" ><br><?=$pk_kadis->nama_pihak_pertama ?></th>
		</tr>
		<tr>
			<td width="5%" align="left" valign="top">Jabatan</td>
			<td width="1%" align="center" valign="top">:</td>
			<th align="left" valign="top" ><?=$pk_kadis->jabatan_pihak_pertama ?></th>
		</tr>
		<tr>
			<td colspan="3"><br>Selanjutnya disebut pihak pertama</td>
		</tr>
		<tr>
			<td width="5%" align="left" valign="top"><br>Nama</td>
			<td width="1%" align="center" valign="top"><br>:</td>
			<th align="left" valign="top" ><br><?=$pk_kadis->nama_pihak_kedua ?></th>
		</tr>
		<tr>
			<td width="15%" align="left" valign="top">Jabatan</td>
			<td width="1%" align="center" valign="top">:</td>
			<th align="left" valign="top" ><?=$pk_kadis->jabatan_pihak_kedua ?></th>
		</tr>
		<tr>
			<td colspan="3"><br>Selaku atasan pihak pertama, selanjutnya disebut pihak kedua</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: justify;"><br>Pihak pertama berjanji akan mewujudkan target kinerja yang seharusnya sesuai lampiran perjanjian ini, dalam rangka mencapai target kinerja jangka menengah seperti yang telah ditetapkan dalam dokumen perencanaan.</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: justify;"><br>Keberhasilan dan kegagalan pencapaian target kinerja tersebut menjadi tanggung jawab kami.</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: justify;"><br>Pihak kedua akan melakukan supervisi yang diperlukan serta akan melakukan evaluasi terhadap capaian kinerja dari perjanjian ini dan mengambil tindakan yang diperlukan dalam rangka pemberian penghargaan dan sanksi.</td>
		</tr>
		<tr>
			<td colspan="3" height="40px"></td>
		</tr>
	</tbody>
</table>

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