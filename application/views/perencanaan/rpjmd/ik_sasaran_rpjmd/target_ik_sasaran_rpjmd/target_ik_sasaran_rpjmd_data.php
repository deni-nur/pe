<section class="content-header">
  <h1>Target Indikator Sasaran RPJMD
    <small>Target Indikator Sasaran RPJMD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>RPJMD</li>
    <li class="active">Target Indikator Sasaran RPJMD</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Target Indikator Sasaran RPJMD</h3>
    <div class="pull-right">
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_sasaran_rpjmd/'.$this->uri->segment(6).'/target_ik_sasaran_rpjmd/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_sasaran_rpjmd') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
      </a>
    </div>
  </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-rpjmdriped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Tahun</th>
        <th>Target Indikator Sasaran RPJMD</th>
        <th>Realisasi Indikator Tujuan</th>
        <th>Satuan</th>
        <th width="15%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($target_ik_sasaran_rpjmd->result() as $key => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->tahun ?></td>
          <td><?=$data->target ?></td>
          <td><?=$data->realisasi ?>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_sasaran_rpjmd/'.$data->ik_sasaran_rpjmd_id.'/target_ik_sasaran_rpjmd/realisasi/'.$data->target_ik_sasaran_rpjmd_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-plus"></i> Realisasi
          </a>
          </td>
          <td><?=$data->satuan ?></td>
          <td>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_sasaran_rpjmd/'.$data->ik_sasaran_rpjmd_id.'/target_ik_sasaran_rpjmd/edit/'.$data->target_ik_sasaran_rpjmd_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_target_ik_sasaran_rpjmd" data-target_ik_sasaran_rpjmdid="<?=$data->target_ik_sasaran_rpjmd_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_target_ik_sasaran_rpjmd', function() {
    if (confirm('Apakah anda yakin?')) {
        var target_ik_sasaran_rpjmd_id = $(this).data('target_ik_sasaran_rpjmdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('target_ik_sasaran_rpjmd/del_target_ik_sasaran_rpjmd')?>',
            dataType : 'json',
            data : {'target_ik_sasaran_rpjmd_id' : target_ik_sasaran_rpjmd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Target Indikator Sasaran RPJMD RPJMD');
                }
            }
        })
    }
})
</script>