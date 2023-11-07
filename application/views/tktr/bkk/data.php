<section class="content-header">
  <h1>Bursa Kerja Khusus
    <small>Bursa Kerja Khusus</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Bursa Kerja Khusus</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Bursa Kerja Khusus</h3>
    
    <div class="pull-right">
    	<a href="<?= site_url('portal/'.$this->uri->segment(2).'/bkk/form') ?>" title="Import Data" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> Import Data
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/bkk/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                     <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Izin</th>
                        <th>Nama Pengurus</th>
                        <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($bkk->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->nama ?></td>
                    <td><?=$data->alamat ?></td>
                    <td><?=$data->no_izin ?></td>
                    <td><?=$data->nama_pengurus ?></td>
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/bkk/edit/'.$data->bkk_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_bkk" data-bkkid="<?=$data->bkk_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_bkk', function() {
    if (confirm('Apakah anda yakin?')) {
        var bkk_id = $(this).data('bkkid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('bkk/del_bkk')?>',
            dataType : 'json',
            data : {'bkk_id' : bkk_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Bursa Kerja Khusus');
                }
            }
        })
    }
});
</script>