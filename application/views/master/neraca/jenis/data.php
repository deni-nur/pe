<section class="content-header">
  <h1>Jenis
    <small>Jenis</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>Neraca Belanja</li>
    <li class="active">Jenis</li>
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
			<h3 class="box-title">Data Jenis</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/jenis/add') ?>" class="btn btn-success btn-flat">
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
						<th>Kode Jenis</th>
                        <th>Nama Jenis</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1;
                        foreach($jenis->result() as $key => $data) { ?>
                        <tr>
                            <td><?=$no++ ?>.</td>
                            <td><?=$data->kode_akun ?></td>
                            <td><?=$data->kode_kelompok ?></td>
                            <td><?=$data->kode_jenis ?></td>
                            <td><?=$data->nama_jenis ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/jenis/edit/'.$data->jenis_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_jenis" data-jenisid="<?=$data->jenis_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_jenis', function() {
    if (confirm('Apakah anda yakin?')) {
        var jenis_id = $(this).data('jenisid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('jenis/del_jenis')?>',
            dataType : 'json',
            data : {'jenis_id' : jenis_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Jenis Belanja');
                }
            }
        })
    }
})
</script>