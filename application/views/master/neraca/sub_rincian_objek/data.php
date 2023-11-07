<section class="content-header">
  <h1>Sub Rincian Objek
    <small>Sub Rincian Objek SPPD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Neraca</li>
    <li class="active">Sub Rincian Objek</li>
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
			<h3 class="box-title">Data Sub Rincian Objek</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/sub_rincian_objek/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
                        <th>Akun</th>
                        <th>Kelompok</th>
                        <th>Jenis</th>
                        <th>Objek</th>
                        <th>Rincian Objek</th>
						<th>Kode Sub Rincian Objek</th>
                        <th>Nama Sub Rincian Objek</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($sub_rincian_objek->result() as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?>.</td>
                            <td><?=$data->kode_akun ?></td>
                            <td><?=$data->kode_kelompok ?></td>
                            <td><?=$data->kode_jenis ?></td>
                            <td><?=$data->kode_objek ?></td>
                            <td><?=$data->kode_rincian_objek ?></td>
                            <td><?=$data->kode_sub_rincian_objek ?></td>
                            <td><?=$data->nama_sub_rincian_objek ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/sub_rincian_objek/edit/'.$data->sub_rincian_objek_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_sub_rincian_objek" data-sub_rincian_objekid="<?=$data->sub_rincian_objek_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_sub_rincian_objek', function() {
    if (confirm('Apakah anda yakin?')) {
        var sub_rincian_objek_id = $(this).data('sub_rincian_objekid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('sub_rincian_objek/del_sub_rincian_objek')?>',
            dataType : 'json',
            data : {'sub_rincian_objek_id' : sub_rincian_objek_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Sub Rincian Objek');
                }
            }
        })
    }
})
</script>