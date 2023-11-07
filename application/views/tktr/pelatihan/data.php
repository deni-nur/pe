<section class="content-header">
  <h1>Pelatihan Kerja
    <small>Pelatihan Kerja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Pelatihan Kerja</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Pelatihan Kerja</h3>
    
    <div class="pull-right">
    	<a href="<?= site_url('portal/'.$this->uri->segment(2).'/pelatihan/form') ?>" title="Import Data" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> Import Data
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pelatihan/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Sumber Dana</th>
                    <th>Kejuruan</th>
                    <th>Nama Peserta</th>
                    <th>Jenis Kelamin</th>
                    <th>Pendidikan</th>
                    <!-- <th>Desa</th> -->
                    <!-- <th>Kecamatan</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($pelatihan->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->sumber_dana ?></td>
                    <td><?=$data->kejuruan ?></td>
                    <td><?=$data->nama ?></td>
                    <td><?=$data->jk ?></td>
                    <td><?=$data->pendidikan ?></td>
                    <!-- <td><?=$data->nama_desa ?></td> -->
                    <!-- <td><?=$data->nama_kecamatan ?></td> -->
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pelatihan/edit/'.$data->pelatihan_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_pelatihan" data-pelatihanid="<?=$data->pelatihan_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_pelatihan', function() {
    if (confirm('Apakah anda yakin?')) {
        var pelatihan_id = $(this).data('pelatihanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pelatihan/del_pelatihan')?>',
            dataType : 'json',
            data : {'pelatihan_id' : pelatihan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Pelatihan Kerja');
                }
            }
        })
    }
});
</script>