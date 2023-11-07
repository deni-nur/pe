<section class="content-header">
  <h1>Indikator Sasaran Renstra
    <small>Indikator Sasaran Renstra</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>RPJMD</li>
    <li class="active">Indikator Sasaran Renstra</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Indikator Sasaran Renstra</h3>
    <div class="pull-right">
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/renstra/'.$this->uri->segment(4).'/ik_sasaran_renstra/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/renstra') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
      </a>
    </div>
  </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-renstrariped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Indikator Sasaran Renstra</th>
        <th>Formulasi</th>
        <th width="15%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($ik_sasaran_renstra->result() as $key => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->name ?>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/renstra/'.$data->renstra_id.'/ik_sasaran_renstra/'.$data->ik_sasaran_renstra_id.'/target_ik_sasaran_renstra') ?>" class="btn btn-primary btn-xs">
              <i class="fa fa-plus"></i> Target Indikator Sasaran Renstra
            </a>
          </td>
          <td><?=$data->formulasi ?></td>
          <td>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/renstra/'.$data->renstra_id.'/ik_sasaran_renstra/edit/'.$data->ik_sasaran_renstra_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_ik_sasaran_renstra" data-ik_sasaran_renstraid="<?=$data->ik_sasaran_renstra_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_ik_sasaran_renstra', function() {
    if (confirm('Apakah anda yakin?')) {
        var ik_sasaran_renstra_id = $(this).data('ik_sasaran_renstraid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('ik_sasaran_renstra/del_ik_sasaran_renstra')?>',
            dataType : 'json',
            data : {'ik_sasaran_renstra_id' : ik_sasaran_renstra_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Sasaran Renstra RPJMD');
                }
            }
        })
    }
})
</script>