<!DOCTYPE html>
<html>
<head>
    <title>Data Padat Karya Infrastruktur</title>
</head>
<body>

<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <caption><h3>Data Padat Karya Infrastruktur</h3></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Jenis</th>
            <th>Nama</th>
            <th>Desa</th>
            <th>Kecamatan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no =1;
            foreach($row->result() as $data) : ?>
            <tr>
                <td><?=$no++ ?>.</td>
                <td><?=$data->tahun_perencanaan ?></td>
                <td><?=$data->jenis ?></td>
                <td><?=$data->nama ?></td>
                <td><?=$data->nama_desa ?></td>
                <td><?=$data->nama_kecamatan ?></td>
            </tr> 
        <?php endforeach ?>
    </tbody>
</table>

</body>
</html>