<section class="content-header">
  <h1>Rincian Belanja
    <small>Data Rincian Belanja</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Renja</li>
    <li class="active">Rincian Belanja</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Rincian Belanja</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$this->uri->segment(4).'/r_belanja/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
                <a href="<?=base_url('portal/'.$this->uri->segment(2).'/dpa') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
                        <th>Kode Rekening</th>
                        <th>Nama Rekening</th>
						<th>Pagu Anggaran</th>
						<th width="13%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no =1; foreach ($r_belanja->result() as $key => $data) { ?>
                        <tr>
                            <td><?=$no++ ?>.</td>
                            <td><?=$data->kode_rek ?></td>
                            <td><?=$data->nama_rek ?></td>
                            <td><?=indo_bil($data->jumlah) ?></td>
                            <td>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$data->dpa_id.'/r_belanja/edit/'.$data->r_belanja_id) ?>" class="btn btn-warning btn-xs">
                                  <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_r_belanja" data-r_belanjaid="<?=$data->r_belanja_id ?>" class="btn btn-xs btn-danger">
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
<?php
echo form_close();
?>
<script>
    $(document).on('click', '#del_r_belanja', function() {
    if (confirm('Apakah anda yakin?')) {
        var r_belanja_id = $(this).data('r_belanjaid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('r_belanja/del_r_belanja')?>',
            dataType : 'json',
            data : {'r_belanja_id' : r_belanja_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Sub Kegiatan');
                }
            }
        })
    }
})
</script>