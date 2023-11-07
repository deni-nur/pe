<section class="content-header">
      <h1>Sasaran RPJMD
        <small>Sasaran RPJMD</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Perencanaan</li>
        <li class="active">Sasaran RPJMD</li>
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
			<h3 class="box-title">Data Sasaran RPJMD</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/sasaran_rpjmd/add') ?>" class="btn btn-success">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th rowspan="2">Uraian</th>
                        <th colspan="7">Target </th>
						<th rowspan="2" width="25%">Actions</th>
					</tr>
                    <tr>
                        <th>Awal</th>
                        <th>2022</th>
                        <th>2023</th>
                        <th>2024</th>
                        <th>2025</th>
                        <th>2026</th>
                        <th>Akhir</th>
                    </tr>
                    <?php 
                    $i = 0; $no = 0; $a=0;
                    foreach($sasaran_rpjmd->result() as $key => $data_sasaran_rpjmd) { ?>
                    <tr>
                        <th colspan="8">[SASARAN RPJMD] <?=$data_sasaran_rpjmd->uraian ?></th>
                        <th>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/sasaran_rpjmd/'.$data_sasaran_rpjmd->sasaran_rpjmd_id.'/indikator_sasaran_rpjmd_add') ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> Indikator Sasaran RPJMD
                                </a>
                                <a href="<?=site_url('portal/'.$data_sasaran_rpjmd->portal_id.'/sasaran_rpjmd/edit/'.$data_sasaran_rpjmd->sasaran_rpjmd_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_sasaran_rpjmd" data-sasaran_rpjmdid="<?=$data_sasaran_rpjmd->sasaran_rpjmd_id?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                        </th>
                    </tr>
                <?php } ?>
                <?php foreach($indikator_sasaran_rpjmd->result() as $key1 => $data_indikator) {
                        if($data_sasaran_rpjmd->uraian == $data_indikator->uraian) { 
                            ++$a;
                            if($a==1) { ?>

                <?php } ?>
				</thead>
				<tbody>
                        <tr>
                            <td rowspan="4"><?=$data_indikator->uraian_indikator_sasaran_rpjmd ?></td>
                            <td><?=$data_indikator->awal ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->satu ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->dua ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->tiga ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->empat ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->lima ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->akhir ?> <?=$data_indikator->satuan ?></td>
                            <td>
                                <a href="<?=site_url('portal/'.$data_indikator->portal_id.'/sasaran_rpjmd/'.$data_indikator->sasaran_rpjmd_id.'/indikator_sasaran_rpjmd_realisasi/'.$data_indikator->indikator_sasaran_rpjmd_id) ?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-plus"></i> Realisasi
                                </a>
                                <a href="<?=site_url('portal/'.$data_indikator->portal_id.'/sasaran_rpjmd/'.$data_indikator->sasaran_rpjmd_id.'/indikator_sasaran_rpjmd_edit/'.$data_indikator->indikator_sasaran_rpjmd_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_indikator_sasaran_rpjmd" data-indikator_sasaran_rpjmdid="<?=$data_indikator->indikator_sasaran_rpjmd_id?>" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="7">Realisasi</th>
                        </tr>
                        <tr>
                            <th>Awal</th>
                            <th>2022</th>
                            <th>2023</th>
                            <th>2024</th>
                            <th>2025</th>
                            <th>2026</th>
                            <th>Akhir</th>
                        </tr>
                        <tr>
                            <td><?=$data_indikator->r_awal ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->r_satu ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->r_dua ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->r_tiga ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->r_empat ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->r_lima ?> <?=$data_indikator->satuan ?></td>
                            <td><?=$data_indikator->r_akhir ?> <?=$data_indikator->satuan ?></td>
                        </tr>
                    <?php } $i=0; } $a=0;  ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_sasaran_rpjmd', function() {
    if (confirm('Apakah anda yakin?')) {
        var sasaran_rpjmd_id = $(this).data('sasaran_rpjmdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('sasaran_rpjmd/del')?>',
            dataType : 'json',
            data : {'sasaran_rpjmd_id' : sasaran_rpjmd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Sasaran RPJMD');
                }
            }
        })
    }
});

    $(document).on('click', '#del_indikator_sasaran_rpjmd', function() {
    if (confirm('Apakah anda yakin?')) {
        var indikator_sasaran_rpjmd_id = $(this).data('indikator_sasaran_rpjmdid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('sasaran_rpjmd/del_indikator_sasaran_rpjmd')?>',
            dataType : 'json',
            data : {'indikator_sasaran_rpjmd_id' : indikator_sasaran_rpjmd_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Indikator Sasaran RPJMD');
                }
            }
        })
    }
});
</script>