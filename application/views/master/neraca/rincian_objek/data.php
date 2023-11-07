<section class="content-header">
  <h1>Rincian Objek
    <small>Rincian Objek</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Neraca Belanja</li>
    <li class="active">Rincian Objek</li>
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
			<h3 class="box-title">Data Rincian Objek</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/rincian_objek/add') ?>" class="btn btn-success btn-flat">
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
                        <th>Kelompok</th>
                        <th>Jenis</th>
                        <th>Objek</th>
						<th>Kode Rincian Objek</th>
                        <th>Nama Rincian Objek</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($rincian_objek->result() as $key => $data) { ?>
                        <tr>
                            <td><?=$no++ ?>.</td>
                            <td><?=$data->kode_akun ?></td>
                            <td><?=$data->kode_kelompok ?></td>
                            <td><?=$data->kode_jenis ?></td>
                            <td><?=$data->kode_objek ?></td>
                            <td><?=$data->kode_rincian_objek ?></td>
                            <td><?=$data->nama_rincian_objek ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/rincian_objek/edit/'.$data->rincian_objek_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_rincian_objek" data-rincian_objekid="<?=$data->rincian_objek_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_rincian_objek', function() {
    if (confirm('Apakah anda yakin?')) {
        var rincian_objek_id = $(this).data('rincian_objekid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('rincian_objek/del_rincian_objek')?>',
            dataType : 'json',
            data : {'rincian_objek_id' : rincian_objek_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Rincian Objek Belanja');
                }
            }
        })
    }
})
</script>