<section class="content-header">
      <h1>Indikator Tujuan
        <small>Indikator Tujuan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li>RPJMD</li>
        <li class="active">Indikator Tujuan</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Indikator Tujuan</h3>
      <div class="pull-right">
        <a href="<?=base_url('rpjmd/ik_tujuan/'.$this->uri->segment(3).'/add') ?>" class="btn btn-success btn-flat">
            <i class="fa fa-plus"></i> Tambah
          </a>
        <a href="<?=base_url('rpjmd') ?>" class="btn btn-warning btn-flat">
            <i class="fa fa-undo"></i> Back
        </a>
      </div>
    </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-rpjmdriped" id="table1">
    <thead>
      <tr>
        <th width="5%">Target Awal</th>
        <th width="10%">Target Tahun ke-1</th>
        <th width="10%">Target Tahun ke-2</th>
        <th width="10%">Target Tahun ke-3</th>
        <th width="10%">Target Tahun ke-4</th>
        <th width="10%">Target Tahun ke-5</th>
        <th width="5%">Target Akhir</th>
        <th width="13%">Actions</th>
      </tr>
      <tr>
        <?php $no=1; foreach ($ik_tujuan as $i => $data) { ?>
            <th colspan="8"><?=$data->nama_ik_tujuan ?></th>
      </tr>
    </thead>
    <tbody>
      
        <tr>
          <td><?=$data->awal_target ?> <?=$data->awal_satuan ?></td>
          <td><?=$data->satu_target ?> <?=$data->satu_satuan ?></td>
          <td><?=$data->dua_target ?> <?=$data->dua_satuan ?></td>
          <td><?=$data->tiga_target ?> <?=$data->tiga_satuan ?></td>
          <td><?=$data->empat_target ?> <?=$data->empat_satuan ?></td>
          <td><?=$data->lima_target ?> <?=$data->lima_satuan ?></td>
          <td><?=$data->akhir_target ?> <?=$data->akhir_satuan ?></td>
          <td>
            <a href="<?=site_url('rpjmd/ik_tujuan/'.$rpjmd->rpjmd_id.'/realisasi/'.$data->ik_tujuan_id) ?>" class="btn btn-success btn-xs">
              <i class="fa fa-pencil"></i> Realisasi
            </a>
            <a href="<?=site_url('rpjmd/ik_tujuan/'.$rpjmd->rpjmd_id.'/edit/'.$data->ik_tujuan_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
            </a>
            <!-- <a href="<?=site_url('ik_tujuan/del/'.$rpjmd->rpjmd_id.'/'.$data->ik_tujuan_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
              <i class="fa fa-trash"></i> Delete
            </a> -->
          </td>
        </tr>
      <?php } ?>
    </tbody>
    <thead>
      <tr>
        <th>Realisasi Awal</th>
        <th>Realisasi Tahun ke-1</th>
        <th>Realisasi Tahun ke-2</th>
        <th>Realisasi Tahun ke-3</th>
        <th>Realisasi Tahun ke-4</th>
        <th>Realisasi Tahun ke-5</th>
        <th>Realisasi Akhir</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($ik_tujuan_realisasi as $i => $data) { ?>
        <tr>
          <td><?=$data->awal_realisasi ?></td>
          <td><?=$data->satu_realisasi?></td>
          <td><?=$data->dua_realisasi ?></td>
          <td><?=$data->tiga_realisasi ?></td>
          <td><?=$data->empat_realisasi ?></td>
          <td><?=$data->lima_realisasi ?></td>
          <td><?=$data->akhir_realisasi ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>

</section>