<section class="content-header">
  <h1>Permintaan Pembayaran
    <small>Data Permintaan Pembayaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Permintaan Pembayaran</li>
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
			<h3 class="box-title">Data Permintaan Pembayaran</h3>
			<div class="pull-right">
				<a href="<?=base_url('portal/'.$this->uri->segment(2).'/pp/add') ?>" class="btn btn-success btn-flat">
            		<i class="fa fa-plus"></i> Create
          		</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="2%">No</th>
						<th>Sub Kegiatan</center></th>
						<th width="13%">Pagu Anggaran</th>
						<th width="13%">Realisasi</th>
						<th width="13%">Sisa</th>
						<th width="22%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; $a=0;
		            foreach($pp->result() as $key => $data_pp) { 
		            foreach($realisasi->result() as $key => $data_realisasi) {
		            if($data_pp->dpa_id == $data_realisasi->dpa_id) { 
		            	++$a;
		            	if($a==1) { ?>  
		            <?php } ?>
					<tr>
						<td><?=$no++ ?>.</td>
						<td><?=$data_pp->kode_urusan ?>.<?=$data_pp->kode ?>.<?=$data_pp->kode_program ?>.<?=$data_pp->kode_kegiatan ?>.<?=$data_pp->kode_subkeg ?> <?=$data_pp->nama_subkeg ?></td>
						<td><?=indo_currency($data_pp->jumlah_pagu_subkeg) ?></td>
						<td><?=indo_currency($data_realisasi->jumlah_realisasi) ?></td>
						<td><?=indo_currency($data_pp->jumlah_pagu_subkeg - $data_realisasi->jumlah_realisasi) ?></td>
						<td>
							<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp/'.$data_pp->pp_id.'/r_pp_data') ?>" class="btn btn-primary btn-xs">
                				<i class="fa fa-plus"></i> Rincian
              				</a>
              				<!-- <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp/cetak/'.$data_pp->pp_id) ?>" class="btn btn-info btn-xs">
                				<i class="fa fa-print"></i> Cetak
              				</a> -->
							<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp/edit/'.$data_pp->pp_id) ?>" class="btn btn-warning btn-xs">
					            <i class="fa fa-pencil"></i> Update
					        </a>
					        <button id="del_pp" data-ppid="<?=$data_pp->pp_id?>" class="btn btn-xs btn-danger">
					            <i class="fa fa-trash"></i> Delete
					        </button>
						</td>
					</tr>
				<?php }} $a=0; } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_pp', function() {
    if (confirm('Apakah anda yakin?')) {
        var pp_id = $(this).data('ppid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pp/del_pp')?>',
            dataType : 'json',
            data : {'pp_id' : pp_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Permintaan Pembayaran');
                }
            }
        })
    }
})
</script>