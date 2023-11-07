<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/ttd'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Pejabat
    <small>Penandatangan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Pejabat Penandatangan</li>
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
			<h3 class="box-title">Data Pejabat Penandatangan</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/ttd/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th width="20%">Nama Pegawai</th>
						<th>Pangkat / Gol</th>
						<th>Jabatan</th>
						<th>Image TTE</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				 <?php $no =1;
					foreach($ttd->result() as $key => $data) { ?>
					<tr>
						<td style="width: 5%"><?=$no++ ?>.</td>
						<td><?=$data->ttd_name ?></td>
						<td><?=$data->pangkat ?> <?=$data->gol ?></td>
						<td><?=$data->jabatan_ttd ?></td>
						<td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$data->foto)?>" width="100" class="img img-thumbnail"></td>
						<td class="text-center" width="160px">
	    					<a href="<?=site_url('portal/'.$this->uri->segment(2).'/ttd/edit/'.$data->ttd_id) ?>" class="btn btn-warning btn-xs">
	    						<i class="fa fa-pencil"></i> Update
	    					</a>
	    					<button id="del_ttd" data-ttdid="<?=$data->ttd_id?>" class="btn btn-xs btn-danger">
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
<?php echo form_close(); ?>

<script>
    $(document).on('click', '#del_ttd', function() {
    if (confirm('Apakah anda yakin?')) {
        var ttd_id = $(this).data('ttdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('ttd/del_ttd')?>',
            dataType : 'json',
            data : {'ttd_id' : ttd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Pejabat Penandatangan');
                }
            }
        })
    }
})
</script>