<section class="content-header">
  <h1>Target Indikator Sub Kegiatan
    <small>Target Indikator Sub Kegiatan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renstra</li>
    <li class="active">Target Indikator Sub Kegiatan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Target Indikator Sub Kegiatan</h3>
    <div class="pull-right">
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$this->uri->segment(6).'/target_ik_subkeg/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
      </a>
    </div>
  </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-subkegriped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Tahun</th>
        <th>Target Indikator Sub Kegiatan</th>
        <th>Realisasi Indikator Sub Kegiatan</th>
        <th>Satuan</th>
        <th>Pagu Anggaran</th>
         <th>Realisasi Pagu Anggaran</th>
        <th width="15%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($target_ik_subkeg->result() as $key => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->tahun ?></td>
          <td><?=$data->target ?></td>
          <td><?=$data->realisasi_ik_subkeg ?>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$data->ik_subkeg_id.'/target_ik_subkeg/realisasi/'.$data->target_ik_subkeg_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-plus"></i> Realisasi
          </a>
          </td>
          <td><?=$data->satuan ?></td>
          <td><?=indo_bil($data->pagu) ?></td>
          <td><?=indo_bil($data->realisasi_pagu) ?></td>
          <td>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/'.$data->ik_subkeg_id.'/target_ik_subkeg/edit/'.$data->target_ik_subkeg_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_target_ik_subkeg" data-target_ik_subkegid="<?=$data->target_ik_subkeg_id?>" class="btn btn-xs btn-danger">
                  <i class="fa fa-trash"></i> Delete
              </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
</section>

<script>
    $(document).on('click', '#del_target_ik_subkeg', function() {
    if (confirm('Apakah anda yakin?')) {
        var target_ik_subkeg_id = $(this).data('target_ik_subkegid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('target_ik_subkeg/del_target_ik_subkeg')?>',
            dataType : 'json',
            data : {'target_ik_subkeg_id' : target_ik_subkeg_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Target Indikator Sub Kegiatan');
                }
            }
        })
    }
})
</script>