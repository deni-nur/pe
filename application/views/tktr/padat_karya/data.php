<section class="content-header">
  <h1>Padat Karya Infrastruktur
    <small>Padat Karya Infrastruktur</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li>Perluasan</li>
    <li class="active">Padat Karya Infrastruktur</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Padat Karya Infrastruktur</h3>
    
    <div class="pull-right">
    	<a href="<?= site_url('portal/'.$this->uri->segment(2).'/padat_karya/form') ?>" title="Import Data" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> Import Data
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/padat_karya/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                     <th width="5%">No</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($padat_karya->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->jenis ?></td>
                    <td><?=$data->nama ?></td>
                    <td><?=$data->nama_desa ?></td>
                    <td><?=$data->nama_kecamatan ?></td>
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/padat_karya/edit/'.$data->padat_karya_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_padat_karya" data-padat_karyaid="<?=$data->padat_karya_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_padat_karya', function() {
    if (confirm('Apakah anda yakin?')) {
        var padat_karya_id = $(this).data('padat_karyaid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('padat_karya/del_padat_karya')?>',
            dataType : 'json',
            data : {'padat_karya_id' : padat_karya_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Padat Karya');
                }
            }
        })
    }
});
</script>