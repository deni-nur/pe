<section class="content-header">
      <h1>Pelaksana
        <small>Pelaksana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>SPJ</li>
        <li class="active">Pelaksana</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pelaksana</h3>
      <div class="pull-right">
        <a href="<?=base_url('st/pelaksana/'.$this->uri->segment(3).'/add') ?>" class="btn btn-success btn-flat">
            <i class="fa fa-plus"></i> Tambah
          </a>
        <a href="<?=base_url('st') ?>" class="btn btn-warning btn-flat">
            <i class="fa fa-undo"></i> Back
        </a>
      </div>
    </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Nama Pelaksana</th>
        <th width="13%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($pelaksana as $i => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->name ?></td>
          <td>
            <a href="<?=site_url('st/pelaksana/'.$st->st_id.'/edit/'.$data->pelaksana_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
            </a>
            <a href="<?=site_url('pelaksana/del/'.$st->st_id.'/'.$data->pelaksana_id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
              <i class="fa fa-trash"></i> Delete
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>

</section>