<section class="content-header">
  <h1>Tenaga Kerja Asing
    <small>Tenaga Kerja Asing</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Tenaga Kerja Asing</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Tenaga Kerja Asing</h3>
    
    <div class="pull-right">
    	<a href="<?= site_url('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/form') ?>" title="Import Data" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i> Import Data
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tka') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Tenaga Kerja Asing</th>
                    <th>Jenis Kelamin</th>
                    <th>Kebangsaan</th>
                    <th>Passport</th>
                    <th>KITAS / KITAP</th>
                    <th>Jabatan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($tka->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->nama_tka ?></td>
                    <td><?=$data->jk ?></td>
                    <td><?=$data->kebangsaan ?></td>
                    <td><?=$data->passport ?></td>
                    <td><?=$data->kitas ?></td>
                    <td><?=$data->jabatan ?></td>
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tka/'.$this->uri->segment(4).'/edit/'.$data->tka_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_tka" data-tkaid="<?=$data->tka_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_tka', function() {
    if (confirm('Apakah anda yakin?')) {
        var tka_id = $(this).data('tkaid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('tka/del_tka')?>',
            dataType : 'json',
            data : {'tka_id' : tka_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Tenaga Kerja Asing');
                }
            }
        })
    }
});
</script>