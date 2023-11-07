<section class="content-header">
  <h1>Indikator Kinerja Utama
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Indikator Kinerja Utama</li>
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
			<h3 class="box-title">Data IKU</h3>
			<div class="pull-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-cetak"><i class="fa fa-print"></i> Cetak</button>
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/iku/add') ?>" class="btn btn-success btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="5%">No</th>
			            <th>Sasaran Strategis Daerah</th>
                        <th>Bidang Penanggung Jawab</th>
                        <th>Pejabat Penandatangan</th>
			            <th>Tanggal</th>
			            <th width="12%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach($iku->result() as $key => $data) { ?>
					<tr>
						<td><?=$no++ ?>.</td>
						<td><?=$data->uraian_sasaran ?></td>
                        <td><?=$data->bidang_pj ?></td>
                        <td><?=$data->ttd_name ?></td>
						<td><?=indo_date($data->tanggal_iku) ?></td>
						<td>
							<a href="<?=site_url('portal/'.$this->uri->segment(2).'/iku/edit/'.$data->iku_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_iku" data-ikuid="<?=$data->iku_id?>" class="btn btn-xs btn-danger">
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

<div class="modal modal-info fade" id="modal-cetak">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Cetak Indikator Kinerja Utama</h4>
    </div>
    <form action="<?=base_url('iku/cetak') ?>" method="get" accept-charset="utf-8">
    <div class="modal-body table-responsive">
        <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
            <label>Pilih Tanggal *</label>
                <div class="input-group date">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                </div>
                <input type="date" name="tanggal_iku" value="" class="form-control">
                </div>
        </div>
        <div>

        <div class="form-group">
            <button type="submit" name="" class="btn btn-success btn-flat">
            <i class="fa fa-print"></i> Cetak</button>
        </div>
    </div>
</div>
</div>
</form>
</div>
</div>
</div>

<script>
    $(document).on('click', '#del_iku', function() {
    if (confirm('Apakah anda yakin?')) {
        var iku_id = $(this).data('ikuid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('iku/del_iku')?>',
            dataType : 'json',
            data : {'iku_id' : iku_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Renstra');
                }
            }
        })
    }
})
</script>

