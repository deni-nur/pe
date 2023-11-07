<section class="content-header">
  <h1>Kelembagaan
    <small>Kelembagaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Tenaga Kerja</li>
    <li class="active">Kelembagaan</li>
  </ol>
</section>

<section class="content">
<?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
<div class="box">
<div class="box-header with-border">
    <h3 class="box-title">Filter Data</h3>
</div>
<div class="box-body">
    <form action="" method="post">
        <div class="row">

            <div class="col-md-3">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Lembaga</label>
                        <div class="col-sm-9">
                            <input type="text" name="lembaga" value="<?=@$post['lembaga'] ?>" class="form-control" placeholder="LPKS / BLKK">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Verifikasi</label>
                        <div class="col-sm-9">
                            <input type="text" name="verif" value="<?=@$post['verif'] ?>" class="form-control" placeholder="YA / TIDAK">
                        </div>
                    </div>
                </div>
            </div>              
        </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <button type="submit" name="reset" class="btn btn-flat">Reset</button>
                        <button type="submit" name="filter" class="btn btn-info btn-flat">
                            <i class="fa fa-search"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Kelembagaan</h3>
    
    <div class="pull-right">
        <a href="<?= site_url('portal/'.$this->uri->segment(2).'/kelembagaan/cetak') ?>" target="_blank" class="btn btn-warning">
            <i class="fa fa-print"></i> Cetak
        </a>
        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kelembagaan/add') ?>" class="btn btn-success">
            <i class="fa fa-user-plus"></i> Create
        </a>
    </div>
</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                     <th width="5%">No</th>
                        <th>Nama Kelembagaan</th>
                        <th>Alamat</th>
                        <th>Nama Penanggung Jawab</th>
                        <th>No HP</th>
                        <th>Program Pelatihan yang Terakreditasi</th>
                        <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                foreach($row->result() as $key => $data) { ?>
                <tr>
                    <td><?=$no++ ?>.</td>
                    <td><?=$data->nama_kelembagaan ?></td>
                    <td><?=$data->alamat ?></td>
                    <td><?=$data->nama ?></td>
                    <td><?=$data->no_hp ?></td>
                    <td><?=$data->pelatihan_terakreditasi ?></td>
                    <td class="text-center" width="160px">
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kelembagaan/edit/'.$data->kelembagaan_id) ?>" class="btn btn-warning btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <button id="del_kelembagaan" data-kelembagaanid="<?=$data->kelembagaan_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_kelembagaan', function() {
    if (confirm('Apakah anda yakin?')) {
        var kelembagaan_id = $(this).data('kelembagaanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kelembagaan/del_kelembagaan')?>',
            dataType : 'json',
            data : {'kelembagaan_id' : kelembagaan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Kelembagaan');
                }
            }
        })
    }
});
</script>