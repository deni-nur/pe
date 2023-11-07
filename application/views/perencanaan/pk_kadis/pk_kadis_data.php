<section class="content-header">
      <h1>Target Indikator Kinerja
        <small>Target Indikator Kinerja</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li>Perjanjian Kinerja</li>
        <li class="active">Target Indikator Kinerja</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
    <?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Target Indikator Kinerja</h3>
      <div class="pull-right">
        <a href="<?=base_url('pk_kadis/'.$this->uri->segment(2).'/add') ?>" class="btn btn-success btn-flat">
            <i class="fa fa-plus"></i> Tambah
          </a>
      <a href="<?=base_url('pk_kadis') ?>" class="btn btn-warning btn-flat">
    <i class="fa fa-undo"></i> Back
  </a>
</div>

    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-renstrariped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Tahun</th>
            <th>Target</th>
            <th width="13%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no=1; foreach ($pk_kadis as $pk_kadis) { ?>
        <tr>
            <td width="10px"><?=$no++ ?>.</td>
            <td><?=$pk_kadis->tahun ?></td>
            <td><?=$pk_kadis->target?></td>
            <td>
              <a href="<?=site_url('pk_kadis/'.$renstra->renstra_id.'/edit/'.$pk_kadis->pk_kadis_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
              </a>
              <a href="<?=base_url('pk_kadis/del/'.$renstra->renstra_id.'/'.$pk_kadis->pk_kadis_id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash-o"></i> Hapus
              </a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</section>