<section class="content-header">
  <h1>Luar Daerah
    <small>Data Luar Daerah</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Luar Daerah</li>
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
			<h3 class="box-title">Data Luar Daerah</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/ld/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Golongan</th>
						<th>Provinsi</th>
                        <th>Standar Biaya</th>
						<th width="13%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($ld->result() as $key => $data): ?>
					<tr>
						<td><?=$no++ ?>.</td>
						<td><?=$data->gol ?></td>
						<td><?=$data->name ?></td>
						<td><?=indo_currency($data->biaya) ?></td>
						<td>
							<a href="<?=site_url('portal/'.$this->uri->segment(2).'/ld/edit/'.$data->ld_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_ld" data-ldid="<?=$data->ld_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_ld', function() {
    if (confirm('Apakah anda yakin?')) {
        var ld_id = $(this).data('ldid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('ld/del_ld')?>',
            dataType : 'json',
            data : {'ld_id' : ld_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Perjadin Luar Daerah');
                }
            }
        })
    }
})
</script>