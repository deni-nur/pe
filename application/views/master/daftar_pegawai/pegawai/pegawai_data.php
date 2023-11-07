<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pegawai'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Pegawai
    <small>Pegawai</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Pegawai</li>
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
			<h3 class="box-title">Data Pegawai</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pegawai/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
				
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama Pegawai</th>
						<th>Pangkat / Gol</th>
						<th>Jabatan</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				 <?php $no =1;
					foreach ($pegawai->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%"><?=$no++ ?>.</td>
						<td>
							<?=$data->nip ?><br>
							<!--<a href="<?=site_url('portal/'.$data->portal_id.'/pegawai/nip_barcode_qrcode/'.$data->pegawai_id) ?>" class="btn btn-default btn-xs">-->
	    		<!--				Generate<i class="fa fa-barcode"> <i class="fa fa-qrcode"></i></i>-->
	    		<!--				</a>-->
						</td>
						<td><?=$data->name ?></td>
						<td><?=$data->pangkat ?> <?=$data->gol ?></td>
						<td><?=$data->jabatan_name ?></td>
						<td class="text-center" width="160px">
	    					<a href="<?=site_url('portal/'.$data->portal_id.'/pegawai/edit/'.$data->pegawai_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_pegawai" data-pegawaiid="<?=$data->pegawai_id?>" class="btn btn-xs btn-danger">
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
<?php echo form_close(); ?>

<script>
    $(document).on('click', '#del_pegawai', function() {
    if (confirm('Apakah anda yakin?')) {
        var pegawai_id = $(this).data('pegawaiid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pegawai/del_pegawai')?>',
            dataType : 'json',
            data : {'pegawai_id' : pegawai_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Dasar Hukum');
                }
            }
        })
    }
})
</script>