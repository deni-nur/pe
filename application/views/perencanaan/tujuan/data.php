<section class="content-header">
  <h1>Tujuan PD
    <small>Tujuan PD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Perencanaan</li>
    <li>Cascading Renstra</li>
    <li class="active">Tujuan PD</li>
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
			<h3 class="box-title">Data Tujuan PD</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th rowspan="2">Indikator</th>
                        <th colspan="7">Target</th>
						<th rowspan="2" width="21%">Actions</th>
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
                    foreach($bidang_urusan->result() as $key => $data_bid_urusan) {
                    foreach($tujuan->result() as $key1 => $data_tujuan) {
                        if($data_bid_urusan->uraian_bidang_urusan == $data_tujuan->uraian_bidang_urusan) { 
                            ++$a;
                            if($a==1) { ?>
                    <tr>
                        <th colspan="9">[URUSAN] <?=$data_tujuan->uraian_bidang_urusan ?></th>
                    </tr>
                    <tr>
                        <th colspan="8">[TUJUAN] <?=$data_tujuan->uraian_tujuan ?></th>
                        <th><a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_tujuan->tujuan_id.'/indikator_tujuan_add') ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i> Indikator Tujuan
                            </a>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/edit/'.$data_tujuan->tujuan_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_tujuan" data-tujuanid="<?=$data_tujuan->tujuan_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </th>
                    </tr>
                    <?php } ?>
                    <?php 
                    foreach($indikator_tujuan->result() as $key2 => $data_ik_tujuan) {
                        if($data_tujuan->uraian_tujuan == $data_ik_tujuan->uraian_tujuan) {
                            ++$i;
                            if($i==1) { ?>
                    
                    <?php } ?>
				</thead>
				<tbody>
                        <tr>
                            <td rowspan="4"><?=$data_ik_tujuan->uraian_indikator_tujuan ?></td>
                            <td><?=$data_ik_tujuan->awal ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->satu ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->dua ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->tiga ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->empat ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->lima ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->akhir ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_ik_tujuan->tujuan_id.'/indikator_tujuan_realisasi/'.$data_ik_tujuan->indikator_tujuan_id) ?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-plus"></i> Realisasi
                                </a>
                                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/tujuan/'.$data_ik_tujuan->tujuan_id.'/indikator_tujuan_edit/'.$data_ik_tujuan->indikator_tujuan_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <button id="del_indikator_tujuan" data-indikatortujuanid="<?=$data_ik_tujuan->indikator_tujuan_id?>" class="btn btn-xs btn-danger">
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
                            <td><?=$data_ik_tujuan->r_awal ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->r_satu ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->r_dua ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->r_tiga ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->r_empat ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->r_lima ?> <?=$data_ik_tujuan->satuan ?></td>
                            <td><?=$data_ik_tujuan->r_akhir ?> <?=$data_ik_tujuan->satuan ?></td>
                        </tr>
                        <?php }} $i=0; }} $a=0; } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_tujuan', function() {
    if (confirm('Apakah anda yakin?')) {
        var tujuan_id = $(this).data('tujuanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('tujuan/del_tujuan')?>',
            dataType : 'json',
            data : {'tujuan_id' : tujuan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Tujuan PD');
                }
            }
        })
    }
});

    $(document).on('click', '#del_indikator_tujuan', function() {
    if (confirm('Apakah anda yakin?')) {
        var indikator_tujuan_id = $(this).data('indikatortujuanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('tujuan/del_indikator_tujuan')?>',
            dataType : 'json',
            data : {'indikator_tujuan_id' : indikator_tujuan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Indikator Tujuan PD');
                }
            }
        })
    }
});
</script>