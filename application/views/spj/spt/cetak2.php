<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Surat Perintah Tugas</title>
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
        .footer {
           position:fixed;
           bottom:0;
           width:100%;
           height:50px;   /* tinggi dari footer */
           background:#6cf;
        }
    
    </style>
</head>

<body onload="print()" class="padding" >
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
<table style="width: 100%; font-family: Times New Roman; font-size: 11;">
    <tr>
        <td align="center" ><font style="font-weight: bold;"><u>SURAT PERINTAH TUGAS</u></td>
    </tr>
    <tr>
        <td align="center" >Nomor : <?=$datast->no_st?></td>
    </tr>
</table>

<table style="width: 100%; font-family: Times New Roman; font-size: 11;">
     <tbody>
        <tr>
            <th align="left" valign="top" rowspan="5" width="10%">Dasar :</th>
        </tr>
        <?php $no=1; foreach ($darhum as $darhum) { ?>
        <tr>
            <!-- <th rowspan="2">Dasar :</th> -->
            <td valign="top"><?=$no++ ?>.</td>
            <td colspan="3" style="text-align: justify;" ><?=$darhum->name?></td>
            <?php } ?>
        </tr>
        <?php if(!empty($datast->darsur)) { ?>
        <tr>
            <td valign="top"><?=$no++ ?>.</td>
            <td colspan="3" style="text-align: justify;" ><?=$datast->darsur ?></td>
        </tr>
    <?php } ?>
        <tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" align="center"><font style="font-weight: bold;"><u>M E M E R I N T A H K A N :</u></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Kepada</td>
            <td>1.</td>
            <td>Nama</td>
            <td>:</td>
            <td><b><?=$datast->name?></td>
        </tr>
        <?php if(!empty($datast->nip and $datast->pangkat and $datast->gol)) { ?>
        <tr>
            <td></td>
            <td></td>
            <td>NIP</td>
            <td>:</td>
            <td><?=$datast->nip?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Pangkat/Gol</td>
            <td>:</td>
            <td><?=$datast->pangkat?> <?=$datast->gol?></td>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td><?=$datast->jabatan_name?></td>
        </tr>
        <?php $no=2; foreach($pengikut->result() as $pengikut) : ?>
        <tr>
            <td></td>
            <td><?=$no++?>.</td>
            <td>Nama</td>
            <td>:</td>
            <td><b><?=$pengikut->name?></td>
        </tr>
        <?php if(!empty($pengikut->nip and $pengikut->pangkat and $pengikut->gol)) { ?>
        <tr>
            <td></td>
            <td></td>
            <td>NIP</td>
            <td>:</td>
            <td><?=$pengikut->nip?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Pangkat/Gol</td>
            <td>:</td>
            <td><?=$pengikut->pangkat?> <?=$pengikut->gol?></td>
        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td><?=$pengikut->jabatan_name?></td>
        </tr>
        <?php endforeach; ?> 
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td valign="top"><font style="font-weight: bold">Untuk</td>
            <td valign="top">:</td>
            <td colspan="3" style="text-align: justify;" ><?=$datast->maksud?></td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: justify;" ><p style="text-indent: 70px;">Demikian Surat Perintah Tugas ini di buat  dan disampaikan kepada yang bersangkutan untuk dilaksanakan dengan penuh tanggungjawab.</p></td>
        </tr>
    </tbody>
</table>
    <table width="100%">
        <tbody>
            <tr>
                <td width="50%"></td>
                <td align="center"><?=$datast->alamat ?>, <?=format_indo($datast->tanggal_surat) ?></td>
            </tr>
            <tr>
                <td width="50%"></td>
                <td align="center"><?=$ttd->jabatan_ttd ?>
               	<br><?=$ttd->jabatan_ttd_name ?></td>
            </tr>
            <tr>
               <td style="height: 50px" colspan="2"></td>
           </tr>
           <tr>
               <td></td>
               <td align="center" ><font style="font-weight: bold;"><?=$ttd->ttd_name ?></font>
                   <br><?=$ttd->pangkat ?> <?=$ttd->gol ?>
                   <br>NIP. <?=$ttd->ttd_nip ?>
               </td>
           </tr>
        </tbody>
    </table>

</body>
</html>