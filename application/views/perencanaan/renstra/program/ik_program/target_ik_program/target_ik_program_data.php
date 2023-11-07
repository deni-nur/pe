<section class="content-header">
  <h1>Target Indikator Program
    <small>Target Indikator Program</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renstra</li>
    <li class="active">Target Indikator Program</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('messages') ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Target Indikator Program</h3>
    <div class="pull-right">
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/program/'.$this->uri->segment(4).'/ik_program/'.$this->uri->segment(6).'/target_ik_program/add') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-plus"></i> Tambah
        </a>
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/program/'.$this->uri->segment(4).'/ik_program') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
      </a>
    </div>
  </div>

  

<div class="box-body table-responsive">
  <table class="table table-bordered table-programriped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Tahun</th>
        <th>Target Indikator Program</th>
        <th>Realisasi Indikator Program</th>
        <th>Satuan</th>
        <th>Pagu Anggaran</th>
         <th>Realisasi Pagu Anggaran</th>
        <th width="15%">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($target_ik_program->result() as $key => $data) { ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$data->tahun ?></td>
          <td><?=$data->target ?></td>
          <td><?=$data->realisasi_ik_program ?>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/program/'.$this->uri->segment(4).'/ik_program/'.$data->ik_program_id.'/target_ik_program/realisasi/'.$data->target_ik_program_id) ?>" class="btn btn-info btn-xs">
              <i class="fa fa-plus"></i> Realisasi
          </a>
          </td>
          <td><?=$data->satuan ?></td>
          <td><?=indo_bil($data->pagu) ?></td>
          <td><?=indo_bil($data->realisasi_pagu) ?></td>
          <td>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/program/'.$this->uri->segment(4).'/ik_program/'.$data->ik_program_id.'/target_ik_program/edit/'.$data->target_ik_program_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_target_ik_program" data-target_ik_programid="<?=$data->target_ik_program_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_target_ik_program', function() {
    if (confirm('Apakah anda yakin?')) {
        var target_ik_program_id = $(this).data('target_ik_programid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('target_ik_program/del_target_ik_program')?>',
            dataType : 'json',
            data : {'target_ik_program_id' : target_ik_program_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Target Indikator Program');
                }
            }
        })
    }
})
</script>