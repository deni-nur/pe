<section class="content-header">
  <h1>Penempatan Transmigrasi
    <small>Data Penempatan Transmigrasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Data Transmigrasi</li>
    <li class="active">Penempatan Transmigrasi</li>
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
			<h3 class="box-title">Data Penempatan Transmigrasi</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pnp_trans/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Nama KK</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
						<th>Status</th>
                        <th>Hubungan Keluarga</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($pnp_trans->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++ ?>.</td>
                        <td><?=$data->nama_kk ?>
                        <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pnp_trans/'.$data->pnp_trans_id.'/anggota_trans') ?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-plus"></i> Anggota Keluarga
                        </a>
                        </td>
                        <td><?=$data->jk ?></td>
                        <td><?=$data->umur ?></td>
                        <td><?=$data->status ?></td>
                        <td><?=$data->hub_kel ?></td>
                        <td>
                           <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pnp_trans/edit/'.$data->pnp_trans_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_pnp_trans" data-pnp_transid="<?=$data->pnp_trans_id?>" class="btn btn-xs btn-danger">
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
    $(document).on('click', '#del_pnp_trans', function() {
    if (confirm('Apakah anda yakin?')) {
        var pnp_trans_id = $(this).data('pnp_transid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pnp_trans/del_pnp_trans')?>',
            dataType : 'json',
            data : {'pnp_trans_id' : pnp_trans_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Penempatan Transmigrasi');
                }
            }
        })
    }
})
</script>