<section class="content-header">
  <h1>Indikator Kegiatan
    <small>Indikator Kegiatan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renstra</li>
    <li>Kegiatan</li>
    <li class="active">Indikator Kegiatan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Indikator Kegiatan</h3>
    <div class="pull-right">
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$this->uri->segment(4).'/ik_kegiatan/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/kegiatan') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
      </a>
    </div>
  </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-renstrariped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Indikator Kegiatan</th>
        <th>Formulasi</th>
        <th width="13%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($ik_kegiatan as $i => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->name ?>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$data->kegiatan_id.'/ik_kegiatan/'.$data->ik_kegiatan_id.'/target_ik_kegiatan') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus"></i> Target Indikator Kegiatan
            </a>
          </td>
          <td><?=$data->formulasi ?></td>
          <td rowspan="2">
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$data->kegiatan_id.'/ik_kegiatan/edit/'.$data->ik_kegiatan_id) ?>" class="btn btn-warning btn-xs">
              <i class="fa fa-pencil"></i> Update
            </a>
            <button id="del_ik_kegiatan" data-ik_kegiatanid="<?=$data->ik_kegiatan_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_ik_kegiatan', function() {
    if (confirm('Apakah anda yakin?')) {
        var ik_kegiatan_id = $(this).data('ik_kegiatanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('ik_kegiatan/del_ik_kegiatan')?>',
            dataType : 'json',
            data : {'ik_kegiatan_id' : ik_kegiatan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Kegiatan');
                }
            }
        })
    }
})
</script>