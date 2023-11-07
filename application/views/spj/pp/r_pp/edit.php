<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp_edit/'.$r_pp->r_pp_id),' class="form-horizontal"');
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
			<a href="<?=site_url('portal/'.$this->uri->segment(2).'/pp/'.$this->uri->segment(4).'/r_pp_data') ?>" class="btn btn-warning btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                    
                    <div class="form-group">
                        <label>Tanggal Permintaan Pembayaran *</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" name="tgl_rpp" value="<?=$r_pp->tgl_rpp ?>" class="form-control" required>
                            </div>
                        </div>
                    <div>

                    <div class="form-group">
                    <label for="nama_prog">Nama Belanja *</label>
                    </div>
                    <div class="form-group input-group">
                        <input type="hidden" name="belanja_id" value="<?=$r_pp->belanja_id ?>" id="belanja_id">
                        <input type="text" name="nama_rek" value="<?=$r_pp->nama_sub_rincian_objek ?>" id="nama_rek" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-belanja"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="uraian">Uraian *</label>
                        <textarea name="uraian" id="maksud" rows="5" class="form-control" required autofocus><?=$r_pp->uraian ?></textarea>
                        <span class="input-group-btn btn-group-vertical">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-st"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>

                    <div class="form-group">
                    <label for="name">Nama *</label>
                        <input type="hidden" name="st_id" value="<?=$r_pp->st_id ?>" id="st_id">
                        <input type="hidden" name="pengikut_id" value="<?=$r_pp->pengikut_id ?>" id="pengikut_id">
                        <input type="hidden" name="nip" value="<?=$r_pp->nip ?>" id="nip">
                        <input type="hidden" name="pangkat" value="<?=$r_pp->pangkat ?>" id="pangkat">
                        <input type="hidden" name="golongan" value="<?=$r_pp->golongan ?>" id="golongan">
                        <input type="hidden" name="jabatan" value="<?=$r_pp->jabatan ?>" id="jabatan">
                        <input type="text" name="name" id="name" value="<?=$r_pp->name ?>" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                    <label for="tempat_tujuan">Tempat Tujuan</label>
                        <input type="hidden" name="sppd_id" value="<?=$r_pp->sppd_id ?>" id="sppd_id">
                        <input type="text" name="tempat_tujuan" value="<?=$r_pp->tempat_tujuan ?>" id="tempat_tujuan" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                    <label for="lama_perjalanan">Kuantitas *</label>
                        <input type="text" name="lama_perjalanan" value="<?=$r_pp->lama_perjalanan ?>" id="lama_perjalanan" class="form-control" readonly required>
                    </div>

                    <div class="form-group">
                    <label for="rek_bank">Nomor Rekening *</label>
                    </div>
                    <div class="form-group input-group">
                        <input type="hidden" name="rekening_id" value="<?=$r_pp->rekening_id ?>" id="rekening_id">
                        <input type="text" name="rek_bank" value="<?=$r_pp->rek_bank ?>" id="rek_bank" class="form-control" required autofocus readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-rekening"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>

                    <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik Rekening *</label>
                        <input type="text" name="nama_pemilik" value="<?=$r_pp->nama_pemilik ?>" id="nama_pemilik" class="form-control"readonly>
                    </div>

                    <div class="form-group">
                    <label for="biaya">Biaya </label>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" name="biaya" value="<?=$r_pp->biaya ?>" id="biaya" class="form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-nilai"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                
                    <div class="form-group">
                        <label for="pajak">Pajak (%)</label>
                        <input type="text" name="pajak" value="<?=$r_pp->pajak ?>" id="pajak" class="form-control">
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

