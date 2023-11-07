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
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$this->uri->segment(4).'/ik_tujuan_rpjmd/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/rpjmd') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
      </a>
    </div>
  </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-rpjmdriped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Indikator Tujuan</th>
        <th>Formulasi</th>
        <th width="15%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($ik_tujuan_rpjmd->result() as $key => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->name ?>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$data->rpjmd_id.'/ik_tujuan_rpjmd/'.$data->ik_tujuan_rpjmd_id.'/target_ik_tujuan_rpjmd') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus"></i> Target Indikator Tujuan
            </a>
          </td>
          <td><?=$data->formulasi ?></td>
          <td>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rpjmd/'.$data->rpjmd_id.'/ik_tujuan_rpjmd/edit/'.$data->ik_tujuan_rpjmd_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_ik_tujuan_rpjmd" data-ik_tujuan_rpjmdid="<?=$data->ik_tujuan_rpjmd_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_ik_tujuan_rpjmd', function() {
    if (confirm('Apakah anda yakin?')) {
        var ik_tujuan_rpjmd_id = $(this).data('ik_tujuan_rpjmdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('ik_tujuan_rpjmd/del_ik_tujuan_rpjmd')?>',
            dataType : 'json',
            data : {'ik_tujuan_rpjmd_id' : ik_tujuan_rpjmd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Tujuan RPJMD');
                }
            }
        })
    }
})
</script>