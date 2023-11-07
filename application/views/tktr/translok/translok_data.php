<section class="content-header">
  <h1>Transmigrasi Lokal
    <small>Data Transmigrasi Lokal</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Wilayah</li>
    <li class="active">Transmigrasi Lokal</li>
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
			<h3 class="box-title">Data Transmigrasi Lokal</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/translok/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>UPT</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
						<th>KK</th>
                        <th>Jiwa</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($translok->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++ ?>.</td>
                        <td><?=$data->upt ?></td>
                        <td><?=$data->nama_desa ?></td>
                        <td><?=$data->nama_kecamatan ?></td>
                        <td><?=$data->kk ?></td>
                        <td><?=indo_bil($data->jiwa) ?></td>
                        <td>
                           <a href="<?=site_url('portal/'.$this->uri->segment(2).'/translok/edit/'.$data->translok_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_translok" data-translokid="<?=$data->translok_id?>" class="btn btn-xs btn-danger">
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

<script>
    $(document).on('click', '#del_translok', function() {
    if (confirm('Apakah anda yakin?')) {
        var translok_id = $(this).data('translokid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('translok/del_translok')?>',
            dataType : 'json',
            data : {'translok_id' : translok_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Translok');
                }
            }
        })
    }
})
</script>