<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pp/add'),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Permintaan Pembayaran
    <small>Data Permintaan Pembayaran</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>SPJ</li>
    <li>Nota Permintaan Dana</li>
    <li class="active">Permintaan Pembayaran</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
<div class="box">
	<div class="box-header">
		<h3 class="box-title"><?=ucfirst($page) ?> Permintaan Pembayaran</h3>
		<div class="pull-right">
			<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                
                    <!--<div class="form-group">-->
                    <!--    <label>Tanggal Permintaan Pembayaran *</label>-->
                    <!--    <div class="input-group date">-->
                    <!--        <div class="input-group-addon">-->
                    <!--        <i class="fa fa-calendar"></i>-->
                    <!--        </div>-->
                    <!--        <input type="date" name="tgl_pp" value="<?=date('Y-m-d') ?>" class="form-control" required>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--<div>-->
                    <div class="form-group">
                        <label>Sub Kegiatan *</label>
                        <select name="dpa_id" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($dpa->result() as $key => $data) { ?>
                            <option value="<?=$data->dpa_id ?>"><?=$data->nama_subkeg ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="nama_pa">PA *</label>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" name="nama_pa" id="nama_pa" class="form-control" required>
                        <input type="hidden" name="nip_pa" id="nip_pa" class="form-control" required>
                        <input type="hidden" name="jabatan_pa" id="jabatan_pa" class="form-control" required>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-pa"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <div class="form-group">
                        <label>PPTK *</label>
                        <select name="ttd_keu_id" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($ttd_keu->result() as $key => $data) { ?>
                            <option value="<?=$data->ttd_keu_id ?>"><?=$data->ttd_keu_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="nama_bpp">Bendahara *</label>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" name="nama_bpp" id="nama_bpp" class="form-control" required>
                        <input type="hidden" name="nip_bpp" id="nip_bpp" class="form-control" required>
                        <input type="hidden" name="jabatan_bpp" id="jabatan_bpp" class="form-control" required>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-bpp"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>

					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-success btn-flat">
							<i class="fa fa-paper-plane"></i> Save</button>
						<button type="reset" class="btn btn-flat">Reset</button>
					</div>
                
			</div>
		</div>
		
	</div>
</div>
</section>
<?php echo form_close(); ?>

<div class="modal fade" id="modal-pa">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Select Pengguna Anggaran</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="table3" > 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($ttd_keu->result() as $key => $data) { ?>
            <tr>
                <td width="5%"><?=$no++ ?>.</td>
                <td><?=$data->ttd_keu_name ?></td>
                <td><?=$data->nip ?></td>
                <td><?=$data->jabatan_ttd_keu ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-pa"
                    data-nama_pa="<?=$data->ttd_keu_name ?>"
                    data-nip_pa="<?=$data->nip ?>"
                    data-jabatan_pa="<?=$data->jabatan_ttd_keu ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modal-bpp">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Select Bendahara</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example1" > 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($ttd_keu->result() as $key => $data) { ?>
            <tr>
                <td width="5%"><?=$no++ ?>.</td>
                <td><?=$data->ttd_keu_name ?></td>
                <td><?=$data->nip ?></td>
                <td><?=$data->jabatan_ttd_keu ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-bpp"
                    data-nama_bpp="<?=$data->ttd_keu_name ?>"
                    data-nip_bpp="<?=$data->nip ?>"
                    data-jabatan_bpp="<?=$data->jabatan_ttd_keu ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
    $(document).on('click', '#select-pa', function() {
    var ttd_keu_name = $(this).data('nama_pa');
    var nip = $(this).data('nip_pa');
    var jabatan_ttd_keu = $(this).data('jabatan_pa');
    $('#nama_pa').val(ttd_keu_name);
    $('#nip_pa').val(nip);
    $('#jabatan_pa').val(jabatan_ttd_keu);
    $('#modal-pa').modal('hide');
})
})

    $(document).ready(function() {
    $(document).on('click', '#select-bpp', function() {
    var ttd_keu_name = $(this).data('nama_bpp');
    var nip = $(this).data('nip_bpp');
    var jabatan_ttd_keu = $(this).data('jabatan_bpp');
    $('#nama_bpp').val(ttd_keu_name);
    $('#nip_bpp').val(nip);
    $('#jabatan_bpp').val(jabatan_ttd_keu);
    $('#modal-bpp').modal('hide');
})
})
</script>