<div class="modal fade" id="modal-belanja">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Rincian Belanja</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example2" >
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Rekening</th>
                <th>Nama Belanja</th>
                <th>Pagu Belanja</th>
                <th>Action</th>
            </tr>
            <?php $i = 0; $no = 0; 
                foreach($dpa->result() as $key => $data_sub) {
                foreach($belanja->result() as $key2 => $data_belanja) {
                if($data_sub->nama_subkeg == $data_belanja->nama_subkeg) {
                  ++$i;
                if($i==1) { ?>
            <tr>
              <th colspan="4"><?=$data_sub->kode_urusan ?>.<?=$data_sub->kode ?>.<?=$data_sub->kode_program ?>.<?=$data_sub->kode_kegiatan ?>.<?=$data_sub->kode_subkeg ?> <?=$data_sub->nama_subkeg ?></th>
            </tr>
          <?php } ?>
        </thead>
        <tbody>
            <tr>
                <td width="5%"><?=++$no; ?>.</td>
                <td><?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?></td>
                <td width="50%"><?=$data_belanja->nama_sub_rincian_objek ?></td>
                <td><?=indo_currency($data_belanja->pagu_belanja) ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-belanja"
                    data-belanja_id="<?=$data_belanja->belanja_id ?>"
                    data-kode_rek="<?=$data_belanja->kode_akun ?>.<?=$data_belanja->kode_kelompok ?>.<?=$data_belanja->kode_jenis ?>.<?=$data_belanja->kode_objek ?>.<?=$data_belanja->kode_rincian_objek ?>.<?=$data_belanja->kode_sub_rincian_objek ?>"
                    data-nama_rek="<?=$data_belanja->nama_sub_rincian_objek ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
            </tr>
            <?php }} $i=0; } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modal-st">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Select Surat Tugas</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example1" >      
        <!-- <caption><b>Pelaksana Surat Tugas</b></caption> -->
        <thead>
            <tr>
                <th>No</th>
                <th>Maksud</th>
                <th>Pelaksana</th>
                <th>Tempat Tujuan</th>
                <th>Lama Perjalanan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($sppd as $key => $data) { ?>
            <tr>
                <td width="5%"><?=$no++ ?>.</td>
                <td><?=$data->maksud ?></td>
                <td><?=$data->name ?></td>
                <td><?=$data->tempat_tujuan ?></td>
                <td><?=$data->lama_perjalanan ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-sppd"
                    data-st_id="<?=$data->st_id ?>"
                    data-sppd_id="<?=$data->sppd_id ?>"
                    data-maksud="<?=$data->maksud ?>"
                    data-name="<?=$data->name ?>"
                    data-tempat_tujuan="<?=$data->tempat_tujuan ?>"
                    data-lama_perjalanan="<?=$data->lama_perjalanan ?>"
                    data-nip="<?=$data->nip ?>"
                    data-pangkat="<?=$data->pangkat ?>"
                    data-golongan="<?=$data->gol ?>"
                    data-jabatan="<?=$data->jabatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>    
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <table class="table table-bordered table-striped" id="table1">
        <caption>Pengikut Surat Tugas</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>Maksud</th>
                <th>Pengikut</th>
                <th>Tempat Tujuan</th>
                <th>Lama Perjalanan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($pengikut as $key => $data) { ?>
            <tr>
                <td width="5%"><?=$no++ ?>.</td>
                <td><?=$data->maksud ?></td>
                <td><?=$data->pengikut_name ?></td>
                <td><?=$data->tempat_tujuan ?></td>
                <td><?=$data->lama_perjalanan ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-pengikut"
                    data-st_id="<?=$data->st_id ?>"
                    data-sppd_id="<?=$data->sppd_id ?>"
                    data-pengikut_id="<?=$data->pengikut_id ?>"
                    data-maksud="<?=$data->maksud ?>"
                    data-name="<?=$data->pengikut_name ?>"
                    data-tempat_tujuan="<?=$data->tempat_tujuan ?>"
                    data-lama_perjalanan="<?=$data->lama_perjalanan ?>"
                    data-nip="<?=$data->pengikut_nip ?>"
                    data-pangkat="<?=$data->pengikut_pangkat ?>"
                    data-golongan="<?=$data->pengikut_gol ?>"
                    data-jabatan="<?=$data->pengikut_jabatan ?>">
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

<div class="modal fade" id="modal-rekening">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Select Rekening</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="table2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Rekening</th>
                <th>Nama Bank</th>
                <th>Nama Pemilik</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($rekening as $i => $data) { ?>
            <tr>
                <td><?=$no++ ?></td>
                <td><?=$data->rek_bank ?></td>
                <td><?=$data->nama_bank ?></td>
                <td><?=$data->nama_pemilik ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-rekening"
                    data-rekening_id="<?=$data->rekening_id ?>"
                    data-rek_bank="<?=$data->rek_bank ?>"
                    data-nama_pemilik="<?=$data->nama_pemilik ?>">
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

<div class="modal fade" id="modal-nilai">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Select Standar Biaya Perjalanan Dinas</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="table3" >      
        <caption>Standar Biaya Perjalanan Dinas Dalam Daerah</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>Golongan</th>
                <th>Kecamatan</th>
                <th>Standar Biaya</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($dd->result() as $key => $data) { ?>
            <tr>
                <td width="5%"><?=$no++ ?>.</td>
                <td><?=$data->gol ?></td>
                <td><?=$data->name ?></td>
                <td><?=indo_currency($data->biaya) ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-nilai"
                    data-dd_id="<?=$data->dd_id ?>"
                    data-biaya="<?=$data->biaya ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <table class="table table-bordered table-striped" id="table4">
        <caption>Standar Biaya Perjalanan Dinas Luar Daerah</caption>
        <thead>
            <tr>
                <th>No</th>
                <th>Golongan</th>
                <th>Provinsi</th>
                <th>Standar Biaya</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($ld->result() as $key => $data) { ?>
            <tr>
                <td width="5%"><?=$no++ ?>.</td>
                <td><?=$data->gol ?></td>
                <td><?=$data->name ?></td>
                <td><?=indo_currency($data->biaya) ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-nilai"
                    data-ld_id="<?=$data->ld_id ?>"
                    data-biaya="<?=$data->biaya ?>">
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
    $(document).on('click', '#select-belanja', function() {
    var belanja_id = $(this).data('belanja_id');
    var kode_rek = $(this).data('kode_rek');
    var nama_rek = $(this).data('nama_rek');
    $('#belanja_id').val(belanja_id);
    $('#kode_rek').val(kode_rek);
    $('#nama_rek').val(nama_rek);
    $('#modal-belanja').modal('hide');
  })
})

$(document).ready(function() {
$(document).on('click', '#select-sppd', function() {
    var st_id = $(this).data('st_id');
    var sppd_id = $(this).data('sppd_id');
    var pengikut_id = $(this).data('pengikut_id');
    var maksud = $(this).data('maksud');
    var name = $(this).data('name');
    var tempat_tujuan = $(this).data('tempat_tujuan');
    var lama_perjalanan = $(this).data('lama_perjalanan');
    var nip = $(this).data('nip');
    var pangkat = $(this).data('pangkat');
    var gol = $(this).data('golongan');
    var jabatan = $(this).data('jabatan');
    $('#st_id').val(st_id);
    $('#sppd_id').val(sppd_id);
    $('#pengikut_id').val(pengikut_id);
    $('#maksud').val(maksud);
    $('#name').val(name);
    $('#tempat_tujuan').val(tempat_tujuan);
    $('#lama_perjalanan').val(lama_perjalanan);
    $('#nip').val(nip);
    $('#pangkat').val(pangkat);
    $('#golongan').val(gol);
    $('#jabatan').val(jabatan);
    $('#modal-st').modal('hide');
})
})

$(document).ready(function() {
$(document).on('click', '#select-pengikut', function() {
    var st_id = $(this).data('st_id');
    var sppd_id = $(this).data('sppd_id');
    var pengikut_id = $(this).data('pengikut_id');
    var maksud = $(this).data('maksud');
    var pengikut_name = $(this).data('name');
    var tempat_tujuan = $(this).data('tempat_tujuan');
    var lama_perjalanan = $(this).data('lama_perjalanan');
    var nip = $(this).data('nip');
    var pangkat = $(this).data('pangkat');
    var gol = $(this).data('golongan');
    var jabatan = $(this).data('jabatan');
    $('#st_id').val(st_id);
    $('#sppd_id').val(sppd_id);
    $('#pengikut_id').val(pengikut_id);
    $('#maksud').val(maksud);
    $('#name').val(pengikut_name);
    $('#tempat_tujuan').val(tempat_tujuan);
    $('#lama_perjalanan').val(lama_perjalanan);
    $('#nip').val(nip);
    $('#pangkat').val(pangkat);
    $('#golongan').val(gol);
    $('#jabatan').val(jabatan);
    $('#modal-st').modal('hide');
})
})

$(document).ready(function() {
$(document).on('click', '#select-rekening', function() {
    var rekening_id = $(this).data('rekening_id');
    var rek_bank = $(this).data('rek_bank');
    var nama_pemilik = $(this).data('nama_pemilik');
    $('#rekening_id').val(rekening_id);
    $('#rek_bank').val(rek_bank);
    $('#nama_pemilik').val(nama_pemilik);
    $('#modal-rekening').modal('hide');
})
})

$(document).ready(function() {
$(document).on('click', '#select-nilai', function() {
    var dd_id = $(this).data('dd_id');
    var ld_id = $(this).data('ld_id');
    var biaya = $(this).data('biaya');
    $('#dd_id').val(dd_id);
    $('#ld_id').val(ld_id);
    $('#biaya').val(biaya);
    $('#modal-nilai').modal('hide');
})
})
</script>
