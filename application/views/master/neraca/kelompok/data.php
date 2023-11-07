<section class="content-header">
  <h1>Kelompok
    <small>Kelompok</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Neraca Belanja</li>
    <li class="active">Kelompok</li>
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
			<h3 class="box-title">Data Kelompok</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/kelompok/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="2%">No</th>
                        <th>Akun</th>
						<th>Kode Kelompok</th>
                        <th>Nama Kelompok</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($kelompok->result() as $key => $data) { ?>
                        <tr>
                            <td><?=$no++ ?>.</td>
                            <td><?=$data->kode_akun ?></td>
                            <td><?=$data->kode_kelompok ?></td>
                            <td><?=$data->nama_kelompok ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kelompok/edit/'.$data->kelompok_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_kelompok" data-kelompokid="<?=$data->kelompok_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_kelompok', function() {
    if (confirm('Apakah anda yakin?')) {
        var kelompok_id = $(this).data('kelompokid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kelompok/del_kelompok')?>',
            dataType : 'json',
            data : {'kelompok_id' : kelompok_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Kelompok Belanja');
                }
            }
        })
    }
})
</script>