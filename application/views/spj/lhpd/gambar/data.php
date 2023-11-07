<section class="content-header">
  <h1>Dokumentasi Laporan Hasil Perjalanan Dinas
    <small>Dokumentasi Laporan Hasil Perjalanan Dinas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Dokumentasi Laporan Hasil Perjalanan Dinas</li>
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
  <h3 class="box-title">Data Dokumentasi Laporan Hasil Perjalanan Dinas</h3>
  <div class="pull-right">
    <a href="<?=site_url('portal/'.$this->uri->segment(2).'/lhpd') ?>" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i> Back
    </a>
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/lhpd/'.$this->uri->segment(4).'/gambar_add') ?>" class="btn btn-success btn-flat">
        <i class="fa fa-plus"></i> Tambah
      </a>
</div>
</div>

<div class="box-body table-responsive">
  <table class="table table-bordered table-striped" id="table1">
    <thead>
      <tr>
        <th width="5%">No</th>
        <th>Dokumentasi Kegiatan</th>
        <th width="23%">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($gambar_lhpd as $key => $data) { ?>
    <tr>
        <td><?=$no++ ?>.</td>
        <td>
          <?php if($data->dokumentasi != null) { ?>
            <img src="<?=base_url('assets/upload/lhpd/'.$data->dokumentasi) ?>" width="400" class="img img-thumbnail">
          <?php } ?>
        </td>
        <td>
          <a href="<?=site_url('portal/'.$this->uri->segment(2).'/lhpd/'.$data->lhpd_id.'/gambar_edit/'.$data->gambar_lhpd_id) ?>" class="btn btn-warning btn-xs">
          <i class="fa fa-pencil"></i> Update
          </a>
          <button id="del_gambarlhpd" data-gambarlhpdid="<?=$data->gambar_lhpd_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_gambarlhpd', function() {
    if (confirm('Apakah anda yakin?')) {
        var gambar_lhpd_id = $(this).data('gambarlhpdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('lhpd/del_gambarlhpd')?>',
            dataType : 'json',
            data : {'gambar_lhpd_id' : gambar_lhpd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Dokumentasi Laporan Hasil Perjalanan Dinas');
                }
            }
        })
    }
})
</script>