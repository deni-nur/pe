<section class="content-header">
  <h1>Perusahaan
    <small>Perusahaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Perusahaan</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Perusahaan</h3>
    
    <div class="pull-right">
    	<a href="<?= site_url('portal/'.$this->uri->segment(2).'/perusahaan/form') ?>" title="Import Data" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> Import Data
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/perusahaan/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Tanggal Berdiri</th>
                    <th>KBLI</th>
                    <th>Kepemilikan</th>
                    <th>Capital Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($perusahaan->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->nama_perusahaan ?></td>
                    <td><?=$data->alamat ?></td>
                    <td><?=$data->tanggal_berdiri ?></td>
                    <td><?=$data->kbli ?></td>
                    <td><?=$data->kepemilikan ?></td>
                    <td><?=$data->capital_status ?></td>
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/perusahaan/edit/'.$data->perusahaan_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_perusahaan" data-perusahaanid="<?=$data->perusahaan_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_perusahaan', function() {
    if (confirm('Apakah anda yakin?')) {
        var perusahaan_id = $(this).data('perusahaanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('perusahaan/del_perusahaan')?>',
            dataType : 'json',
            data : {'perusahaan_id' : perusahaan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Perusahaan');
                }
            }
        })
    }
});
</script>