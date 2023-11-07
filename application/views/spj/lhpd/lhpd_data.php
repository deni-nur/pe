<section class="content-header">
  <h1>Laporan Hasil Perjalanan Dinas
    <small>Laporan Hasil Perjalanan Dinas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Laporan Hasil Perjalanan Dinas</li>
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
  <h3 class="box-title">Data Laporan Hasil Perjalanan Dinas</h3>
  <div class="pull-right">
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/lhpd/add') ?>" class="btn btn-success btn-flat">
        <i class="fa fa-plus"></i> Tambah
      </a>
</div>
</div>

<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Maksud Perjalanan Dinas</th>
        <th>Hasil Kegiatan</th>
        <th width="23%">Actions</th>
      </tr>
    </thead>
    <tbody>
     <?php $no=1; foreach ($lhpd as $lhpd) { ?>
    <tr>
        <td><?=$no++ ?>.</td>
        <td><?=$lhpd->maksud ?></td>
        <td><?=$lhpd->hasil_keg ?>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/lhpd/'.$lhpd->lhpd_id.'/gambar_data') ?>" class="btn btn-info btn-xs">
            <i class="fa fa-plus" title="Dokumentasi"> Dokumentasi</i> 
          </a>
        </td>
        <td>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/lhpd/cetak_baru/'.$lhpd->lhpd_id.'/'.$lhpd->st_id) ?>" class="btn btn-primary btn-xs">
          <i class="fa fa-pencil"></i> Cetak Baru
          </a>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/lhpd/cetak/'.$lhpd->st_id) ?>" class="btn btn-info btn-xs">
          <i class="fa fa-pencil"></i> Cetak
          </a>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/lhpd/edit/'.$lhpd->lhpd_id) ?>" class="btn btn-warning btn-xs">
          <i class="fa fa-pencil"></i> Update
          </a>
          <button id="del_lhpd" data-lhpdid="<?=$lhpd->lhpd_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_lhpd', function() {
    if (confirm('Apakah anda yakin?')) {
        var lhpd_id = $(this).data('lhpdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('lhpd/del_lhpd')?>',
            dataType : 'json',
            data : {'lhpd_id' : lhpd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Laporan Hasil Perjalanan Dinas');
                }
            }
        })
    }
})
</script>