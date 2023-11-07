<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/dpa/edit/'.$dpa->dpa_id),' class="form-horizontal"');
?>
<section class="content-header">
  <h1>Dokumen Pelaksanaan Anggaran
    <small>Data DPA</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Penganggaran</li>
    <li>DPA</li>
    <li class="active">Sub Kegiatan</li>
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
                        <input type="hidden" name="subkeg_id" id="subkeg_id" value="<?=$dpa->subkeg_id ?>">
                        <textarea name="nama_subkeg" id="nama_subkeg" rows="5" class="form-control" required autofocus readonly><?=$dpa->nama_subkeg ?></textarea>
                        
                    </div>

                    <div class="form-group">
                    <label for="indikator">Indikator *</label>
                        <textarea name="" id="uraian_indikator_subkeg" class="form-control" readonly><?=$dpa->uraian_indikator_subkeg ?></textarea>
                    </div>

                    <div class="form-group">
                    <label for="target">Target *</label>
                        <input type="text" name="target" id="" value="<?=$dpa->target ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                    <label for="satuan">Satuan *</label>
                        <input type="text" name="" id="satuan" value="<?=$dpa->satuan ?>" class="form-control" readonly>
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
                <th rowspan="2">No</th>
                <th rowspan="2">Kode Rekening</th>
                <th rowspan="2">Sub Kegiatan</th>
                <th rowspan="2">Indikator</th>
                <th colspan="6" align="center">Target</th>
                <th rowspan="2">Satuan</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                <th>2021</th>
                <th>2022</th>
                <th>2023</th>
                <th>2024</th>
                <th>2025</th>
                <th>2026</th>
            </tr>
            <?php $no = 0; foreach($subkeg->result() as $key => $data) { ?>
        </thead>
        <tbody>
            <tr>
                <td width="5%"><?=++$no; ?>.</td>
                <td><?=$data->kode_urusan ?>.<?=$data->kode ?>.<?=$data->kode_program ?>.<?=$data->kode_kegiatan ?>.<?=$data->kode_subkeg ?></td>
                <td><?=$data->nama_subkeg ?></td>
                <td><?=$data->uraian_indikator_subkeg ?></td>
                <td><?=$data->awal ?></td>
                <td><?=$data->satu ?></td>
                <td><?=$data->dua ?></td>
                <td><?=$data->tiga ?></td>
                <td><?=$data->empat ?></td>
                <td><?=$data->lima ?></td>
                <td><?=$data->satuan ?></td>
                <td class="text-center">
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-subkeg_id="<?=$data->subkeg_id ?>"
                    data-nama_subkeg="<?=$data->nama_subkeg ?>"
                    data-uraian_indikator_subkeg="<?=$data->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data->satuan ?>">
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
    var nama_subkeg = $(this).data('nama_subkeg');
    var uraian_indikator_subkeg = $(this).data('uraian_indikator_subkeg');
    var satuan = $(this).data('satuan');
    $('#subkeg_id').val(subkeg_id);
    $('#nama_subkeg').val(nama_subkeg);
    $('#uraian_indikator_subkeg').val(uraian_indikator_subkeg);
    $('#satuan').val(satuan);
    $('#modal-subkeg').modal('hide');
  })
})
</script>