<section class="content-header">
  <h1>Rincian Permintaan Pembayaran
    <small>Data Rincian Permintaan Pembayaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li class="active">Rincian Permintaan Pembayaran</li>
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
			<h3 class="box-title">Data Rincian Permintaan Pembayaran</h3>
			<div class="pull-right">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-cetak"><i class="fa fa-print"></i> Cetak</button>
				<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
				<a href="<?=base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp_add') ?>" class="btn btn-success btn-flat">
            		<i class="fa fa-plus"></i> Create
          		</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th width="2%">No</th>
						<th width="40%">Uraian</center></th>
                        <th>Nama</th>
                        <th width="13%">Biaya</th>
                        <th>Pajak</th>
                        <th width="10%">Tanggal Permintaan Pembayaran</th>
						<th width="15%">Actions</th>
					</tr>
                    <?php $no=1; $a=0;
                            foreach($belanja->result() as $key => $data_belanja) {
                            foreach($r_pp->result() as $key => $data_rpp) {
                            if($data_belanja->belanja_id == $data_rpp->belanja_id) { 
                                ++$a;
                                if($a==1) { ?>
                        <tr>
                            <th colspan="3">[BELANJA] <?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?> <?=$data_belanja->nama_sub_rincian_objek ?></th>
                            <th width="10%"><!-- <?=indo_currency($data_belanja->jumlah_biaya) ?> --></th>
                            <th colspan="3"></th>
                        </tr>
                    <?php } ?>        
                </thead>
                <tbody>
                    <tr>
                        <td><?=$no++ ?>.</td>
                        <td><?=$data_rpp->uraian ?></td>
                        <td><?=$data_rpp->name ?></td>
                        <td><?=indo_currency($data_rpp->biaya) ?></td>
                        <td><?=$data_rpp->pajak ?> %</td>
                        <td><?=format_indo($data_rpp->tgl_rpp) ?></td>
                        <td>
                            <a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp_edit/'.$data_rpp->r_pp_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <button id="del_r_pp" data-r_ppid="<?=$data_rpp->r_pp_id?>" class="btn btn-xs btn-danger">
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

<div class="modal modal-info fade" id="modal-cetak">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Cetak Permintaan Pembayaran</h4>
    </div>
    <form action="<?=base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/nota_dinas') ?>" method="get" accept-charset="utf-8">
    <div class="modal-body table-responsive">
        <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
            <label>Pilih Tanggal *</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                <!-- <input type="hidden" name="pp_id" value="<?=$this->uri->segment(4) ?>" class="form-control"> -->
                <input type="date" name="tgl_rpp" value="" class="form-control">
                </div>
        </div>

        <div class="form-group">
            <button type="submit" name="" class="btn btn-success btn-flat">
            <i class="fa fa-print"></i> Nota Dinas</button>
        </div>
    </div>
</div>
</form>

    <form action="<?=base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/filter') ?>" method="get" accept-charset="utf-8">
    <div class="modal-body table-responsive">
        <div class="col-md-4 col-md-offset-4">
        <div class="form-group">
            <label>Pilih Tanggal *</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                <!-- <input type="hidden" name="pp_id" value="<?=$this->uri->segment(4) ?>" class="form-control"> -->
                <input type="date" name="tgl_rpp" value="" class="form-control">
                </div>
        </div>
        <div>

        <div class="form-group">
            <button type="submit" name="" class="btn btn-success btn-flat">
            <i class="fa fa-print"></i> Lampiran NPD</button>
        </div>
    </div>
</div>
</div>
</form>



</div>
</div>
</div>

<script>
    $(document).on('click', '#del_r_pp', function() {
    if (confirm('Apakah anda yakin?')) {
        var r_pp_id = $(this).data('r_ppid')
        $.ajax({
            type : 'POST',
            url : '<?=site_url('pp/del_rpp')?>',
            dataType : 'json',
            data : {'r_pp_id' : r_pp_id},
            success : function(result) {
                if(result.success == true) {
                   location.reload();
                } else {
                    alert('Gagal Hapus Rincian Permintaan Pembayaran');
                }
            }
        })
    }
})
</script>