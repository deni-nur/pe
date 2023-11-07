<section class="content-header">
  <h1>Tenaga Kerja Mandiri
    <small>Tenaga Kerja Mandiri</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li>Perluasan</li>
    <li class="active">Tenaga Kerja Mandiri</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Tenaga Kerja Mandiri</h3>
    
    <div class="pull-right">
    	<a href="<?= site_url('portal/'.$this->uri->segment(2).'/tkm/form') ?>" title="Import Data" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> Import Data
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tkm/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                     <th width="5%">No</th>
                        <th>Kelompok</th>
                        <th>Nama</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Keterangan</th>
                        <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($tkm->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->kelompok ?></td>
                    <td><?=$data->nama ?></td>
                    <td><?=$data->nama_desa ?></td>
                    <td><?=$data->nama_kecamatan ?></td>
                    <td><?=$data->ket ?></td>
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tkm/edit/'.$data->tkm_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_tkm" data-tkmid="<?=$data->tkm_id?>" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
</section>

<script>
    $(document).on('click', '#del_tkm', function() {
    if (confirm('Apakah anda yakin?')) {
        var tkm_id = $(this).data('tkmid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('tkm/del_tkm')?>',
            dataType : 'json',
            data : {'tkm_id' : tkm_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Tenaga Kerja Mandiri');
                }
            }
        })
    }
});
</script>