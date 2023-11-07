<section class="content-header">
  <h1>Kegiatan
    <small>Data Kegiatan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li>DPA</li>
    <li class="active">Kegiatan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Kegiatan</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/kegiatan/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<!-- <th width="5%">No</th> -->
						<th>Bidang urusan / Program / Kegiatan</th>
						<th>Actions</th>
					</tr>
                    <?php 
                    $i = 0; $no = 0; $a=0;
                    foreach($renstra->result() as $key => $data_rens) {
                    foreach($program->result() as $key1 => $data_prog) {
                        if($data_rens->b_urusan == $data_prog->b_urusan) { 
                            ++$a;
                            if($a==1) { ?>
                    <tr>
                        <th colspan="3"><?=$data_rens->k_urusan ?> <?=$data_prog->b_urusan ?></th>
                    </tr>
                    <?php } ?>
                    <?php 
                    foreach($kegiatan->result() as $key2 => $data_keg) {
                        if($data_prog->nama_program == $data_keg->nama_program) {
                            ++$i;
                            if($i==1) { ?>
                    <tr>
                        <th colspan="3"><?=$data_rens->k_urusan ?>.<?=$data_prog->kode_rek ?> <?=$data_keg->nama_program ?></th>
                    </tr>
                    <?php } ?>
                </thead>
                    <tbody>
                        <tr>
                            <!-- <td style="width: 5%"><?=++$no; ?>.</td> -->
                            <td><?=$data_rens->k_urusan ?>.<?=$data_prog->kode_rek ?>.<?=$data_keg->kode_rek ?>
                                <?=$data_keg->nama_kegiatan ?>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kegiatan/'.$data_keg->kegiatan_id.'/ik_kegiatan') ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> Indikator Kegiatan
                                </a>
                            </td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/kegiatan/edit/'.$data_keg->kegiatan_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_kegiatan" data-kegiatanid="<?=$data_keg->kegiatan_id ?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    <?php }} $i=0; }} $a=0; } ?>
				</tbody>
			</table>
		</div>
	</div>

</section>

<script>
    $(document).on('click', '#del_kegiatan', function() {
    if (confirm('Apakah anda yakin?')) {
        var kegiatan_id = $(this).data('kegiatanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kegiatan/del_kegiatan')?>',
            dataType : 'json',
            data : {'kegiatan_id' : kegiatan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Kegiatan');
                }
            }
        })
    }
})
</script>