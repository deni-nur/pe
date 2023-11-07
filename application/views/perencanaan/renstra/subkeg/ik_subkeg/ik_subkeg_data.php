<section class="content-header">
  <h1>Indikator Sub Kegiatan
    <small>Indikator Sub Kegiatan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renja</li>
    <li>Sub Kegiatan</li>
    <li class="active">Indikator Sub Kegiatan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
<div class="box">
<div class="box-header">
  <h3 class="box-title">Data Indikator Sub Kegiatan</h3>
  <div class="pull-right">
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/subkeg/'.$this->uri->segment(4).'/ik_subkeg/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/subkeg') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
      </a>
  </div>
</div>

<div class="box-body table-responsive">
  <table class="table table-bordered table-renstrariped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Indikator Sub Kegiatan</th>
        <th>Formulasi</th>
        <th width="13%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($ik_subkeg as $i => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->name ?>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/subkeg/'.$data->subkeg_id.'/ik_subkeg/'.$data->ik_subkeg_id.'/target_ik_subkeg') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus"></i> Target Indikator Sub Kegiatan
            </a>
          </td>
          <td><?=$data->formulasi ?></td>
          <td rowspan="2">
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/subkeg/'.$data->subkeg_id.'/ik_subkeg/edit/'.$data->ik_subkeg_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
            </a>
            <button id="del_ik_subkeg" data-ik_subkegid="<?=$data->ik_subkeg_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_ik_subkeg', function() {
    if (confirm('Apakah anda yakin?')) {
        var ik_subkeg_id = $(this).data('ik_subkegid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('ik_subkeg/del_ik_subkeg')?>',
            dataType : 'json',
            data : {'ik_subkeg_id' : ik_subkeg_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Sub Kegiatan');
                }
            }
        })
    }
})
</script>