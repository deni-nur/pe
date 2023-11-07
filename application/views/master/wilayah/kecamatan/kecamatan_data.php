<section class="content-header">
  <h1>Kecamatan
    <small>Data Kecamatan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Master</li>
    <li class="active">Kecamatan</li>
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
			<h3 class="box-title">Data Kecamatan</h3>
			<div class="pull-right">
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/kecamatan/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Nama Kecamatan</th>
						<th width="15%">Actions</th>
					</tr>
					<?php $i = 0; $no =0;
                        foreach($kabupaten->result() as $key => $data_kab) {
                        foreach($kecamatan->result() as $key1 => $data_kec) {
                            if($data_kab->kabupaten_id == $data_kec->kabupaten_id) { 
                                ++$i;
                                if($i==1) { ?>
                    <tr>
                        <th colspan="3"><?=$data_kec->nama_kabupaten ?></th>
                    </tr>
                    <?php } ?>
				</thead>
				<tbody>
					<tr>
						<td><?=++$no; ?>.</td>
						<td><?=$data_kec->name ?></td>
						<td>
							<a href="<?=site_url('portal/'.$this->uri->segment(2).'/kecamatan/edit/'.$data_kec->kecamatan_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_kecamatan" data-kecamatanid="<?=$data_kec->kecamatan_id?>" class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </button>	
						</td>
					</tr>	
					<?php }} $i=0; } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>

<script>
    $(document).on('click', '#del_kecamatan', function() {
    if (confirm('Apakah anda yakin?')) {
        var kecamatan_id = $(this).data('kecamatanid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('kecamatan/del_kecamatan')?>',
            dataType : 'json',
            data : {'kecamatan_id' : kecamatan_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Data Kecamatan');
                }
            }
        })
    }
})
</script>