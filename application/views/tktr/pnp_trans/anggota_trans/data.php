<section class="content-header">
  <h1>Anggota Transmigrasi
    <small>Anggota Transmigrasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Transmigrasi</li>
    <li class="active">Anggota Transmigrasi</li>
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
  <h3 class="box-title">Data Anggota Transmigrasi</h3>
  <div class="pull-right">
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pnp_trans') ?>" class="btn btn-warning btn-flat">
        <i class="fa fa-undo"></i> Back
    </a>
    <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pnp_trans/'.$this->uri->segment(4).'/anggota_trans/add') ?>" class="btn btn-primary btn-flat">
        <i class="fa fa-plus"></i> create
    </a>
  </div>
</div>

<div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Anggota</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Hubungan Keluarga</th>
            <th>Pendidikan</th>
            <th width="15%">Actions</th>
          </tr>
        </thead>
        <tbody>
         <?php $no =1;
          foreach($anggota_trans->result() as $anggota_trans) { ?>
          <tr>
            <td><?=$no++ ?>.</td>
            <td><?=$anggota_trans->nama_anggota ?></td>
            <td><?=$anggota_trans->jk ?></td>
            <td><?=$anggota_trans->umur ?></td>
            <td><?=$anggota_trans->hub_kel ?></td>
            <td><?=$anggota_trans->pendidikan ?></td>
            <td>
              <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pnp_trans/'.$this->uri->segment(4).'/anggota_trans/edit/'.$anggota_trans->anggota_trans_id) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-pencil"></i> Update
              </a>
              <button id="del_anggota_trans" data-anggota_transid="<?=$anggota_trans->anggota_trans_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_anggota_trans', function() {
    if (confirm('Apakah anda yakin?')) {
        var anggota_trans_id = $(this).data('anggota_transid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('anggota_trans/del_anggota_trans')?>',
            dataType : 'json',
            data : {'anggota_trans_id' : anggota_trans_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Anggota Transmigrasi');
                }
            }
        })
    }
})
</script>