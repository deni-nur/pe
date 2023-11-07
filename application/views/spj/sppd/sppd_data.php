<section class="content-header">
  <h1>Surat Perintah Perjalanan Dinas
    <small>Surat Perintah Perjalanan Dinas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Surat Perintah Perjalanan Dinas</li>
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
    <h3 class="box-title">Data Surat Perintah Perjalanan Dinas</h3>
    <div class="pull-right">
      <a href="<?=base_url('portal/'.$this->uri->segment(2).'/sppd/add') ?>" class="btn btn-success btn-flat">
        <i class="fa fa-plus"></i> Tambah
      </a>
</div>
</div>

  <div class="box-body table-responsive">
    <table class="table table-bordered table-striped" id="table1">
      <thead>
        <tr>
          <th>No</th>
          <th>Maksud Perjalanan Dinas</th>
          <th>Tempat Tujuan</th>
          <th>Lama Perjalanan</th>
          <th>Tanggal Berangkat</th>
          <th>Tanggal Kembali</th>
          <th width="20%">Actions</th>
        </tr>
      </thead>
      <tbody>
       <?php $no=1; foreach ($sppd as $sppd) { ?>
      <tr>
          <td width="10px"><?=$no++ ?>.</td>
          <td><?=$sppd->maksud ?></td>
          <td><?=$sppd->tempat_tujuan ?></td>
          <td><?=$sppd->lama_perjalanan ?> ( hari )</td>
          <td><?=$sppd->tgl_berangkat ?></td>
          <td><?=$sppd->tgl_pulang ?></td>
          <td>
            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/sppd/cetak/'.$sppd->st_id) ?>" class="btn btn-info btn-xs">
          <i class="fa fa-pencil"></i> Cetak
          </a>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/sppd/edit/'.$sppd->sppd_id) ?>" class="btn btn-warning btn-xs">
          <i class="fa fa-pencil"></i> Update
          </a>
          <button id="del_sppd" data-sppdid="<?=$sppd->sppd_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_sppd', function() {
    if (confirm('Apakah anda yakin?')) {
        var sppd_id = $(this).data('sppdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('sppd/del_sppd')?>',
            dataType : 'json',
            data : {'sppd_id' : sppd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Surat Perintah Perjalanan Dinas');
                }
            }
        })
    }
})
</script>