<!DOCTYPE html>
<html>
<head>
    <title>Data Lembaga Swasta</title>
</head>
<body>

<table border="1" cellpadding="0" cellspacing="0">
    <caption><h3>Data Lembaga Swasta di Kabupaten Sukabumi</h3></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Lembaga</th>
            <th>Nama Kelembagaan</th>
            <th>Nomor Izin</th>
            <th>NIB</th>
            <th>Alamat</th>
            <th>No Telephone</th>
            <th>Nama Penanggung Jawab</th>
            <th>Jabatan</th>
            <th>No HP</th>
            <th>Jumlah Pelatihan yang Terakreditasi</th>
            <th>Nama Program Pelatihan yang Terakreditasi</th>
            <th>Verifikasi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no =1;
            foreach($row->result() as $row) : ?>
            <tr>
                <td><?=$no++ ?>.</td>
                <td><?=$row->lembaga ?></td>
                <td><?=$row->nama_kelembagaan ?></td>
                <td><?=$row->no_izin ?></td>
                <td><?=$row->nib ?></td>
                <td><?=$row->alamat ?></td>
                <td><?=$row->no_tlp ?></td>
                <td><?=$row->nama ?></td>
                <td><?=$row->jabatan ?></td>
                <td><?=$row->no_hp ?></td>
                <td><?=$row->jml_pelatihan ?></td>
                <td><?=$row->pelatihan_terakreditasi ?></td>   
                <td><?=$row->verif ?></td>
            </tr> 
        <?php endforeach ?>
    </tbody>
</table>

</body>
</html>