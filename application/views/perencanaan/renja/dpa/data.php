<section class="content-header">
      <h1>Dokumen Pelaksanaan Anggaran
        <small>Data DPA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li>Renja</li>
        <li class="active">DPA</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Dokumen Pelaksanaan Anggaran</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<!-- <th width="5%">No</th> -->
						<th>Bidang Urusan / Program / Kegiatan / Sub Kegiatan</th>
                        <th>Indikator</th>
                        <th>Target</th>
                        <th>Satuan</th>
                        <th>Pagu Anggaran</th>
						<th>Actions</th>
					</tr>
                    <?php 
                    $i = 0; $no = 0; $a = 0; $b = 0;
                    foreach($renstra->result() as $key => $data_rens) {
                    foreach($program->result() as $key1 => $data_prog) {
                        if($data_rens->b_urusan == $data_prog->b_urusan) { 
                            ++$b;
                            if($b==1) { ?>
                    <tr>
                        <th colspan="6"><?=$data_rens->k_urusan ?> <?=$data_prog->b_urusan ?></th>
                    </tr>
                    <?php } ?>
                    <?php 
                    foreach($kegiatan->result() as $key2 => $data_keg) {
                        if($data_prog->nama_program == $data_keg->nama_program) {
                            ++$a;
                            if($a==1) { ?>
                    <tr>
                        <th colspan="6"><?=$data_rens->k_urusan ?>.<?=$data_prog->kode_rek ?> <?=$data_keg->nama_program ?></th>
                    </tr>
                    <?php } ?>
                    <?php 
                    foreach($dpa->result() as $key3 => $data_subkeg) {
                        if($data_keg->nama_kegiatan == $data_subkeg->nama_kegiatan) {
                            ++$i;
                            if($i==1) { ?>
                    <tr>
                        <th colspan="6"><?=$data_rens->k_urusan ?>.<?=$data_prog->kode_rek ?>.<?=$data_keg->kode_rek ?> <?=$data_subkeg->nama_kegiatan ?></th>
                    </tr>
                    <?php } ?>
				</thead>
				<tbody>					
                        <tr>
                            <!-- <td><?=++$no; ?>.</td> -->
                            <td><?=$data_rens->k_urusan ?>.<?=$data_prog->kode_rek ?>.<?=$data_keg->kode_rek ?>.<?=$data_subkeg->kode_rek_subkeg ?> <?=$data_subkeg->nama_subkeg ?>
                            	<a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$data_subkeg->dpa_id.'/r_belanja') ?>" class="btn btn-info btn-xs">
                            		<i class="fa fa-plus"></i> Rincian Belanja
                        		</a>
                            </td>
                            <td><?=$data_subkeg->indikator ?></td>
                            <td><?=$data_subkeg->target ?></td>
                            <td><?=$data_subkeg->satuan ?></td>
                            <td><?=indo_currency($data_subkeg->pagu) ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/edit/'.$data_subkeg->dpa_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_dpa" data-dpaid="<?=$data_subkeg->dpa_id ?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    <?php }} $i=0; }} $a=0; }} $b=0; } ?>
				</tbody>
			</table>
		</div>
	</div>

</section>

<script>
    $(document).on('click', '#del_dpa', function() {
    if (confirm('Apakah anda yakin?')) {
        var dpa_id = $(this).data('dpaid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('dpa/del_dpa')?>',
            dataType : 'json',
            data : {'dpa_id' : dpa_id},
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