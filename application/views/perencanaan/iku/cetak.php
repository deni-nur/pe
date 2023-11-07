<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Indikator Kinerja Utama</title>
  <style type="text/css" media="print">
        .line-title{
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
        .margin {
            margin: 5px 5px 5px 5px;
        }
        .padding {
            padding: 5px 15px 5px 15px;
        }
    
    </style>
</head>

<body onload="print()" class="padding" >
    <table width="100%">
        <thead>
        <th>INDIKATOR KINERJA UTAMA DISNAKERTRANS</th>
        </thead>
    </table>
<p></p>
<table class="table table-bordered table-striped" border="1" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Sasaran Strategis</th>
            <th>Indikator Kinerja</th>
            <th>Penjelasan</th>
            <th>Bidang Penanggung Jawab</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($iku->result() as $key => $data) { ?>
        <tr>
            <td align="center" valign="top"><?=$no++ ?>.</td>
            <td valign="top"><?=$data->uraian_sasaran ?></td>
            <td valign="top"><?=$data->uraian_indikator_sasaran ?></td>
            <td valign="top"><?=$data->formulasi ?></td>
            <td valign="top"><?=$data->bidang_pj ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<p></p>
    <table>
        <tbody>
            <tr>
                <td width="60%"></td>
                <td align="center">Kepala
                    <br>Dinas Tenaga Kerja dan Transmigrasi
                    <br>Kabupaten Sukabumi</td>
                <td align="center" colspan="3"><?=$data->jabatan_ttd ?></td>
            </tr>
            <tr>
                <td height="60px"></td>
            </tr>
            <tr>
                <td></td>
                <td align="center" colspan="3"><b><?=$data->ttd_name ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="line-height: 2px" align="center" colspan="3"><?=$data->pangkat ?> <?=$data->gol ?></td>
            </tr>
            <tr>
                <td></td>
                <td align="center" colspan="3">NIP. <?=$data->nip?></td>
            </tr>
        </tbody>
    </table>

</body>
</html>