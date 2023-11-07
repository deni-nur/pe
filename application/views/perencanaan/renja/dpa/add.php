<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/dpa/add'),' class="form-horizontal"');
?>
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
            <h3 class="box-title"><?=ucfirst($page) ?> DPA</h3>
            <div class="pull-right">
                <a href="<?=site_url('portal/'.$this->uri->segment(2).'/dpa') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <div class="form-group">
                        <label for="subkeg">Sub Kegiatan *</label>
                        <input type="hidden" name="subkeg_id" id="subkeg_id">
                        <textarea name="nama_subkeg" id="nama_subkeg" rows="5" class="form-control" required autofocus></textarea>
                        <span class="input-group-btn btn-group-vertical">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-subkeg"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>

                    <div class="form-group">
                    <label for="indikator">Indikator *</label>
                        <textarea name="indikator" id="indikator" class="form-control" readonly></textarea>
                    </div>

                    <div class="form-group">
                    <label for="target">Target *</label>
                        <input type="text" name="target" id="target" class="form-control" required>
                    </div>

                    <div class="form-group">
                    <label for="satuan">Satuan *</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                    <label for="pagu">Pagu Anggaran *</label>
                        <input type="number" name="pagu" id="pagu" class="form-control" required>
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

<div>
<div class="modal fade" id="modal-subkeg">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Sub Kegiatan</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example1" >
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Rekening</th>
                <th>Sub Kegiatan</th>
                <th>Indikator</th>
                <th>Target</th>
                <th>Satuan</th>
                <th>Pagu Anggaran</th>
                <th>Tahun Anggaran</th>
                <th>Action</th>
            </tr>
            <?php $no = 0; foreach($subkeg->result() as $key => $data) { ?>
        </thead>
        <tbody>
            <tr>
                <td width="5%"><?=++$no; ?>.</td>
                <td><?=$data->k_urusan?>.<?=$data->kode_rek_program ?>.<?=$data->kode_rek_kegiatan ?>.<?=$data->kode_rek ?></td>
                <td><?=$data->nama_subkeg ?></td>
                <td><?=$data->indikator ?></td>
                <td><?=$data->target ?></td>
                <td><?=$data->satuan ?></td>
                <td><?=indo_currency($data->pagu) ?></td>
                <td><?=$data->tahun ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-subkeg_id="<?=$data->subkeg_id ?>"
                    data-k_urusan="<?=$data->k_urusan ?>"
                    data-kode_rek_program="<?=$data->kode_rek_program ?>"
                    data-kode_rek_kegiatan="<?=$data->kode_rek_kegiatan ?>"
                    data-kode_rek="<?=$data->kode_rek ?>"
                    data-nama_subkeg="<?=$data->nama_subkeg ?>"
                    data-indikator="<?=$data->indikator ?>"
                    data-target="<?=$data->target ?>"
                    data-satuan="<?=$data->satuan ?>"
                    data-pagu="<?=$data->pagu ?>"
                    data-tahun="$=$data->tahun?>">
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
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#select-subkeg', function() {
    var subkeg_id = $(this).data('subkeg_id');
    var k_urusan = $(this).data('k_urusan');
    var kode_rek_program = $(this).data('kode_rek_program');
    var kode_rek_kegiatan = $(this).data('kode_rek_kegiatan');
    var kode_rek = $(this).data('kode_rek');
    var nama_subkeg = $(this).data('nama_subkeg');
    var indikator = $(this).data('indikator');
    var target = $(this).data('target');
    var satuan = $(this).data('satuan');
    var pagu = $(this).data('pagu');
    var tahun = $(this).data('tahun');
    $('#subkeg_id').val(subkeg_id);
    $('#k_urusan').val(k_urusan);
    $('#kode_rek_program').val(kode_rek_program);
    $('#kode_rek_kegiatan').val(kode_rek_kegiatan);
    $('#kode_rek').val(kode_rek);
    $('#nama_subkeg').val(nama_subkeg);
    $('#indikator').val(indikator);
    $('#target').val(target);
    $('#satuan').val(satuan);
    $('#pagu').val(pagu);
    $('#tahun').val(tahun);
    $('#modal-subkeg').modal('hide');
  })
})
</script>