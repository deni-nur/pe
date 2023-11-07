<section class="content-header">
  <h1>Provinsi
    <small>Data Provinsi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Provinsi</li>
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
			<h3 class="box-title">Data Provinsi</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/provinsi/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Nama Provinsi</th>
						<th width="15%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($provinsi->result() as $key => $data): ?>
					<tr>
						<td><?=$no++ ?>.</td>
						<td><?=$data->name ?></td>
						<td>
							<a href="<?=site_url('portal/'.$this->uri->segment(2).'/provinsi/edit/'.$data->provinsi_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_provinsi" data-provinsiid="<?=$data->provinsi_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_provinsi', function() {
    if (confirm('Apakah anda yakin?')) {
        var provinsi_id = $(this).data('provinsiid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('provinsi/del_provinsi')?>',
            dataType : 'json',
            data : {'provinsi_id' : provinsi_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Provinsi');
                }
            }
        })
    }
})
</script>