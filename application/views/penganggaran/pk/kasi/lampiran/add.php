<?php
// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran_add'),' class="form-horizontal"');
?>
<section class="content-header">
      <h1>Perjanjian Kinerja Esselon IV
        <small>Perjanjian Kinerja Esselon IV</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Penganggaran</li>
        <li>Perjanjian Kinerja</li>
        <li class="active">Esselon IV</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
 <?php $this->view('messages') ?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?=ucfirst($page) ?> Perjanjian Kinerja Esselon IV</h3>
        <div class="pull-right">
            <a href="<?=base_url('portal/'.$this->uri->segment(2).'/pk_kasi/'.$this->uri->segment(4).'/lampiran') ?>" class="btn btn-warning">
            <i class="fa fa-undo"></i> Back
          </a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                    <div class="form-group">
                    <label for="indikator_kegiatan_id">Sasaran Kegiatan *</label>
                    <div class="input-group">
                        <input type="hidden" name="indikator_kegiatan_id" id="indikator_kegiatan_id">
                        <input type="text" name="uraian_indikator_kegiatan" id="uraian_indikator_kegiatan" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-kegiatan"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="indikator_subkeg_id">Indikator Kinerja *</label>
                    <div class="input-group">
                        <input type="hidden" name="indikator_subkeg_id" id="indikator_subkeg_id">
                        <input type="text" name="uraian_indikator_subkeg" id="uraian_indikator_subkeg" class="form-control" required readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-subkeg"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="satuan">Satuan *</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label for="target">Target Tahunan *</label>
                        <input type="text" name="target_tahunan" id="target" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_1">Triwulan 1 </label>
                        <input type="text" name="triwulan_1" id="triw_1" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_2">Triwulan 2 </label>
                        <input type="text" name="triwulan_2" id="triw_2" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_3">Triwulan 3 </label>
                        <input type="text" name="triwulan_3" id="triw_3" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="triw_4">Triwulan 4 </label>
                        <input type="text" name="triwulan_4" id="triw_4" class="form-control">
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
<div class="modal fade" id="modal-kegiatan">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Pilih Kegiatan</h4>
</div>
<div class="modal-body table-responsive">
    <table class="table table-bordered table-striped" id="example1" >
        <thead>
            <tr>
                <th>Indikator</th>
                <th>Target Awal</th>
                <th>Target 2022</th>
                <th>Target 2023</th>
                <th>Target 2024</th>
                <th>Target 2025</th>
                <th>Target 2026</th>
                <th>Target Akhir</th>
            </tr>
            <?php 
            $i = 0; $no = 0; $a=0;
            foreach($kegiatan->result() as $key => $data_kegiatan) {
            foreach($indikator_kegiatan->result() as $key1 => $data_ik_kegiatan) {
                if($data_kegiatan->nama_kegiatan == $data_ik_kegiatan->nama_kegiatan) {
                    ++$i;
                    if($i==1) { ?>
            <tr>
                <th colspan="8">[KEGIATAN] <?=$data_kegiatan->nama_kegiatan ?></th>
            </tr>
            <?php } ?>
        </thead>
        <tbody>
            <tr>
                <td><?=$data_ik_kegiatan->uraian_indikator_kegiatan ?></td>
                <td><?=$data_ik_kegiatan->awal ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->satu ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->dua ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->tiga ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->empat ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->lima ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_kegiatan->akhir ?> <?=$data_ik_kegiatan->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-kegiatan"
                    data-indikator_kegiatan_id="<?=$data_ik_kegiatan->indikator_kegiatan_id ?>"
                    data-uraian_indikator_kegiatan="<?=$data_ik_kegiatan->uraian_indikator_kegiatan ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td>
                   
                </td>
            </tr>
            <?php } $i=0; } $a=0; } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>

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
                <th>Indikator</th>
                <th>Target Awal</th>
                <th>Target 2022</th>
                <th>Target 2023</th>
                <th>Target 2024</th>
                <th>Target 2025</th>
                <th>Target 2026</th>
                <th>Target Akhir</th>
            </tr>
            <?php 
            $i = 0; $no = 0; $a=0;
            foreach($subkeg->result() as $key => $data_subkeg) {
            foreach($indikator_subkeg->result() as $key1 => $data_ik_subkeg) {
                if($data_subkeg->nama_subkeg == $data_ik_subkeg->nama_subkeg) {
                    ++$i;
                    if($i==1) { ?>
            <tr>
                <th colspan="8">[SUB KEGIATAN] <?=$data_subkeg->nama_subkeg ?></th>
            </tr>
            <?php } ?>
        </thead>
        <tbody>
            <tr>
                <td><?=$data_ik_subkeg->uraian_indikator_subkeg ?></td>
                <td><?=$data_ik_subkeg->awal ?> <?=$data_ik_subkeg->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-indikator_subkeg_id="<?=$data_ik_subkeg->indikator_subkeg_id ?>"
                    data-uraian_indikator_subkeg="<?=$data_ik_subkeg->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data_ik_subkeg->satuan ?>"
                    data-target="<?=$data_ik_subkeg->awal ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_subkeg->satu ?> <?=$data_ik_subkeg->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-indikator_subkeg_id="<?=$data_ik_subkeg->indikator_subkeg_id ?>"
                    data-uraian_indikator_subkeg="<?=$data_ik_subkeg->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data_ik_subkeg->satuan ?>"
                    data-target="<?=$data_ik_subkeg->satu ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_subkeg->dua ?> <?=$data_ik_subkeg->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-indikator_subkeg_id="<?=$data_ik_subkeg->indikator_subkeg_id ?>"
                    data-uraian_indikator_subkeg="<?=$data_ik_subkeg->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data_ik_subkeg->satuan ?>"
                    data-target="<?=$data_ik_subkeg->dua ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_subkeg->tiga ?> <?=$data_ik_subkeg->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-indikator_subkeg_id="<?=$data_ik_subkeg->indikator_subkeg_id ?>"
                    data-uraian_indikator_subkeg="<?=$data_ik_subkeg->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data_ik_subkeg->satuan ?>"
                    data-target="<?=$data_ik_subkeg->tiga ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_subkeg->empat ?> <?=$data_ik_subkeg->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-indikator_subkeg_id="<?=$data_ik_subkeg->indikator_subkeg_id ?>"
                    data-uraian_indikator_subkeg="<?=$data_ik_subkeg->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data_ik_subkeg->satuan ?>"
                    data-target="<?=$data_ik_subkeg->empat ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_subkeg->lima ?> <?=$data_ik_subkeg->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-indikator_subkeg_id="<?=$data_ik_subkeg->indikator_subkeg_id ?>"
                    data-uraian_indikator_subkeg="<?=$data_ik_subkeg->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data_ik_subkeg->satuan ?>"
                    data-target="<?=$data_ik_subkeg->lima ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td><?=$data_ik_subkeg->akhir ?> <?=$data_ik_subkeg->satuan ?>
                    <button class="btn btn-xs btn-info" id="select-subkeg"
                    data-indikator_subkeg_id="<?=$data_ik_subkeg->indikator_subkeg_id ?>"
                    data-uraian_indikator_subkeg="<?=$data_ik_subkeg->uraian_indikator_subkeg ?>"
                    data-satuan="<?=$data_ik_subkeg->satuan ?>"
                    data-target="<?=$data_ik_subkeg->akhir ?>">
                        <i class="fa fa-check"></i> Select
                    </button>
                </td>
                <td>
                   
                </td>
            </tr>
            <?php } $i=0; } $a=0; } ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#select-kegiatan', function() {
    var indikator_kegiatan_id = $(this).data('indikator_kegiatan_id');
    var nama_kegiatan = $(this).data('nama_kegiatan');
    var uraian_indikator_kegiatan = $(this).data('uraian_indikator_kegiatan');
    $('#indikator_kegiatan_id').val(indikator_kegiatan_id);
    $('#nama_kegiatan').val(nama_kegiatan);
    $('#uraian_indikator_kegiatan').val(uraian_indikator_kegiatan);
    
    $('#modal-kegiatan').modal('hide');
  })
})

$(document).ready(function() {
    $(document).on('click', '#select-subkeg', function() {
    var indikator_subkeg_id = $(this).data('indikator_subkeg_id');
    var nama_subkeg = $(this).data('nama_subkeg');
    var uraian_indikator_subkeg = $(this).data('uraian_indikator_subkeg');
    var satuan = $(this).data('satuan');
    var target = $(this).data('target');
    $('#indikator_subkeg_id').val(indikator_subkeg_id);
    $('#nama_subkeg').val(nama_subkeg);
    $('#uraian_indikator_subkeg').val(uraian_indikator_subkeg);
    $('#satuan').val(satuan);
    $('#target').val(target);
    $('#modal-subkeg').modal('hide');
  })
})
</script>