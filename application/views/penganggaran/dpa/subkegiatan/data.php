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
    <?php 
    //$this->view('messages') 
    ?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success'); ?>"></div>
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
                        <th>No</th>
						<th width="35%">Sub Kegiatan</th>
                        <th>Indikator</th>
                        <th>Target</th>
                        <th>Satuan</th>
                        <th>Pagu Anggaran</th>
						<th width="8%">Actions</th>
					</tr>
				</thead>
				<tbody>	
                    <?php $no=1;
                        foreach($dpa->result() as $key => $data_dpa) { ?>		
                    <tr>
                        <td><?=$no++; ?>.</td>
                        <td><?=$data_dpa->kode_urusan ?>.<?=$data_dpa->kode ?>.<?=$data_dpa->kode_program ?>.<?=$data_dpa->kode_kegiatan ?>.<?=$data_dpa->kode_subkeg ?> <?=$data_dpa->nama_subkeg ?></td>
                        <td><?=$data_dpa->uraian_indikator_subkeg ?></td>
                        <td><?=$data_dpa->target ?></td>
                        <td><?=$data_dpa->satuan ?></td>
                        <td><?=indo_currency($data_dpa->jumlah_pagu_subkeg) ?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/'.$data_dpa->dpa_id.'/belanja') ?>" class="btn btn-info btn-xs">
                                <i class="fa fa-plus" title="Rincian Belanja"></i> 
                            </a>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa/edit/'.$data_dpa->dpa_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil" title="Update"></i> 
                            </a>
                            <button id="del_dpa" data-dpaid="<?=$data_dpa->dpa_id ?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash" title="Delete"></i> 
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